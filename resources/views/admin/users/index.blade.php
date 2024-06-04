<!-- resources/views/admin/users/index.blade.php -->

@extends('layouts.homelayouts2')

@section('konten')
    <div class="py-16 px-12 ">
        <h2 class="text-xl font-bold mb-4 judul text-custom-pink text-center">User List</h2>
        <a href="{{ route('admin.users.create') }}" class="bg-custom-pink text-white font-semibold py-2 px-4 rounded-md mb-4 inline-block hover:bg-pink-800 focus:outline-none focus:bg-pink-800">Add User</a>
        <table class="min-w-full divide-y divide-custom-pink-200">
        <thead class="bg-custom-pink text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">User Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-custom-pink-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->usertype }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-gray-600 hover:text-blue-700">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-1200 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
