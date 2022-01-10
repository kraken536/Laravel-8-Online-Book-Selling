@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('css_review')
<style>

@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
/* body{ margin: 20px; } */
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rate { 
  border: none;
  float: left;
}

.rate > input { display: none; } 
.rate > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rate > .half:before { 
  content: "\f089";
  position: absolute;
}

.rate > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rate > input:checked ~ label, /* show gold star when clicked */
.rate:not(:checked) > label:hover, /* hover current star */
.rate:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rate > input:checked + label:hover, /* hover current star when changing rating */
.rate > input:checked ~ label:hover,
.rate > label:hover ~ input:checked ~ label, /* lighten current selection */
.rate > input:checked ~ label:hover ~ label { color: #FFED85;  } 






</style>

@endsection

@section('title', 'Product Details')
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
          <h2>Product Details</h2>
          <h2>@yield('searchcumb')</h2>
          <ol>
            <li><a href="{{route('homepage')}}">Home</a></li>
            <li>Product Details</li>
          </ol>
        </div>

      </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
  
          <div class="row content">
            <div class="col-lg-12 pt-4 pt-lg-2" style="text-align: center">
              <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets') }}/extra/assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('assets') }}/extra/assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/extra/assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/extra/assets/css/slick-theme.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        {{-- {{ asset('assets') }}/extra/assets/img/product_single_10.jpg --}}
                        <img class="card-img img-fluid" src="{{ Storage::url($data_product->image) }}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">
                              @php
                                $counter = 1;
                                $img=1;
                              @endphp
                                    
                                    
                                <!--First slide-->
                                <div class="carousel-item @if($counter==1) active @endif">
                                  
                                  @if($img <= 3)
                                      <div class="row">
                                        <div class="col-4">
                                          <a href="#">
                                            {{-- {{ asset('assets') }}/extra/assets/img/product_single_01.jpg --}}
                                              <img class="card-img img-fluid" src="{{Storage::url($data_product->image)}}" alt="Product Image".$img>
                                          </a>
                                      </div>
                                        @foreach ($datalist as $rs)
                                        <div class="col-4">
                                            <a href="#">
                                              {{-- {{ asset('assets') }}/extra/assets/img/product_single_01.jpg --}}
                                                <img class="card-img img-fluid" src="{{Storage::url($rs->image)}}" alt="Product Image".$img>
                                            </a>
                                        </div>
                                        @php
                                        $img+=1;
                                        @endphp
                                        @endforeach
                                      </div>
                                      
                                  @endif
                                  
                                </div>
                                      @php    
                                        $counter=2;
                                      @endphp
                              </div>     
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->

                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                      @include('home.flash-message')
                        <div class="card-body">
                          <ul class="list-inline pb-3">
                            <li class="list-inline-item text-right">
                              <h5><strong>Title:</strong> &nbsp;&nbsp;{{$data_product->title}}</h5>
                            </li>
                            <br />
                            <li class="list-inline-item text-right">
                              <h5><strong>Price:</strong>&nbsp;&nbsp;{{$data_product->price}} ₺</h5>
                            </li>
                            <br />
                            <li class="list-inline-item text-right">
                             
                                
                                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                  <span class="float-right"><i class="text-warning fa fa-star"></i></span> 
                                
                                  <h5><strong>Review:</strong>&nbsp;</h5>
                            </li>
                            <br>
                            <li class="list-inline-item text-right">
                              <h5><strong>Availability:</strong>&nbsp;&nbsp;In stock</h5>
                            </li>
                          </ul>
                            <form action="{{route('user_shopcart_add',['id'=>$data_product->id])}}" method="POST">
                              @csrf
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                              <h5>Quantity:
                                                <input type="number" name="quantity" id="product-quanity" value="1" min="1" max="{{$data_product->quantity}}">
                                              </h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                    </div>
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->



  
    <!-- End Article -->

    <!-- Start Script -->
    <script src="{{ asset('assets') }}/extra/assets/js/jquery-1.11.0.min.js"></script>
    <script src="{{ asset('assets') }}/extra/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('assets') }}/extra/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/extra/assets/js/templatemo.js"></script>
    <script src="{{ asset('assets') }}/extra/assets/js/custom.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="{{ asset('assets') }}/extra/assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>
                {{-- @include('home.extra_details') --}}
              {{-- <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p> --}}
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
          <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">
  
          <div class="section-title">
            <h2>Details</h2>
            <p>Product Details</p>
          </div>
  
          <div class="row">
            <div class="col-lg-2">
              <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                  <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Description</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Details</a>
                </li>
                <li class="nav-item">
                  @php
                    $count = App\Http\Controllers\HomeController::count_review($data_product->id)
                  @endphp
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Reviews ({{$count}})</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-10 mt-4 mt-lg-0">
              <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      {!! $data_product->description !!}
                      <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                      <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="assets/img/features-1.png" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-2">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      {!! $data_product->details !!}
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
                    <div class="col-lg-10 details order-2 order-lg-1">
                      <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-8">

            @foreach ($rev as $txt)
            <div class="card">
            <div class="card-body">
              
              <div class="row">
                  <div class="col-md-2">
                      <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" width="65"/>
                      <p class="text-secondary text-center" style="font-size: 12px">{{$txt->created_at}}</p>
                  </div>
                  <div class="col-md-10">
                      <p>
                        <a class="float-left" href="#"><strong>{{$txt->user->name}}</strong></a>
                     </p>
                     
                    <div class="clearfix"></div>
                     <p>
                      <a class="float-left" href="#" style="color: grey; text-align: justify;font-style: italic;"><strong>{{$txt->subject}}:</strong></a>
                    </p>
                    <div class="clearfix"></div>
                      <p>{{$txt->review}}</p>

                      <p>
                        <span class="float-right"><i class="@if($txt->rate>=5) text-warning  @endif fa fa-star"></i></span>
                        <span class="float-right"><i class="@if($txt->rate>=4) text-warning  @endif fa fa-star"></i></span>
                        <span class="float-right"><i class="@if($txt->rate>=3) text-warning  @endif fa fa-star"></i></span>
                        <span class="float-right"><i class="@if($txt->rate>=2) text-warning  @endif fa fa-star"></i></span>
                        <span class="float-right"><i class="@if($txt->rate>=1) text-warning  @endif fa fa-star"></i></span>
                        
                     </p>
                  </div>
              </div>
              
          </div>
        </div>
        @endforeach
          </div>

          <div class="col-lg-4 pt-4 pt-lg-0">             
              @livewire('review',['id' => $data_product->id])
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      {{-- <img src="{{asset('ssets')}}/home/assets/img/features-3.png" alt="" class="img-fluid"> --}}
                      
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
                <div class="tab-pane" id="tab-5">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                      <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                      <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="assets/img/features-5.png" alt="" class="img-fluid">
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