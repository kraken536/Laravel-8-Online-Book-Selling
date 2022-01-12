@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp


@extends('home.index')



@section('title', 'User ShopCart')
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
            <h2>ShopCart</h2>
            <h2>@yield('searchcumb')</h2>
            <ol>
              <li><a href="{{route('homepage')}}">Home</a></li>
              <li>ShopCart</li>
            </ol>
          </div>
  
        </div>
      </section>
      <!-- End Breadcrumbs -->
      <section id="about" class="about">
        <div class="container">
  
          <div class="row content">
            <div class="table-responsive">
              <table class="table table-hover">
                @include('home.flash-message')
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $total = 0;
                  @endphp
                  @foreach ($productlist as $rs)
                  <tr>
                    <td>
                      @if($rs->product->image)
                        <img src="{{ Storage::url($rs->product->image) }}" width="80" alt="...">
                      @endif  
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="{{route('product_detail',['id' => $rs->product->id])}}">{{$rs->product->title}}</a>
                    </td>
                    <td style=" padding-top: 40px;">{{$rs->product->price}}</td>
                    <td style=" padding-top: 40px;">
                      <form action="{{route('user_shopcart_update',['id'=>$rs->id])}}" method="post" enctype="multipart/form-data">
                        @csrf  
                        <input type="number" name="quantity" id="product-quanity" value="{{$rs->quantity}}" min="1" max="{{$rs->product->quantity}}" onchange="this.form.submit()">
                      </form>
                      </td>
                    <td style=" padding-top: 40px;">{{$rs->product->price * $rs->quantity}}</td>
                    <td style="text-align: center; padding-top: 30px"><a href="{{ route('user_shopcart_delete',['id'=>$rs->id])}}" onclick="return confirm('Are you sure you want to delete this?')" title="Delete"><button type="button" class="btn btn-outline-danger">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
      </svg> </button></a></td><!--DELETE button -->
                  </tr>
                  @php
                    $total += $rs->product->price * $rs->quantity;
                  @endphp

                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="3"></th>
                    <th>SHIPPING:</th>
                    <td colspan="2"><strong>Free shipping</strong></td>
                  </tr>
                  <tr>
                    <th colspan="3"></th>
                    <th>Total:</th>
                    <td colspan="2"><strong>{{ $total }} ₺</strong></td>
                  </tr>
                  <tr>
                    <th colspan="3"></th>
                    <th></th>
                    <td colspan="2">
                      <form action="{{route('user_order_add')}}" method="post" enctype="multipart/form-data">  
                        @csrf 
                        <input type="number" name="total" value="{{$total}}" hidden>
                        <button type="submit" class="btn btn-danger">Place Order</button>
                      </form>
                      </td>
                  </tr>
                </tfoot>
              </table>
          </div>
          
          </div>
        </div>
  
      </section>

</main>


@endsection