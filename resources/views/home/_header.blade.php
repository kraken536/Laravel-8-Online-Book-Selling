<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="{{$data->description}}" name="description">
  <meta content="{{$data->keywords}}" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets') }}/home/assets/img/log.jpeg" rel="icon">
  <link href="{{ asset('assets') }}/home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets') }}/home/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/home/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/home/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/home/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/home/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets') }}/home/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v4.7.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">




</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{route('homepage')}}">Bookstore</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
        {{-- <a href="{{route('homepage')}}" class="logo me-auto"><img src="{{ asset('assets') }}/home/assets/img/logo.jpg" alt="" class="img-fluid"></a> --}}

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('homepage')}}" class='active'>Home</a></li>
          @include('home._category')
          <li><a href="{{route('aboutus')}}">About Us</a></li>
          <li><a href="{{route('references')}}">References</a></li>
          {{-- <li><a href="pricing.html">Pricing</a></li> --}}
          <li><a href="{{route('faq')}}">FAQ</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
          <li><a href="{{route('homepage')}}" class="getstarted">Get Started</a></li>
          @include('home._usermenu')
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->
  @yield('contenu')