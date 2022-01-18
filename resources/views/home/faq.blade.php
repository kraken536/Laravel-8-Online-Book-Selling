@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('title', 'FAQ')
@section('description', $data->description)
@section('keywords', $data->keywords)

@section('accordiOn')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
$( function() {
  $( "#accordion" ).accordion();
} );
</script>  

@endsection

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
          <h2>FAQ</h2>
          <h2>@yield('searchcumb')</h2>
          <ol>
            <li><a href="{{route('homepage')}}">Home</a></li>
            <li>FAQ</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-4">
            <h2>FAQ Page</h2>
            <h3>Here The Questions Frequently Asked By The Customers Are Getting Answered:</h3>
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0">

            <div class="accordion" id="accordionExample">
              @php
                $i = 1;
              @endphp
              @foreach($datalist as $rs)
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{$i}}">
                  <button class="accordion-button @if($i > 1) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i}}" aria-expanded="@if($i == 1)true @else false @endif" aria-controls="collapse{{$i}}">
                    <strong>{!! $rs->question !!}</strong>
                  </button>
                </h2>
                <div id="collapse{{$i}}" class="accordion-collapse collapse @if($i == 1) show @endif" aria-labelledby="heading{{$i}}" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Answer:</strong> 
                    {!! $rs->answer !!}
                  </div>
                </div>
              </div>
                @php
                $i += 1;
              @endphp
              @endforeach
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container">

    <div class="section-title">
      <h2>Team</h2>
      <p>Our Hardowrking Team</p>
    </div>

    <div class="row">

      <div class="col-lg-6">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="{{asset('assets')}}/home/assets/img/team/Hades.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Hades</h4>
            <span>Chief Executive Officer</span>
            <p>Links To Social Media</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4 mt-lg-0">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="{{asset('assets')}}/home/assets/img/team/saga.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Saga Of Gemini</h4>
            <span>Product Manager</span>
            <p>Links To Social Media</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="{{asset('assets')}}/home/assets/img/team/bulma.jfif" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Bulma</h4>
            <span>CTO</span>
            <p>Links To Social Media</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="{{asset('assets')}}/home/assets/img/team/athena.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Athena</h4>
            <span>Accountant</span>
            <p>Links To Social Media</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Team Section -->

  </main><!-- End #main -->
@endsection


