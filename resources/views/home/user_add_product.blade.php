@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('title', 'User Add Product')

@section('javascript')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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
                <a class="nav-link " data-bs-toggle="tab" href="#tab-1">My Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">My Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">My Reviews</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">My ShopCart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-5">My Products</a>
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

              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <table class="table table-hover">
                      @include('home.flash-message')
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
                  </div>
                </div>
              </div>

              <div class="tab-pane active show" id="tab-5">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">

                    <div class="form-group" style="text-align: center">@include('home.flash-message')</div>
            <form action="{{route('user_product_store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="parent_id">
                    @foreach ($productlist as $rs)
                        <option value="{{$rs->id}}">{{App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title)}}</option>
                    @endforeach
                </select>
            </div>

              <div class="form-group">
                <label>Title *</label>
                <input type="text" class="form-control" name="title" placeholder="Title" required>
              </div>
              
              <div class="form-group">
                <label>Keywords</label>
                <input type="text" class="form-control" name="keywords" placeholder="Keywords">
              </div>
              
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description">
              </div>

              <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" placeholder="price">
            </div>

              <div class="form-group">
                <label>Quantity *</label>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
            </div>
              
              <div class="form-group">
                <label>Details</label>
                <textarea type="text" class="form-control" id="summernote" name="details" placeholder="Message" rows="5"></textarea>
                <script>
                    $('#summernote').summernote({
                        tabsize: 2,
                        height: 120,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline', 'clear']],
                            ['fontname', ['fontname']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                    ] 
                    });
                </script>
              </div>
              
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image">
               </div>
              
              <div class="form-group">
                <label>Tax</label>
                <input type="text" class="form-control" name="tax" value="18">
            </div>
              
              <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" id="" name="slug" placeholder="Slug">
            </div>
              
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option selected="selected">False</option>
                    <option>True</option>
                </select>
            </div>
              <br />
              <div class="form-group" style="text-align: center"><button type="submit" class="btn btn-danger">Save Product</button></div>
            </form>

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