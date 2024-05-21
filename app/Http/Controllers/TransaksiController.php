<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, tampilkan daftar transaksi
            $transaksis = Transaksi::all();
            return view('admin.transaksi.index', compact('transaksis'))->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
    }

    public function show($id)
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, tampilkan detail transaksi
            $transaksi = Transaksi::with('items')->findOrFail($id);
            return view('admin.transaksi.show', compact('transaksi'))->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
    }

    public function update(Request $request, $id)
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, update transaksi
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->update($request->all());
            return redirect()->route('transaksi.index')->with('success', 'Transaksi updated successfully')->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return redirect()->route('home')->with('error', 'You are not authorized to perform this action.');
        }
    }

    public function destroy($id)
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, hapus transaksi
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->delete();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi deleted successfully')->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return redirect()->route('home')->with('error', 'You are not authorized to perform this action.');
        }
    }
}
