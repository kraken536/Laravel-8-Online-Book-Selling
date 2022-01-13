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
                  <div class="col-lg-10 details order-2 order-lg-1">
                    <h3>Et blanditiis nemo veritatis excepturi</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/features-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    {{-- <section id="about" class="about">
                      <div class="container">
                
                        <div class="row content">
                          <section id="about" class="about">
                            <div class="container">
                      
                              <div class="row content"> --}}
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
                              
                              {{-- </div>
                            </div> --}}
{{--                       
                          </section>
                      
                        
                        </div>
                      </div>
                
                    </section> --}}
                </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/features-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>

              <div class="tab-pane active show" id="tab-5">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">

                    <div class="form-group" style="text-align: center">@include('home.flash-message')</div>
            <form action="{{route('user_product_update',['id'=>$object->id])}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="parent_id">
                    @foreach ($productlist as $rs)
                    <option value ="{{ $rs->id }}" @if($rs->id == $object->category_id) selected="selected" @endif>
                        {{App\Http\Controllers\admin\CategoryController::getParentsTree($rs, $rs->title)}}
                    </option>
                @endforeach
                </select>
            </div>

              <div class="form-group">
                <label>Title *</label>
                <input type="text" class="form-control" name="title" value="{{ $object->title }}" required>
              </div>
              
              <div class="form-group">
                <label>Keywords</label>
                <input type="text" class="form-control" name="keywords" value="{{ $object->keywords }}">
              </div>
              
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" value="{{ $object->description }}">
              </div>

              <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" value="{{ $object->price }}">
            </div>

              <div class="form-group">
                <label>Quantity *</label>
                <input type="number" class="form-control" name="quantity" value="{{ $object->quantity }}" required>
            </div>
              
              <div class="form-group">
                <label>Details</label>
                <textarea type="text" class="form-control" id="summernote" name="details" placeholder="Message" rows="5">{{ $object->details }}</textarea>
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
                <input type="file" class="form-control" name="image" value="{{ $object->image }}">
                <br>
                @if($object->image)
                <img src="{{Storage::url($object->image)}}" width="100" alt="Image">
            @endif
               </div>
              
              <div class="form-group">
                <label>Tax</label>
                <input type="text" class="form-control" name="tax" value="{{ $object->tax }}">
            </div>
              
              <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" id="" name="slug" value="{{ $object->slug}}">
            </div>
              
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option selected="selected">{{ $object->status }}</option>
                    @if ($data->status == 'True')
                        <option>False</option>    
                    @else
                        <option>True</option>
                    @endif
                </select>
            </div>
              <br />
              <div class="form-group" style="text-align: center"><button type="submit" class="btn btn-danger">Update Product</button></div>
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