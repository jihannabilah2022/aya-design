@extends('layouts.homelayouts')

@section('konten')
<section class="text-gray-600 body-font mb-20">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <div class="mb-4">
                <h1 class="inline-block text-5xl font-bold" style="color: #142131; margin-right: 8px;">How To</h1>
                <h1 class="inline-block text-5xl font-bold" style="color: #BA6264;">Order</h1>
            </div>
        </div>

        <div class="lg:w-2/3 mx-auto">
        <ul class="list-decimal list-inside text-left space-y-4">
                <li>
                    <strong>Pilih Desain</strong>
                    <p class="ml-4">Pilih desain mana yang ingin kamu buatkan dari katalog desain kami.</p>
                </li>
                <li>
                    <strong>Isi Detail Pemesanan</strong>
                    <p class="ml-4">Isi detail pemesanan seperti nama, deskripsi, dan informasi tambahan lainnya yang diperlukan.</p>
                </li>
                <li>
                    <strong>Masukkan ke Keranjang</strong>
                    <p class="ml-4">Setelah memilih desain dan mengisi detail pemesanan, masukkan item tersebut ke dalam keranjang belanja.</p>
                </li>
                <li>
                    <strong>Checkout</strong>
                    <p class="ml-4">Lakukan proses checkout untuk menyelesaikan pemesanan. Kamu akan diarahkan ke WhatsApp untuk konfirmasi dan detail lebih lanjut.</p>
                </li>
            </ul>
        </div>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-center mt-20 font-bold">Thank You For Visit Us!</p>
    </div>
</section>
@endsection
