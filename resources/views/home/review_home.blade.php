@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('title', 'User Reviews')
@section('description', $data->description)
@section('keywords', $data->keywords)


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
          <h2>Reviews</h2>
          <h2>@yield('searchcumb')</h2>
          <ol>
            <li><a href="{{route('homepage')}}">Home</a></li>
            <li>Reviews</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

</main>
@endsection