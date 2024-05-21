@extends('layouts.homelayouts')

@section('konten')
<div class="ml-14 mr-14">
    <h1 class="text-3xl font-bold text-pink-600 mb-6">Transaksi</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-pink-200 rounded-lg shadow-md">
            <thead class="bg-pink-500 text-white">
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">User ID</th>
                    <th class="py-3 px-4">Total Harga</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr class="border-b border-pink-200 hover:bg-pink-100">
                        <td class="py-3 px-4 text-center">{{ $transaksi->id }}</td>
                        <td class="py-3 px-4 text-center">{{ $transaksi->user_id }}</td>
                        <td class="py-3 px-4 text-center">{{ $transaksi->total_harga }}</td>
                        <td class="py-3 px-4 text-center">{{ $transaksi->status }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('transaksi.show', $transaksi->id) }}"
                                class="text-pink-600 hover:underline">View</a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-pink-600 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection