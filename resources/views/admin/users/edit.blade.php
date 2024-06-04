@extends('layouts.homelayouts2')

@section('konten')
<div class="max-w-3xl mx-auto p-4 py-12">
    <h1 class="text-xl font-bold mb-4 text-custom-pink judul text-center">Edit User</h1>

    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('admin.users.index') }}" class="bg-custom-pink hover:bg-custom-pink-600 text-white font-bold py-2 px-4 rounded">
            Kembali
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md border border-custom-pink-200 mb-6">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" class="form-input mt-1 block w-full rounded-md border-custom-pink-300" value="{{ $user->name }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" class="form-input mt-1 block w-full rounded-md border-custom-pink-300" value="{{ $user->email }}" required>
            </div>
            <!-- tambahkan bidang lain sesuai kebutuhan -->
            <button type="submit" class="bg-custom-pink hover:bg-custom-pink-600 text-white font-bold py-2 px-4 rounded">Submit</button>
            
        </form>
    </div>
</div>
@endsection
