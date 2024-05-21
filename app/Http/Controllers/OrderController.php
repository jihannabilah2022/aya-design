<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Improt Auth

class OrderController extends Controller
{
    // Menampilkan formulir untuk membuat pesanan baru
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
    // public function showCart()
    // {
    //     // Ambil pesanan yang terkait dengan pengguna yang login saat ini
    //     $user = Auth::user();
    //     $orders = $user->orders;

    //     // Kirim data pesanan ke view
    //     return view('user.cart', ['orders' => $orders]);
    // }



}

