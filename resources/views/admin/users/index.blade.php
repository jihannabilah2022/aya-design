<!-- resources/views/admin/users/index.blade.php -->

@extends('layouts.homelayouts')

@section('konten')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">User List</h2>
        <a href="{{ route('admin.users.create') }}" class="bg-pink-500 text-white font-semibold py-2 px-4 rounded-md mb-4 inline-block hover:bg-pink-600 focus:outline-none focus:bg-pink-600">Add User</a>
        <table class="min-w-full divide-y divide-pink-200">
            <thead class="bg-pink-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">User Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-pink-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->usertype }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-pink-500 hover:text-pink-700">Edit</a>
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
