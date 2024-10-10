<?php
namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userType = Auth::user()->usertype;
            
            // Lakukan pengecekan tipe pengguna
            if ($userType === 'user') {
                // For user type, we may not need these variables, so let's set them as null
                $totalTransactions = null;
                $totalUsers = null;
                $totalAmount = null;

                return view('user.homepage', compact('totalTransactions', 'totalUsers', 'totalAmount'))->with(['dashboard' => true]);
            } elseif ($userType === 'admin') {
                // For admin type, calculate the required variables
                $totalTransactions = Transaksi::count();
                $totalUsers = User::count();
                $totalAmount = Transaksi::sum('total_harga');

                return view('admin.home', compact('totalTransactions', 'totalUsers', 'totalAmount'))->with(['dashboard' => true]);
            } else {
                // Tipe pengguna tidak dikenali, mungkin ada kesalahan dalam pengaturan
                // Anda dapat menangani kasus ini sesuai dengan kebutuhan aplikasi Anda
                // Misalnya, mengarahkan ke halaman error atau melakukan tindakan lainnya
            }
        } else {
            // For non-authenticated users, we may not need these variables, so let's set them as null
            $totalTransactions = null;
            $totalUsers = null;
            $totalAmount = null;

            return view('user.homepage', compact('totalTransactions', 'totalUsers', 'totalAmount'))->with(['dashboard' => false]);
        }
    }
}
