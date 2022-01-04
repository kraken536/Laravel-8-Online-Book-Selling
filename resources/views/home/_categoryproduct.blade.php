@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('title', $list->title." Category Product")

@section('contenu')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>{{$list->title}} Category Product</h2>
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
            <div class="col-lg-6">
              <h2>Eum ipsam laborum deleniti velitena</h2>
              <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
              </ul>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
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
                      {{-- {{ asset('assets') }}/home/assets/img/portfolio/portfolio-1.jpg --}}
                      <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>{{$rs->title}}</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                          <a href="{{ asset('assets') }}/home/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
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
                        {{-- {{ asset('assets') }}/home/assets/img/portfolio/portfolio-2.jpg --}}
                    <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$rs->title}}</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                        <a href="{{ asset('assets') }}/home/assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
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
                    {{-- {{ asset('assets') }}/home/assets/img/portfolio/portfolio-4.jpg --}}
                  <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>{{$rs->title}}</h4>
                    <p>Card</p>
                    <div class="portfolio-links">
                      <a href="{{ asset('assets') }}/home/assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
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

