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

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 


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
                        <div class="card-body">
                          <h5>Title:</h5>
                          <h1 class="h2"> {{$data_product->title}}</h1>
                          <h1 class="h2"></h1>
                          <h1 class="h2"></h1>
                          <h5>Price:</h5>
                            <p class="h3 py-2">{{$data_product->price}} ₺</p>

                            <form action="" method="POST">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
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
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Reviews (0)</a>
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
                      <h3>Architecto ut aperiam autem id</h3>
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
                    <div class="col-lg-10 details order-2 order-lg-1">
                      <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-8">
            <div>
              <h2>1 Eum ipsam laborum deleniti velitena</h2>
              <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3>
            </div>
            <div>
              <h2>2 Eum ipsam laborum deleniti velitena</h2>
              <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3>
            </div>
            <div>
              <h2>3 Eum ipsam laborum deleniti velitena</h2>
              <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3>
            </div>
          </div>
          <div class="col-lg-4 pt-4 pt-lg-0">
            
            <form method="post" action="#" enctype="multipart/form-data">
              {{-- @livewire('home.flash-message') --}}
              <h5>Write Your Review:</h5>
              @csrf
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
              </div>
              <br />
              <div class="form-group">
                {{-- <label for="formGroupExampleInput2">Another label</label> --}}
                <textarea type="text" class="form-control" id="review" name="review" placeholder="Your Review..." rows="5"></textarea>
              </div>
              <br />
              <div class="form-group">
                <h6>Your Rating:</h6>
                  <fieldset class="rating">
                      <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                      <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                      <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                      <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                      <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                      <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                      <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                      <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                      <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                      <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                  </fieldset>
              </div>
              <br />
            @if (Auth::check())
              <div class="form-group" style="text-align: center"><button type="submit" class="btn btn-danger" >Post Review</button></div>
            @endif
              
            </form>

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