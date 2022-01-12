@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('title', 'Place Order')
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
          <h2>Place Order</h2>
          <h2>@yield('searchcumb')</h2>
          <ol>
            <li><a href="{{route('homepage')}}">Home</a></li>
            <li>Place Order</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          @php
            $prix = $total;
          @endphp
          <div class="col-lg-7">
            <h3>Order Details:</h3>
            <div class="form-group" style="text-align: center">@include('home.flash-message')</div>
            <form method="post" action="{{route('user_order_store')}}" enctype="multipart/form-data">
              @csrf
              
              <div class="form-group">
                
                {{-- <label for="formGroupExampleInput">Example label</label> --}}
                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Name & Surname" required>
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Email" required>
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" placeholder="Phone Number">
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}" placeholder="Address">
              </div>
              <br />
              {{-- <div class="form-group" style="text-align: center"><button type="submit" class="btn btn-danger">Place Order</button></div> --}}
          </div>


          <div class="col-lg-5">
            <h3>Payment Details:</h3>
            <div class="form-group" style="text-align: center">@include('home.flash-message')</div>
            
            <div class="form-group">
              {{-- <label></label> --}}
              <input type="number" class="form-control" name="totalshow" placeholder="Total: {{$prix}} ₺"disabled>
            </div>
            
            <div class="form-group" hidden>
              <label>Total:</label>
              <input type="number" class="form-control" name="prix" value="{{$prix}}" placeholder="Total">
            </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control" name="cardnumber" placeholder="Cart Number" required>
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control" name="date" placeholder="Valid Date: YYYY-MM">
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control"  name="secretnumber" placeholder="CCV *">
              </div>
              <br />
              <div class="form-group" style="text-align: center"><button type="submit" class="btn btn-danger">Place Order</button></div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
</main>
@endsection