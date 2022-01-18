@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('title', $list->title." Product")


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
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>{{$list->title}} Product</h2>
        <h2>@yield('searchcumb')</h2>
        <ol>
          <li><a href="{{route('homepage')}}">Home</a></li>
          <li>Category Product</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
<main id="main">

     <!-- ======= About Section ======= -->
     <section id="about" class="about">
        <div class="container">
  
          <div class="row content">
            <div class="col-lg-5">
              <h2>Why is Reading Important?</h2>
              <h3>Challenge yourself by stepping out of your comfort zone, and you may even surprise yourself with a newfound passion. 
               You’ll be amazed to see the places reading can take you.
             </h3>
            </div>
            <div class="col-lg-7 pt-4 pt-lg-0">
              <p>
                The importance of reading is completely undeniable. 
                The next time someone asks you: “Why is reading important?” you will have an educated and thorough answer to respond with. 
                If you’re not the biggest fan of books, that’s ok! You’re not alone! But before you shut down books and reading all together, 
                take the time to learn more about the importance of reading and all the incredible benefits that come with it.
               </p>
               <ul>
                 <li><i class="ri-check-double-line"></i> Reading Can Give You a Greater Perspective</li>
                 <li><i class="ri-check-double-line"></i> Reading is a Great Conversation Starter</li>
                 <li><i class="ri-check-double-line"></i> Reading Helps Your Vocabulary</li>
               </ul>
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active" style="text align: center">All Products</li>
              </ul>
            </div>
          </div>
          
          <div class="row portfolio-container">
            @php
                $counter=1;
            @endphp 
            @foreach ($datalist as $rs)
                @if ($counter == 1)<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                      <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>{{$rs->title}}</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                          <a href="{{route('product_detail',['id'=>$rs->id])}}" class="" title="Add To Cart"><i class="bx bx-plus"></i></a>
                          <a href="{{route('product_detail',['id'=>$rs->id])}}" class="" title="Product Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                   @php
                    $counter++;    
                   @endphp            
            @elseif ($counter == 2)
                
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                    <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$rs->title}}</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                          <a href="{{route('product_detail',['id'=>$rs->id])}}" class="" title="Add To ShopCart"><i class="bx bx-plus"></i></a>
                          <a href="{{route('product_detail',['id'=>$rs->id])}}" class="" title="Product Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                @php
                    $counter++;    
                @endphp
            @elseif ($counter ==3)
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>{{$rs->title}}</h4>
                    <p>Card</p>
                    <div class="portfolio-links">
                      <a href="{{route('product_detail',['id'=>$rs->id])}}" class="" title="Add To ShopCart"><i class="bx bx-plus"></i></a>
                      <a href="{{route('product_detail',['id'=>$rs->id])}}" class="" title="Product Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>

                @php
                    $counter=1;    
                @endphp
            @endif

            @endforeach
        
  
          </div>
  
        </div>
      </section>
      <!-- End Portfolio Section -->
</main>
@endsection

