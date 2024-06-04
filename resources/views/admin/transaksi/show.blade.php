@extends('layouts.homelayouts2')

@section('konten')
<div class="max-w-3xl mx-auto p-4 py-12">
    <h1 class="text-xl font-bold mb-4 text-custom-pink judul text-center">Transaksi Detail</h1>

    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('transaksi.index') }}" class="bg-custom-pink hover:bg-custom-pink-600 text-white font-bold py-2 px-4 rounded">
            Kembali
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md border border-custom-pink-200 mb-6">
        <p class="mb-2"><strong>ID:</strong> {{ $transaksi->id }}</p>
        <p class="mb-2"><strong>User ID:</strong> {{ $transaksi->user_id }}</p>
        <p class="mb-2"><strong>Total Harga:</strong> {{ $transaksi->total_harga }}</p>
        <p class="mb-4"><strong>Status:</strong> {{ $transaksi->status }}</p>
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status:</label>
                <select name="status" id="status" class="block w-full mt-1 border-custom-pink-300 focus:border-custom-pink-500 focus:ring focus:ring-custom-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $transaksi->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $transaksi->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="bg-custom-pink hover:bg-custom-pink-600 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
    </div>

    <h2 class="text-l font-bold text-custom-pink  mt-8 mb-8 judul text-center">Transaksi Items</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-custom-pink-200 rounded-lg shadow-md">
            <thead class="bg-custom-pink text-white">
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Judul</th>
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Deskripsi</th>
                    <th class="py-3 px-4">Img</th>
                    <th class="py-3 px-4">Harga</th>
                    <th class="py-3 px-4">Kode Pesanan</th> <!-- New column for Kode Pesanan -->
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi->items as $item)
                    <tr class="border-b border-custom-pink-200 hover:bg-custom-pink-100">
                        <td class="py-3 px-4 text-center">{{ $item->id }}</td>
                        <td class="py-3 px-4 text-center">{{ $item->judul }}</td>
                        <td class="py-3 px-4 ">
                            <ul class="list-disc list-inside">
                                @foreach(explode(',', $item->nama) as $nama)
                                    <li>{{ $nama }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="py-3 px-4 ">
                            <ul class="list-disc list-inside">
                                @foreach(explode(',', $item->deskripsi) as $deskripsi)
                                    <li>{{ $deskripsi }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <img src="{{ $item->img }}" alt="{{ $item->judul }}" class="w-12 h-12 object-cover rounded">
                        </td>
                        <td class="py-3 px-4 text-center">{{ $item->harga }}</td>
                        <td class="py-3 px-4 text-center">
                            @php
                                $fileName = basename($item->img);
                                $kodePesanan = pathinfo($fileName, PATHINFO_FILENAME);
                            @endphp
                            {{ $kodePesanan }}
                        </td> <!-- Display the Kode Pesanan -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
