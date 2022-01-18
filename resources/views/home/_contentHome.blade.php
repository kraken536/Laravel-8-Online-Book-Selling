<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
          @php
            $counter = 1;
          @endphp
        @foreach ($slider as $rs)
        <!-- Slide 1 -->
          @if($rs->image)
          <div class="carousel-item @if ($counter == 1) active @endif" style="background-image: url('{{ Storage::url($rs->image) }}')">
            @php
              $counter=2;
            @endphp
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">{{$rs->title}}</h2>
                <p class="animate__animated animate__fadeInUp">{{$rs->title}}</p>
                <a href="{{route('product_detail',['id'=>$rs->id])}}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>
         @endif
        @endforeach
    
       </div>
 
       <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
         <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
       </a>
 
       <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
         <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
       </a>
 
     </div>
   </section><!-- End Hero -->
 
   <main id="main">
 
     <!-- ======= About Section ======= -->
     <section id="about" class="about">
       <div class="container">
 
         <div class="row content">
           <div class="col-lg-4">
             <h2>Why is Reading Important?</h2>
             <h3>Challenge yourself by stepping out of your comfort zone, and you may even surprise yourself with a newfound passion. 
              You’ll be amazed to see the places reading can take you.
            </h3>
           </div>
           <div class="col-lg-8 pt-4 pt-lg-0">
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
             <p class="fst-italic">
              <strong>Overall:</strong>
              It’s safe to say that reading can change your life for the better, and the importance of reading is undeniable. 
              If you think that you hate reading books, then perhaps you just have yet to find the genre for your own personal style — but keep trying, and keep searching for what’s right for you.
              A book is one of the most powerful things in the world, offering you new opportunities to learn, grow and be inspired!
            </p>
           </div>
         </div>
 
       </div>
     </section><!-- End About Section -->

     <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active" style="text align: center">Daily Products</li>
            </ul>
          </div>
        </div>
        
        <div class="row portfolio-container">
          @php
              $counter=1;
          @endphp 
          @foreach ($daily as $rs)
              @if ($counter == 1)<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                    <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4>{{$rs->title}}</h4>
                      <p>App</p>
                      <div class="portfolio-links">
                        <a href="{{route('product_detail',['id'=>$rs->id])}}" title="Add To Cart"><i class="bx bx-plus"></i></a>
                        <a href="{{route('product_detail',['id'=>$rs->id])}}"class="" title="Product Details"><i class="bx bx-link"></i></a>
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
                      <a href="{{route('product_detail',['id'=>$rs->id])}}" class="" title="Add To Cart"><i class="bx bx-plus"></i></a>
                      <a href="{{route('product_detail',['id'=>$rs->id])}}" class="" title="Product Details"><i class="bx bx-link"></i></a>
                      </div>
                  </div>
                  </div>
              </div>

              @php
                  $counter++;    
              @endphp
          @elseif ($counter == 3)
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{$rs->title}}</h4>
                  <p>Card</p>
                  <div class="portfolio-links">
                    <a href="{{route('product_detail',['id'=>$rs->id])}}" class="" title="Add To Cart"><i class="bx bx-plus"></i></a>
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

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active" style="text align: center">Last Products</li>
            </ul>
          </div>
        </div>
        
        <div class="row portfolio-container">
          @php
              $counter=1;
          @endphp 
          @foreach ($last as $rs)
              @if ($counter == 1)<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                    <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4>{{$rs->title}}</h4>
                      <p>App</p>
                      <div class="portfolio-links">
                        <a href="{{ asset('assets') }}/home/assets/img/portfolio/portfolio-4.jpg" class="" title="Add To ShopCart"><i class="bx bx-plus"></i></a>
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
                        <a href="{{ asset('assets') }}/home/assets/img/portfolio/portfolio-4.jpg" class="" title="Add To ShopCart"><i class="bx bx-plus"></i></a>
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
                    <a href="{{ asset('assets') }}/home/assets/img/portfolio/portfolio-4.jpg" class="" title="Add To ShopCart"><i class="bx bx-plus"></i></a>
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

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active" style="text align: center">Picked For You Products</li>
            </ul>
          </div>
        </div>
        
        <div class="row portfolio-container">
          @php
              $counter=1;
          @endphp 
          @foreach ($picked as $rs)
              @if ($counter == 1)<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                    <img src="{{ Storage::url($rs->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4>{{$rs->title}}</h4>
                      <p>App</p>
                      <div class="portfolio-links">
                        <a href="{{ asset('assets') }}/home/assets/img/portfolio/portfolio-4.jpg" class="" title="Add To ShopCart"><i class="bx bx-plus"></i></a>
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
                        <a href="{{ asset('assets') }}/home/assets/img/portfolio/portfolio-4.jpg" class="" title="Add To ShopCart"><i class="bx bx-plus"></i></a>
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
                    <a href="{{ asset('assets') }}/home/assets/img/portfolio/portfolio-4.jpg" class="" title="Add To ShopCart"><i class="bx bx-plus"></i></a>
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
 
     <!-- ======= Clients Section ======= -->
     <section id="clients" class="clients section-bg">
       <div class="container">
 
         <div class="row">
 
           <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
             <img src="{{ asset('assets') }}/home/assets/img/clients/client-1.png" class="img-fluid" alt="">
           </div>
 
           <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
             <img src="{{ asset('assets') }}/home/assets/img/clients/client-2.png" class="img-fluid" alt="">
           </div>
 
           <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
             <img src="{{ asset('assets') }}/home/assets/img/clients/client-3.png" class="img-fluid" alt="">
           </div>
 
           <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
             <img src="{{ asset('assets') }}/home/assets/img/clients/client-4.png" class="img-fluid" alt="">
           </div>
 
           <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
             <img src="{{ asset('assets') }}/home/assets/img/clients/client-5.png" class="img-fluid" alt="">
           </div>
 
           <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
             <img src="{{ asset('assets') }}/home/assets/img/clients/client-6.png" class="img-fluid" alt="">
           </div>
 
         </div>
 
       </div>
     </section><!-- End Clients Section -->
 
     <!-- ======= Services Section ======= -->
     <section id="services" class="services">
       <div class="container">
 
         <div class="row">
           <div class="col-md-6">
             <div class="icon-box">
               <i class="bi bi-briefcase"></i>
               <h4><a href="#">Objectivity</a></h4>
               <p>The quality of being able to make a decision or judgment in a fair way that is not influenced by personal feelings or beliefs</p>
             </div>
           </div>
           <div class="col-md-6 mt-4 mt-md-0">
             <div class="icon-box">
               <i class="bi bi-card-checklist"></i>
               <h4><a href="#"></a>Productivity</a></h4>
               <p>Productivity is commonly defined as a ratio between the output volume and the volume of inputs. In other words, it measures how efficiently production inputs, such as labour and capital, are being used in an economy to produce a given level of output.</p>
             </div>
           </div>
           <div class="col-md-6 mt-4 mt-md-0">
             <div class="icon-box">
               <i class="bi bi-bar-chart"></i>
               <h4><a href="#">Audacity</a></h4>
               <p>Boldness or daring, especially with confident or arrogant disregard for personal safety, conventional thought, or other restrictions.
              </p>
             </div>
           </div>
           <div class="col-md-6 mt-4 mt-md-0">
             <div class="icon-box">
               <i class="bi bi-brightness-high"></i>
               <h4><a href="#">Vision</a></h4>
               <p>Perception of the outside world through sight; physiological mechanism by which light radiation gives rise to visual sensations.
                Clear, indistinct vision.</p>
             </div>
           </div>
         </div>
 
       </div>
     </section><!-- End Services Section -->
 
   </main>
   <!-- End #main -->