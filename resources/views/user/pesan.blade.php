@extends('layouts.homelayouts')

@section('konten')
<a href="{{ route('go_shopping') }}">
  <button type="button" class="ml-11 w-full flex items-center justify-center w-1/2 px-2 py-2  transition-colors duration-200 bg-white border rounded-full border-black gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
      <svg class="w-4 h-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="2" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
      </svg>
  </button>
</a>
@php
$folder_name = basename(dirname($photo->image_url));
@endphp

@if($folder_name === 'banner')
<div class="flex my-4">
  <div class="w-4/12 p-4 mx-4 ml-12 mr-4 ">
    <img src="{{ $photo->image_url }}" alt="Foto" name="img_url">
  </div>
  <div class="w-3/12 p-4 ">
    <h2 class="text-xl font-semibold mb-3">Netflix Banner Design</h2>
    <h3 class="text-lg text-gray-700 mb-2">Ukuran Banner</h3>
    <p>Panjang : 60 cm</p>
    <p class="mb-5">Panjang : 160 cm</p>
    <h3 class="text-lg text-gray-700 mb-2">Detail</h3>
    <p>Custome judul</p>
    <p>Custome text</p>
    <p>Font judul disesuaikan</p>
    <p>Foto untuk {{ $jumlah_form }} orang</p>
  </div>
  <div class="w-5/12 p-4 mx-4 ml-6 mr-12">
    <h3 class="text-lg text-gray-700 mb-2">Harga Design Banner</h3>
    <p class="font-semibold">Rp. 35.000</p>
  </div>
</div>

<div class="container mx-auto px-4">
  <h2 class="text-lg font-semibold mb-4">Isi Detail Pemesanan</h2>

  <!-- Form 1 -->
  <form action="{{ route('order.store') }}" method="POST">
    @csrf <!-- Menambahkan CSRF token -->
    <div class="mb-8">
      <input type="text" id="field1" name="judul" placeholder="Judul Banner" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>

    <h3 class="text-md font-semibold mb-4">Detail Nama dan Deskripsi</h3>

    @for ($i = 1; $i <= $jumlah_form; $i++)
      <div class="flex flex-wrap mb-6">
        <div class="w-full md:w-1/2 pr-2">
          <input type="text" id="nama{{ $i }}" name="nama{{ $i }}" placeholder="Nama({{ $i }})" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="w-full md:w-1/2 pl-2">
          <input type="text" id="deskripsi{{ $i }}" name="deskripsi{{ $i }}" placeholder="Deskripsi({{ $i }})" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
      </div>
    @endfor
    <input type="hidden" name="img" value="{{ $photo->image_url }}">
    <input type="hidden" name="harga" value="{{ 35000 }}">
    <div class="flex container mx-auto px-4">
      <a href="{{ route('about_us') }}"><button type="button" class="bg-gray-700 hover:bg-blue-700 text-white py-2 px-4 rounded-full">Checkout</button></a>
      <a href="{{ route('cart') }}"><button type="submit" class="font-sans block mt-4 lg:inline-block lg:mt-0 lg:ml-6 align-middle text-black hover:text-gray-700 relative flex"></a>
        <svg class="flex-1 w-8 h-8" viewBox="0 0 24 24">
          <!-- Lingkaran yang membungkus ikon cart -->
          <circle cx="12" cy="12" r="12" fill="#BA6264" />
          <!-- Ikon cart -->
          <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" fill="white"/>
        </svg>
      </button>  
    </div>
  </form>
</div>
</div>

@elseif($folder_name === 'photocard')
<div class="flex my-4">
  <div class="w-4/12 p-4 mx-4 ml-12 mr-4 ">
    <img src="{{ $photo->image_url }}" alt="Foto">
  </div>
  <div class="w-3/12 p-4 ">
    <h2 class="text-xl font-semibold mb-3">B&W Photocard</h2>
    <h3 class="text-lg text-gray-700 mb-2">Ukuran Banner</h3>
    <p>Panjang : 10 cm</p>
    <p class="mb-5">Panjang : 14,5 cm</p>
    <h3 class="text-lg text-gray-700 mb-2">Detail</h3>
    <p>Custome judul</p>
    <p>Custome text</p>
    <p>Font judul disesuaikan</p>
    <p>Harga sudah termasuk bingkai akrilik</p>
  </div>
  <div class="w-5/12 p-4 mx-4 ml-6 mr-12">
    <h3 class="text-lg text-gray-700 mb-2">Harga Design Banner</h3>
    <p class="font-semibold">Rp. 35.000</p>
  </div>
</div>
<div class="container mx-auto px-4">
  <h2 class="text-lg font-semibold mb-4">Isi Detail Pemesanan</h2>

  <!-- Form 1 -->
  <form action="{{ route('order.store') }}" method="POST">
    @csrf <!-- Menambahkan CSRF token -->
    <div class="mb-8">
      <input type="text" id="field1" name="judul" placeholder="Judul Photocard" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>
    <input type="hidden" name="img" value="{{ $photo->image_url }}">
    <input type="hidden" name="harga" value="{{ 35000 }}">

    <div class="flex container mx-auto px-4">
      <a href="{{ route('about_us') }}"><button type="button" class="bg-gray-700 hover:bg-blue-700 text-white py-2 px-4 rounded-full">Checkout</button></a>
      <a href="{{ route('cart') }}"><button type="submit" class="font-sans block mt-4 lg:inline-block lg:mt-0 lg:ml-6 align-middle text-black hover:text-gray-700 relative flex"></a>
        <svg class="flex-1 w-8 h-8" viewBox="0 0 24 24">
          <!-- Lingkaran yang membungkus ikon cart -->
          <circle cx="12" cy="12" r="12" fill="#BA6264" />
          <!-- Ikon cart -->
          <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" fill="white"/>
        </svg>
      </button>  
    </div>
  </form>
</div>
</div>
@endif


@endsection
