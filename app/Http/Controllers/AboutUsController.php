<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, arahkan ke dashboard
            return view('user.about_us')->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return view('user.about_us')->with(['dashboard' => false]);
        }
    }
    public function faq()
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, arahkan ke dashboard
            return view('user.faq')->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return view('user.faq')->with(['dashboard' => false]);
        }
    }
    public function how_to_order()
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, arahkan ke dashboard
            return view('user.how_to_order')->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return view('user.how_to_order')->with(['dashboard' => false]);
        }
    }
}
