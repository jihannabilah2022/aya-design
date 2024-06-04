<!-- resources/views/admin/users/create.blade.php -->

@extends('layouts.homelayouts2')

@section('konten')
    <div class="container mx-auto mt-8">
        <h2 class="text-xl font-bold mb-4 text-custom-pink judul text-center">Add User</h2>
        <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-5 max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" class="form-input mt-1 block w-full rounded-md border-custom-pink-300" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" class="form-input mt-1 block w-full rounded-md border-custom-pink-300" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" class="form-input mt-1 block w-full rounded-md border-custom-pink-300" required>
            </div>
            <!-- tambahkan bidang lain sesuai kebutuhan -->
            <button type="submit" class="bg-custom-pink text-white font-semibold py-2 px-4 rounded-md hover:bg-pink-800 focus:outline-none focus:bg-pink-600">Submit</button>
            <a href="{{ route('admin.users.index') }}" class="bg-custom-pink-300 text-custom-pink-700 font-semibold py-2 px-4 rounded-md ml-4 hover:bg-custom-pink-400 focus:outline-none focus:bg-custom-pink-400">Back</a>
        </form>
    </div>
@endsection
