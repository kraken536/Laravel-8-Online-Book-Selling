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

         <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title">
          <h2>Features</h2>
          <p>User Profile</p>
        </div>

        <div class="row col-lg-12">
          <div class="col-lg-2">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-1">My Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-2">My Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">My Reviews</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">My ShopCart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">My Products</a>
              </li>
              <li class="nav-item">
                <a  href="{{route('logout_home')}}">Logout</a>
              </li>
            </ul>
          </div>
          <div class=" col-lg-10 pt-4 pt-lg-0">
            <div class="tab-content">
              
              
              <div class="tab-pane" id="tab-1">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    @include('profile.show')
                  </div>
                </div>
              </div>

              <div class="tab-pane active show" id="tab-2">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    @include('home.flash-message')
                    <table class="table table-hover">
                     
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Email</th>
                          <th scope="col">Address</th>
                          <th scope="col">Total</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $total = 0;
                        @endphp
                        @foreach ($orderlist as $rs)
                        <tr>
                          <td style=" padding-top: 40px;">{{$rs->id}}</td>
                          <td style=" padding-top: 40px;">{{$rs->name}}</td>
                          <td style=" padding-top: 40px;">{{$rs->phone}}</td>
                          <td style=" padding-top: 40px;">{{$rs->email}}</td>
                          <td style=" padding-top: 40px;">{{$rs->address}}</td>
                          <td style=" padding-top: 40px;">{{$rs->total}}</td>
                          <td style=" padding-top: 40px;">{{$rs->created_at}}</td>
                          <td style=" padding-top: 40px;">{{$rs->status}}</td>
                          <td style="text-align: center; padding-top: 30px"><a href="{{ route('user_product_edit', ['id' => $rs->id]) }}" alt="Report" title="Report" ><img src="{{ asset('assets')}}/report.png" width="35"></a></td><!--EDIT button -->
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
                  
                </div>
              </div>



              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                  
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    @include('home.flash-message')
                                    <thead>
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Review</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($datalist as $rs)
                                      <tr>
                                        <th scope="row">{{$rs->id}}</th>
                                        <td><a href="{{route('product_detail',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a></td>
                                        <td>{{$rs->subject}}</td>
                                        <td>{{$rs->review}}</td>
                                        <td>{{$rs->rate}}</td>
                                        <td>{{$rs->status}}</td>
                                        <td>{{$rs->created_at}}</td>
                                        <td style="text-align: center"><a href="{{ route('delete_reviews',['id'=>$rs->id])}}" onclick="return confirm('Are you sure you want to delete this?')" title="Delete"><button type="button" class="btn btn-outline-danger">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                          </svg> </button></a></td><!--DELETE button -->
                                      </tr>
                                      @endforeach
                                      <tr>
                                    </tbody>
                                  </table>
                              </div>
                </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    {{-- <div class="table-responsive"> --}}
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
                          @foreach ($cartlist as $rs)
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
                            <td colspan="2"><a href="#" ><button type="button" class="btn btn-danger">Place Order</button></a></td>
                          </tr>
                        </tfoot>
                      </table>
                      
                  {{-- </div> --}}
                </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <a href="{{route('user_product_add')}}"><button type="button" class="btn btn-danger" >Add Product</button></a>
                    <br/><br/><br/>
                    <div class="table-responsive">
                      @include('home.flash-message')
                      <table class="table table-hover">  
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Title</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Images</th>
                            <th scope="col">Gallery</th>
                            <th scope="col">Status</th>
                            <th scope="col" colspan="2">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($productlist as $rs)
                          <tr>
                            <th scope="row">{{$rs->id}}</th>
                            <td>{{App\Http\Controllers\admin\CategoryController::getParentsTree($rs->category, $rs->category->title)}}</td>
                            <td>{{$rs->title}}</td>
                            <td>{{$rs->quantity}}</td>
                            <td>{{$rs->price}}</td>
                            <td>
                              @if($rs->image)
                                <img src="{{ Storage::url($rs->image) }}" width="80" alt="...">
                              @endif
                            </td>
                            <td style="text-align:center"><a href="{{ route("user_image_add", ['product_id'=>$rs->id])}}" onclick="return !window.open(this.href, '','top=50 left=100 width=1100, height=700')"><img src="{{ asset('assets')}}/gallery.png" width="35" title="Gallery"></a></td>
                                            <td>{{$rs->status}}</td>
                                            <td style="text-align: center"><a href="{{ route('user_product_edit', ['id' => $rs->id]) }}" alt="Update" title="Update" ><img src="{{ asset('assets')}}/edit.png" width="35"></a></td><!--EDIT button -->
                            <td style="text-align: center"><a href="{{ route('user_product_delete',['id'=>$rs->id])}}" onclick="return confirm('Are you sure you want to delete this?')" title="Delete"><button type="button" class="btn btn-outline-danger">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
              </svg> </button></a></td><!--DELETE button -->
                          </tr>
                          @endforeach
                          <tr>
                        </tbody>
                      </table>
                  </div>
                  </div>
                </div>  
              </div>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->
    </main>
@endsection