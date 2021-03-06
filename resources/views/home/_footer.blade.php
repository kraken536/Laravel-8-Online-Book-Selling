
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Bookstore</h3>
              <p>
                {{ $data->address }}<br><br>
                <strong>Phone:</strong> {{$data->phone}}<br>
                <strong>Email:</strong> {{$data->email}}<br>
              </p>
              <div class="social-links mt-3">
                @if($data->twitter != null) <a href="{{$data->twitter}}" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>@endif
                @if($data->facebook != null)<a href="{{$data->facebook}}" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>@endif
                @if($data->instagram != null)<a href="{{$data->instagram}}" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>@endif
                @if($data->youtube != null)<a href="{{$data->youtube}}" class="youtube" target="_blank"><i class="bx bxl-youtube"></i></a>@endif
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('homepage')}}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{Route('aboutus')}}">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe to our newsletter with your email address.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{$data->company}}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets') }}/home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets') }}/home/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('assets') }}/home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('assets') }}/home/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('assets') }}/home/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ asset('assets') }}/home/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets') }}/home/assets/js/main.js"></script>


{{-- extra --}}



</body>

</html>