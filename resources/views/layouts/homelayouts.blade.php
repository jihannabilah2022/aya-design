<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <!-- Load jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
     .carousel-container {
      display: flex;
      justify-content: center;
    }

    .carousel3 {
      max-width: 800px; /* Adjust maximum width as needed */
      width: 100%;
    }
    .carousel4 {
      max-width: 1100px; /* Adjust maximum width as needed */
      width: 100%;
    }

    .carousel-caption {
      text-align: center;
    }
    .item:hover {
    filter: brightness(80%);
  }
  body{
    background-color: #F0F0F0;
  }
  </style>
</head>
<body class="antialiased">
    @include('layouts.partials.nav')
    @yield('konten')
    @include('layouts.partials.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".carousel3.carousel-3-items").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          }
        }
      });

      $(".carousel4.carousel-4-items").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 4
          }
        }
      });
    });
  </script>
</body>
</html>

