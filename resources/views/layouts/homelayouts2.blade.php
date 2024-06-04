<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href="https://fonts.googleapis.com/css2?family=Qaligo&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <!-- Load jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</style>
<style>
  @font-face {
    font-family: 'Qaligo';
    src: url('/Qaligo Regular - Demo.otf') format('opentype');
  }
  
  .judul {
    font-family: 'Qaligo', Arial, sans-serif;
    color: #3b3a39;
  
  body{
    background-color: #F0F0F0;
  }
  </style>
</head>
<body class="antialiased">
    @include('layouts.partials.nav')
    @yield('konten')
    @include('layouts.partials.footerAdmin')
    
</body>
</html>

