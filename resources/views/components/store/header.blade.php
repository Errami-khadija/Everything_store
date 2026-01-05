 <!-- start preLoader -->
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <!-- end preLoader -->

  <!-- start scroll to top button -->
  <div id="progress">
    <span id="progress-value"><i class="fa-solid fa-arrow-up"></i></span>
  </div>
  <!-- end scroll to top button -->


  <!-- ======= start Header ======= -->
  <header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a href="index.html">
          <h3 class="heading-2 primary-text">{{ $settings->store_name ?? 'Everything Store' }}</h3>
        </a>
        <!-- if you prefer to use an image as logo -->
        <!-- <a class="navbar-brand " href="#"><img src="images/logo/logo.png" class="logo" alt="LOGO"></a> -->
        <div class="d-flex gap-16">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
          </button>
          <button class="cart-mobile" id="cart-mobile">
            <i class="fa-solid fa-cart-shopping"></i>
          </button>
        </div>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav ms-auto" id="navbar">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('store') ? 'active' : '' }}" href="{{ route('store') }}">store</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                pages
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item py-2" href="{{ route('privacy-policy') }}">privacy policy</a></li>
                <li><a class="dropdown-item py-2" href="{{ route('terms') }}">terms of use</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">contact</a>
            </li>
          </ul>
          <div class="d-flex align-items-center justify-content-center  gap-2 ms-auto">
            <button class="cart position-relative" id="openCartBtn">
              <i class="fa-solid fa-cart-shopping"></i>
              <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                0</span>
            </button>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- ======= end Header ======= -->

  <!-- ============== start shopping cart and Checkout============== -->
  <section class="shopping-cart" id="cartPopup">
    <div class="d-flex flex-column gap-8 products-container">
      <div class="d-flex pt-4 px-3 justify-content-between align-items-center">
        <h4 class="heading-4">shopping cart</h4>
      </div>
      <hr class="m-0 mx-3 p-0 ">
      <div  class="d-flex flex-column  gap-16 padding-16">
        <div id="cartItems" class="d-flex flex-column align-items-center justify-content-center gap-8">
          <!-- Cart items will be dynamically added here -->

        @if(!session()->has('cart') || count(session('cart')) == 0)
           <p class="text-gray-600 text-center" id="emptyCartMsg">Your cart is empty.</p>
       @endif
     </div>
      <hr class="m-0 mx-3 p-0 ">

    
      <div class="d-flex  align-items-start  justify-content-between gap-16">
        <div class="d-flex flex-column padding-16">
          <h4 class="heading-4">Total Items</h4>
          <p class="body-2">Number of items in your cart</p>
        </div>
        <h5 id="totalItems" >0 </h5>
      </div>
      <div class="d-flex  align-items-start  justify-content-between gap-16">
        <div class="d-flex flex-column padding-16">
          <h4 class="heading-4">Total Price</h4>
          <p class="body-2">Delivery to all cities and payment upon receipt (Cash On Delivery)</p>
        </div>
        <h5 id="totalPrice" >$0.00</h5>
      </div>
      <button id="checkoutBtn" class="btn">checkout (COD)</button>
    </div>

</div>

   
  </section>

  
  <!-- Checkout Form Popup -->
<div id="checkoutPopup" class="checkout-popup">
  <div class="checkout-card">

    <h4 class="mb-3">Checkout (Cash on Delivery)</h4>

    <form id="checkoutForm">
      @csrf

      <div class="mb-3">
        <input
          type="text"
          id="customerName"
          name="name"
          class="form-control"
          placeholder="Full Name"
          required
        >
      </div>

      <div class="mb-3">
        <input
          type="text"
          id="customerPhone"
          name="phone"
          class="form-control"
          placeholder="Phone Number"
          required
        >
      </div>

      <div class="mb-3">
        <input
          type="text"
          id="customerCity"
          name="city"
          class="form-control"
          placeholder="City"
          required
        >
      </div>

      <div class="mb-3">
        <textarea
          id="customerAddress"
          name="address"
          class="form-control"
          rows="3"
          placeholder="Address"
          required
        ></textarea>
      </div>

      <button type="submit" class="btn w-100 mb-2">
        Place Order
      </button>

      <button
        type="button"
        onclick="closeCheckout()"
        class="btn-outline w-100 "
      >
        Cancel
      </button>
    </form>

  </div>
</div>

  <!-- ============== end shopping cart and Checkout ============== -->