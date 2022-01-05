@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('title', 'User Profile')


@section('searchcumb')
    <div class="container">
      
      <div class="d-flex justify-content-between align-items-center">
        {{-- <h2>About</h2> --}}
                {{-- <h5 class="sidebar-title">Search</h5> --}}
                
                  <form action="{{route('getproduct')}}" method="post" class="form-inline" role="form" enctype="multipart/form-data">
                    @csrf
                    @livewire('search')
                    {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> --}}
                    <button class="btn btn-outline-grey my-2 my-sm-0" type="submit"><img src="{{ asset('assets')}}/search-engine.png" width="35"></button>
                  </form>
                  @livewireScripts
      </div>
  
    </div>

@endsection


@section('contenu')
    <main id="main">
    
        <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>User Profile</h2>
            <h2>@yield('searchcumb')</h2>
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