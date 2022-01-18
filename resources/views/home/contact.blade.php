@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp


@extends('home.index')



@section('title', 'Contact')
@section('description', $data->description)
@section('keywords', $data->keywords)


@section('searchcumb')
    <div class="container">
      
      <div class="d-flex justify-content-between align-items-center">
        <form action="{{route('getproduct')}}" method="post" class="form-inline" role="form" enctype="multipart/form-data">
                    @csrf
                    @livewire('search')
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
          <h2>Contact</h2>
          <h2>@yield('searchcumb')</h2>
          <ol>
            <li><a href="{{route('homepage')}}">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3001.492916144224!2d32.65447721570936!3d41.211027614871824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x4083535a1262e845%3A0xd8db4aca72dc92de!2zS2FyYWLDvGsgw5xudi4geW9sdSwgS8SxbGF2dXpsYXIvS2FyYWLDvGsgTWVya2V6L0thcmFiw7xrLCBUdXJxdWll!3m2!1d41.2110236!2d32.6566659!5e0!3m2!1sfr!2sbg!4v1642477723921!5m2!1sfr!2sbg" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>{{$data->address}}</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{$data->email}}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>{{$data->phone}}</p>
              </div>

            </div>

          </div>
            
          <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="form-group" style="text-align: center">@include('home.flash-message')</div>
            <form method="post" action="{{route('send_message')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name & Surname" required>
              </div>
              <br />
              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
              </div>
              <br />
              <div class="form-group">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
              </div>
              <br />
              <div class="form-group">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
              </div>
              <br />
              <div class="form-group">
                <textarea type="text" class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
              </div>
              <br />
              <div class="form-group" style="text-align: center"><button type="submit" class="btn btn-danger" >Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection