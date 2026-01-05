<!-- ============== start footer section ========== -->
  <section class="footer position-relative pt-4 mt-4">
    <div class="container">
      <div class="row justify-content-center align-items-center g-4 py-5">
        <div class="col-lg-6 col-12">
          <div class="d-flex flex-column gap-8">
            <h3 class="heading-3">{{ $settings->store_name ?? 'Everything Store' }}</h3>
            <p class="body-1 col-lg-8 col-12">Dive into a world where fashion meets expression. Our online clothing
              emporium is a
              curated destination for style enthusiasts</p>
            <div class="d-flex gap-3">
              <i class="fa-brands fa-facebook icon-sm"></i>
              <i class="fa-brands fa-instagram icon-sm"></i>
              <i class="fa-brands fa-whatsapp icon-sm"></i>
              <i class="fa-brands fa-linkedin icon-sm"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="d-flex flex-column gap-8">
            <h3 class="heading-4">Menu</h3>
            <div class="d-flex flex-column gap-2">
              <a href="{{ route('home') }}">home</a>
              <a href="{{ route('about') }}">about us</a>
              <a href="{{ route('services') }}">services</a>
              <a href="{{ route('contact') }}">contact</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="d-flex flex-column gap-8">
            <h3 class="heading-4">social media</h3>
            <div class="d-flex flex-column gap-2">
              <a href="">whatsapp</a>
              <a href="">instagram</a>
              <a href="">facebook</a>
              <a href="">telegram</a>
            </div>
          </div>
        </div>
      </div>
      <hr class="p-0 m-0">
      <div class="d-flex justify-content-between align-items-center g-4 py-2 w-100">
        <p class="body-2">copyright © 2026 {{ $settings->store_name ?? 'Everything Store' }}</p>
        <p class="body-2"><a href="{{ route('terms') }}">Terms & Conditions</a> | <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
        </p>
      </div>
    </div>
  </section>
  <!-- ============== end footer section ========== -->