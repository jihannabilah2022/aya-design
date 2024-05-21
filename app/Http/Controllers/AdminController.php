<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, arahkan ke dashboard
            $users = User::all();
            return view('admin.users.index', compact('users'))->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
    }

    public function create()
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, arahkan ke halaman create
            return view('admin.users.create')->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        if(auth()->check()) {
            // Jika pengguna sudah login, arahkan ke halaman edit
            return view('admin.users.edit', compact('user'))->with(['dashboard' => true]);
        } else {
            // Jika pengguna belum login, arahkan ke halaman beranda biasa
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
