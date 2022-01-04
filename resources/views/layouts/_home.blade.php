@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('contenu')
    @include('home._contentHome')
@endsection

@section('title', $data->title)
@section('description', $data->description)
@section('keywords', $data->keywords)


@section('search')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      
      <div class="d-flex justify-content-between align-items-center">
        {{-- <h2>About</h2> --}}
                <h5 class="sidebar-title">Search</h5>
                <nav class="navbar navbar-light bg-light">
                  <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-grey my-2 my-sm-0" type="submit"><img src="{{ asset('assets')}}/search-engine.png" width="35"></button>
                  </form>
                </nav>
      </div>
  
    </div>
  </section><!-- End Breadcrumbs -->
@endsection