<!-- resources/views/admin/users/create.blade.php -->

@extends('layouts.homelayouts')

@section('konten')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Add User</h2>
        <form action="{{ route('admin.users.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" class="form-input mt-1 block w-full rounded-md border-pink-300" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" class="form-input mt-1 block w-full rounded-md border-pink-300" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" class="form-input mt-1 block w-full rounded-md border-pink-300" required>
            </div>
            <!-- tambahkan bidang lain sesuai kebutuhan -->
            <button type="submit" class="bg-pink-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-pink-600 focus:outline-none focus:bg-pink-600">Submit</button>
            <a href="{{ route('admin.users.index') }}" class="bg-pink-300 text-pink-700 font-semibold py-2 px-4 rounded-md ml-4 hover:bg-pink-400 focus:outline-none focus:bg-pink-400">Back</a>
        </form>
    </div>
@endsection
