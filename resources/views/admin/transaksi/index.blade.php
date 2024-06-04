@extends('layouts.homelayouts2')

@section('konten')
<div class="py-16 px-12">
    <h1 class="text-xl font-bold text-custom-pink mb-6 judul text-center">Transaksi</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-custom-pink-200 rounded-lg shadow-md">
            <thead class="bg-custom-pink text-white">
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
                    <tr class="border-b border-custom-pink-200 hover:bg-custom-pink-100">
                        <td class="py-3 px-4 text-center">{{ $transaksi->id }}</td>
                        <td class="py-3 px-4 text-center">{{ $transaksi->user_id }}</td>
                        <td class="py-3 px-4 text-center">{{ $transaksi->total_harga }}</td>
                        <td class="py-3 px-4 text-center">{{ $transaksi->status }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('transaksi.show', $transaksi->id) }}"
                                class="text-custom-pink hover:text-blue-700">View</a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-1000 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
