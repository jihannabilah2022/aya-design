<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Order;
use Illuminate\Support\Facades\Auth; // Improt Auth
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;





class ShopController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            // Jika pengguna sudah login, arahkan ke dashboard
            return view('user.shop')->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return view('user.shop')->with(['dashboard' => false]);
        }
    }
    public function showPemesanan($id)
    {
        // Ambil data foto berdasarkan ID
        $photo = Photo::find($id);

        // Periksa apakah foto ditemukan
        if (!$photo) {
            abort(404); // Jika foto tidak ditemukan, tampilkan halaman 404
        }

        // Mendapatkan jumlah form dari deskripsi
        $jumlah_form = $photo->description;

        // Menentukan apakah pengguna sudah login atau belum
        $dashboard = auth()->check();

        // Meneruskan data ke view
        return view('user.pesan', [
            'photo' => $photo,
            'jumlah_form' => $jumlah_form,
            'dashboard' => $dashboard
        ]);
    }

    public function create()
    {
        return view('user.pesan');
    }

    // Menyimpan pesanan baru beserta detail pemesanannya
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            // tambahkan validasi sesuai kebutuhan
        ]);

        // Membuat order baru
        $order = new Order();
        $order->judul = $request->judul;

        // Mengambil URL gambar dari input tersembunyi
        $order->img = $request->img;
        $order->harga = $request->harga;


        // Inisialisasi array untuk nama dan deskripsi
        $namaArray = [];
        $deskripsiArray = [];

        // Looping untuk mengambil data dari form
        $i = 1;
        while ($request->has("nama$i")) {
            $namaArray[] = $request->input("nama$i");
            $deskripsiArray[] = $request->input("deskripsi$i");
            $i++;
        }

        // Menggabungkan array nama dan deskripsi menjadi satu string dengan koma sebagai pemisah
        $order->nama = implode(', ', $namaArray);
        $order->deskripsi = implode(', ', $deskripsiArray);
        $order->user_id = Auth::id();

        $order->save();

        return redirect()->route('go_shopping')->with('success', 'Pesanan berhasil disimpan.');
    }
    public function showCart()
    {
        $orders = Order::all();
        if (auth()->check()) {
            $user = auth()->user();
            $orders = $user->orders;
            // Jika pengguna sudah login, kirimkan data pesanan ke view
            return view('user.cart', ['orders' => $orders, 'dashboard' => true]);
        } else {
            // Jika pengguna belum login, kirimkan data pesanan kosong ke view
            return view('user.cart', ['orders' => $orders, 'dashboard' => false]);
        }
    }
    public function removeCart($id)
    {
        // Find the order by ID
        $order = Order::find($id);

        // Check if the order exists
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Delete the order from the database
        $order->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
    public function showCartDetail($id)
    {
        $order = Order::findOrFail($id);
        if (auth()->check()) {
            // Jika pengguna sudah login, kirimkan data pesanan ke view
            return view('user.cartDetail', ['order' => $order, 'dashboard' => true]);
        } else {
            // Jika pengguna belum login, kirimkan data pesanan kosong ke view
            return view('user.cartDetail', ['order' => $order, 'dashboard' => false]);
        }
    }




    public function checkout(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = auth()->user();
            $cartItems = Order::where('user_id', $user->id)->get();

            if ($cartItems->isEmpty()) {
                throw new \Exception('Keranjang belanja kosong');
            }

            $totalHarga = $cartItems->sum('harga');

            $transaksi = Transaksi::create([
                'user_id' => $user->id,
                'total_harga' => $totalHarga,
                'status' => 'completed',
            ]);

            foreach ($cartItems as $item) {
                TransaksiItem::create([
                    'transaksi_id' => $transaksi->id,
                    'judul' => $item->judul,
                    'nama' => $item->nama,
                    'deskripsi' => $item->deskripsi,
                    'img' => $item->img,
                    'harga' => $item->harga,
                ]);
            }

            Order::where('user_id', $user->id)->delete();

            // Kirim Pesan WhatsApp
            $adminPhoneNumber = '+628985527066'; // Gantilah dengan nomor telepon admin yang sesuai
            $whatsappLink = $this->sendWhatsAppMessage($user->name, $cartItems, $totalHarga, $adminPhoneNumber);

            DB::commit();

            // Redirect pengguna ke tautan WhatsApp untuk melanjutkan pesanan
            return redirect()->away($whatsappLink)->with('success', 'Checkout berhasil.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }

    protected function sendWhatsAppMessage($namaPengguna, $cartItems, $totalHarga, $adminPhoneNumber)
    {
        $pesan = "Hai Admin, saya *{$namaPengguna}* ingin melakukan pemesanan,\nBerikut pesanan Saya:\n\n"; // Pesan awal

        // Iterasi melalui setiap item dalam $cartItems
        foreach ($cartItems as $index => $item) {
            $folder_name = basename(dirname($item->img));
            $fileName = basename($item->img);
            $kodePesanan = pathinfo($fileName, PATHINFO_FILENAME);
            // Pisahkan nama dan deskripsi menjadi array
            $namaArray = explode(',', $item->nama);
            $deskripsiArray = explode(',', $item->deskripsi);

            // Tambahkan nomor pesanan
            $pesan .= "Pesanan " . ($index + 1) . "\n";
            $pesan .= "Judul: {$item->judul}\n";
            $pesan .= "Kode Pesanan: $kodePesanan\n";
            $pesan .= "Harga: {$item->harga}\n\n";

            $angka = 1;
            if ($folder_name === 'banner') {
                // Iterasi melalui setiap nama dan deskripsi dalam array
                $pesan .= "Detail Pemesanan:\n";

                foreach ($namaArray as $i => $nama) {
                    $deskripsi = isset($deskripsiArray[$i]) ? $deskripsiArray[$i] : ''; // Deskripsi yang sesuai

                    // Tambahkan detail pesanan ke pesan
                    $pesan .= "$angka. Nama: $nama\n";
                    $pesan .= "    Deskripsi: $deskripsi\n";
                    $angka++;
                }


            }
            // Tambahkan pembatas antara setiap pesanan
            if ($index < count($cartItems) - 1) {
                $pesan .= "--------------------------------------------------------------------------\n\n";
            }

        }

        // Tambahkan total harga ke pesan
        $pesan .= "--------------------------------------------------------------------------\n\n";
        $pesan .= "Total Harga: {$totalHarga} IDR\n";
        $pesan = urlencode($pesan); // Melakukan URL encoding pada pesan

        // Membuat tautan WhatsApp dengan nomor telepon dan pesan yang telah disesuaikan
        $whatsappLink = "https://api.whatsapp.com/send?phone={$adminPhoneNumber}&text={$pesan}";

        // Mengembalikan tautan WhatsApp
        return $whatsappLink;
    }
}
