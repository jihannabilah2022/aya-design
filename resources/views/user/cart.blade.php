@extends('layouts.homelayouts')

@section('konten')
<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
  <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>

    <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
      <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
        <div class="space-y-6">
          @foreach($orders as $order)
      <div
        class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
        <!-- Gambar Produk -->
        <a href="#" class="shrink-0 md:order-1">
          <img class="h-20 w-20 dark:hidden" src="{{ $order->img }}" alt="Product Image" />
          <img class="hidden h-20 w-20 dark:block" src="{{ $order->img }}" alt="Product Image" />
        </a>

        <!-- Harga Produk -->
        <div class="text-end md:order-4 md:w-32">
          <p class="text-base font-bold text-gray-900 dark:text-black">{{ $order->harga }}</p>
        </div>

        <!-- Informasi Produk -->
        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
          <a href="#"
          class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $order->judul }}</a>

          <!-- Tombol Aksi -->
          <div class="flex items-center gap-4">
          <form action="{{ route('cart.detail', $order->id) }}" method="GET">
            <button type="submit"
            class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
            Lihat Detail Pesanan
            </button>
          </form>
          <form action="{{ route('cart.remove', $order->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
            class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
            <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
              height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
            Remove
            </button>
          </form>
          </div>
        </div>
        </div>
      </div>
    @endforeach
        </div>
      </div>

      <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
        <!-- Ringkasan pesanan -->
        <div
          class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
          <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

          <div class="space-y-4">
            <!-- Tampilkan informasi ringkasan pesanan -->
          </div>

          <!-- Total pembayaran -->
          @php
      $totalharga = 0;
      foreach ($orders as $order) {
      $totalharga += $order->harga;
      }
    @endphp

          <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
            <dd class="text-base font-bold text-gray-900 dark:text-white">Rp. {{ $totalharga }}</dd>
          </dl>

          <!-- Tombol lanjutkan ke pembayaran -->
          <form action="{{ route('checkout') }}" method="POST" class="flex w-full items-center justify-center">
            @csrf
            <button type="submit"
              class="rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-black hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
              Proceed to Checkout
            </button>
          </form>
          <!-- Tombol lanjutkan belanja -->
          <div class="flex items-center justify-center gap-2">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
            <a href="{{ route('go_shopping') }}" title=""
              class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
              Continue Shopping
              <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 12H5m14 0-4 4m4-4-4-4" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection