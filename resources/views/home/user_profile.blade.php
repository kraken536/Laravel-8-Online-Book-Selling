@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('title', 'User Profile')
    
@section('contenu')
    <main id="main">
    
        <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>User Profile</h2>
            <ol>
              <li><a href="{{route('homepage')}}">Home</a></li>
              <li>User Profile</li>
            </ol>
          </div>
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">
  
          <div class="row content">
            <div class="col-lg-2">
                  <h4>User Profile</h4>
              <ul style="font-style: bold">
                <li><a href="#">My Profile</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="#">My Reviews</a></li>
                <li><a href="#">My ShopCart</a></li>
                <li><a href="#">My Messages</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </div>
            <div class="col-lg-10 pt-4 pt-lg-0">
              @include('profile.show')
            </div>
          </div>
  
        </div>
      </section>
      <!-- End About Section -->
    
    </main>
@endsection