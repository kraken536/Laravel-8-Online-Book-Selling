@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp


@extends('home.index')



@section('title', 'Contact')
@section('description', $data->description)
@section('keywords', $data->keywords)




@section('contenu')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
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
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
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
                {{-- <label for="formGroupExampleInput">Example label</label> --}}
                <input type="text" class="form-control" id="name" name="name" placeholder="Name & Surname" required>
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
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