@extends('layouts.homelayouts')

@section('konten')
 <!-- PhotoCard -->
 <section class="text-gray-600 body-font mt-20" style="margin-bottom: 250px;">
 <h1 class="text-center judul text-xl mb-10">Photocard</h1>

    <div class="container px-5 py-8 mx-auto carousel-container">
      <div class="owl-carousel owl-theme carousel3 carousel-3-items">
        <div class="item">
        <a href="{{ route('pesan', ['id' => 1]) }}">
            <div class="mb-10 px-4" style="width: 280px; height: 500px;">
              <div class="overflow-hidden">
                <img alt="content" class="object-cover object-center h-96 w-auto" src="\image\photocard\photocard1.png">
              </div>
              <div class="carousel-caption">
                <h2 class="text-xl font-medium title-font text-gray-900">B&W Photocard</h2>
                <p class="text-base leading-relaxed mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, iure.</p>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-2">Rp. 35.000</h2>
              </div>
            </div>
          </a>
        </div>
        <!-- Add other items here -->
        <div class="item">
        <a href="{{ route('pesan', ['id' => 2]) }}">
            <div class="mb-10 px-4" style="width: 280px; height: 500px;">
              <div class="overflow-hidden">
                <img alt="content" class="object-cover object-center h-96 w-auto" src="\image\photocard\photocard2.png">
              </div>
              <div class="carousel-caption">
                <h2 class="text-xl font-medium title-font text-gray-900">B&W Photocard</h2>
                <p class="text-base leading-relaxed mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, iure.</p>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-2">Rp. 35.000</h2>
              </div>
            </div>
          </a>
        </div>
        <!-- Add other items here -->
        <div class="item">
        <a href="{{ route('pesan', ['id' => 3]) }}">
            <div class="mb-10 px-4" style="width: 280px; height: 500px;">
              <div class="overflow-hidden">
                <img alt="content" class="object-cover object-center h-96 w-auto" src="\image\photocard\photocard3.png">
              </div>
              <div class="carousel-caption">
                <h2 class="text-xl font-medium title-font text-gray-900">B&W Photocard</h2>
                <p class="text-base leading-relaxed mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, iure.</p>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-2">Rp. 35.000</h2>
              </div>
            </div>
          </a>
        </div>
        <!-- Add other items here -->
        <div class="item">
        <a href="{{ route('pesan', ['id' => 1]) }}">
            <div class="mb-10 px-4" style="width: 280px; height: 500px;">
              <div class="overflow-hidden">
                <img alt="content" class="object-cover object-center h-96 w-auto" src="\image\photocard1.png">
              </div>
              <div class="carousel-caption">
                <h2 class="text-xl font-medium title-font text-gray-900">B&W Photocard</h2>
                <p class="text-base leading-relaxed mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, iure.</p>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-2">Rp. 35.000</h2>
              </div>
            </div>
          </a>
        </div>
        <!-- Add other items here -->
      </div>
    </div>
  </section>


 <!-- Banner -->
  <section class="text-gray-600 body-font mt-20" style="margin-bottom: 250px;">
  <h1 class="text-center judul text-xl mb-10">Banner</h1>

    <div class="container px-5 py-8 mx-auto carousel-container">
      <div class="owl-carousel owl-theme carousel4 carousel-4-items">
        <div class="item">
          <a href="{{ route('pesan', ['id' => 8]) }}">
            <div class="mb-10 px-4" style="width: 260px; height: 800px;">
              <div class="overflow-hidden">
                <img alt="content" class="object-cover object-center h-auto w-auto" src="image\banner\banner1.png">
              </div>
              <div class="carousel-caption">
                <h2 class="text-xl font-medium title-font text-gray-900">B&W Banner</h2>
                <p class="text-base leading-relaxed mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, iure.</p>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-2">Rp. 35.000</h2>
              </div>
            </div>
          </a>
        </div>
        <!-- Add other items here -->
        <div class="item">
          <a href="{{ route('pesan', ['id' => 9]) }}">
            <div class="mb-10 px-4" style="width: 260px; height: 800px;">
              <div class="overflow-hidden">
                <img alt="content" class="object-cover object-center h-auto w-auto" src="image\banner\banner2.png">
              </div>
              <div class="carousel-caption">
                <h2 class="text-xl font-medium title-font text-gray-900">B&W Banner</h2>
                <p class="text-base leading-relaxed mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, iure.</p>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-2">Rp. 35.000</h2>
              </div>
            </div>
          </a>
        </div>
        <!-- Add other items here -->
        <div class="item">
          <a href="{{ route('pesan', ['id' => 10]) }}">
            <div class="mb-10 px-4" style="width: 260px; height: 800px;">
              <div class="overflow-hidden">
                <img alt="content" class="object-cover object-center h-auto w-auto" src="image\banner\banner3.png">
              </div>
              <div class="carousel-caption">
                <h2 class="text-xl font-medium title-font text-gray-900">B&W Banner</h2>
                <p class="text-base leading-relaxed mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, iure.</p>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-2">Rp. 35.000</h2>
              </div>
            </div>
          </a>
        </div>
        <!-- Add other items here -->
        <div class="item">
          <a href="{{ route('pesan', ['id' => 11]) }}">
            <div class="mb-10 px-4" style="width: 260px; height: 800px;">
              <div class="overflow-hidden">
                <img alt="content" class="object-cover object-center h-auto w-auto" src="image\banner\banner4.png">
              </div>
              <div class="carousel-caption">
                <h2 class="text-xl font-medium title-font text-gray-900">B&W Banner</h2>
                <p class="text-base leading-relaxed mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, iure.</p>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-2">Rp. 35.000</h2>
              </div>
            </div>
          </a>
        </div>
        <div class="item">
          <a href="{{ route('about_us') }}">
            <div class="mb-10 px-4" style="width: 260px; height: 800px;">
              <div class="overflow-hidden">
                <img alt="content" class="object-cover object-center h-auto w-auto" src="image\banner\banner3.png">
              </div>
              <div class="carousel-caption">
                <h2 class="text-xl font-medium title-font text-gray-900">B&W Banner</h2>
                <p class="text-base leading-relaxed mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, iure.</p>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-2">Rp. 35.000</h2>
              </div>
            </div>
          </a>
        </div>
        <!-- Add other items here -->
      </div>
    </div>
  </section>

@endsection
