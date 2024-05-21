<!-- resources/views/order/detail.blade.php -->

@extends('layouts.homelayouts')

@section('konten')
@php
$folder_name = basename(dirname($order->img));
@endphp

<div class="flex my-4">
    <a href="{{ route('cart') }}">
    <button type="button" class="ml-11 w-full flex items-center justify-center w-1/2 px-2 py-2  transition-colors duration-200 bg-white border rounded-full border-black gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
        <svg class="w-4 h-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg>
    </button>
    </a>
  <div class="w-4/12 p-4 mx-4 ml-12 mr-4 ">
    <img src="{{ $order->img }}" alt="Product Image">
  </div>
  <div class="w-3/12 p-4 ">
    <h2 class="text-xl font-semibold mb-3">Judul Design {{ ucwords($folder_name) }}</h2>
    <p>Judul: {{ $order->judul }}</p>
    <br>
    
    @if($folder_name === 'banner')
    <h2 class="text-xl font-semibold mb-3">Detail</h2>
    <!-- Tampilkan nama dan deskripsi sesuai format -->
    @php
        $names = explode(',', $order->nama);
        $descriptions = explode(',', $order->deskripsi);
    @endphp
    @for ($i = 0; $i < count($names); $i++)
        <p>Nama: {{ trim($names[$i]) }}</p>
        <p>Deskripsi: {{ trim($descriptions[$i]) }}</p>
        <br>
    @endfor
    @endif
  </div>

  <div class="w-5/12 p-4 mx-4 ml-6 mr-12">
    <h3 class="text-lg text-gray-700 mb-2">Harga Design {{ $folder_name }}</h3>
    <p class="font-semibold">Rp. 35.000</p>
  </div>
</div>


@endsection
