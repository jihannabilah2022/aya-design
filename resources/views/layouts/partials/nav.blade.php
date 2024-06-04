<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="\image\logo.png" alt="ayaDesign" style="width: 80px;">
        </a>
        @if(Auth::check())
            @if(Auth::user()->usertype === 'admin')
                <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                    <a class="mr-5 hover:text-gray-900 text-xl" href="{{ route('home') }}">Dashboard</a>
                    <a class="mr-5 hover:text-gray-900 text-xl" href="{{ route('admin.users.index') }}">Manajemen Pengguna</a>
                    <a class="mr-5 hover:text-gray-900 text-xl" href="{{ route('transaksi.index') }}">Manajemen Transaksi</a>
                    @if($dashboard)
                        @include('dashboard')
                    @endif
                </nav>
            @else
                <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                    <a class="mr-5 hover:text-gray-900 text-xl" href="{{ route('home') }}">Home</a>
                    <a class="mr-5 hover:text-gray-900 text-xl" href="{{ route('about_us') }}">About Us</a>
                    <a class="mr-5 hover:text-gray-900 text-xl" href="{{ route('go_shopping') }}">Go Shopping</a>
                    <a href="{{ route('cart') }}">
                    <button type="submit"
                        class="font-sans block mt-4 lg:inline-block lg:mt-0 lg:ml-6 align-middle text-black hover:text-gray-700 relative flex items-center">
                        <svg class="flex-1 w-8 h-8" viewBox="0 0 24 24">
                            <!-- Lingkaran yang membungkus ikon cart -->
                            <circle cx="12" cy="12" r="12" fill="#BA6264" />
                            <!-- Ikon cart -->
                            <path
                                d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"
                                fill="white" />
                        </svg>
                    </button>
                    </a>
                    @if($dashboard)
                        @include('dashboard')
                    @endif
                </nav>
            @endif
        @else
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900 text-xl" href="{{ route('home') }}">Home</a>
                <a class="mr-5 hover:text-gray-900 text-xl" href="{{ route('about_us') }}">About Us</a>
                <a class="mr-5 hover:text-gray-900 text-xl" href="{{ route('go_shopping') }}">Go Shopping</a>
                <a href="{{ route('cart') }}">
                    <button type="submit"
                        class="font-sans block mt-4 lg:inline-block lg:mt-0 lg:ml-6 align-middle text-black hover:text-gray-700 relative flex items-center">
                        <svg class="flex-1 w-8 h-8" viewBox="0 0 24 24">
                            <!-- Lingkaran yang membungkus ikon cart -->
                            <circle cx="12" cy="12" r="12" fill="#BA6264" />
                            <!-- Ikon cart -->
                            <path
                                d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"
                                fill="white" />
                        </svg>
                    </button>
                </a>
            </nav>

            @if($dashboard)
                @include('dashboard')
            @endif
            </nav>
        @endif


    </div>
</header>