@extends('layouts.store')

@section('content') 

  <!-- ============== Start Hero section ========== -->
  <section class="hero d-flex flex-column gap-64 position-relative section mt-4" id="hero">
    <div class="container d-flex justify-content-center align-items-center">
      <div class="d-flex flex-column justify-content-center align-items-center col-lg-8 col-12 text-center  gap-8">
        <h1 class="heading-1">Explore Our Latest Watch and Gadget Collection!</h1>
        <p class="body-1">
          Welcome to our digital emporium, where style meets innovation in the realm of watches,
          gadgets, and cutting-edge technology. Discover a curated collection that transcends time, blending timeless
          elegance with the latest advancements.
        </p>
        <div class="d-flex gap-8">
          <a href="{{ route('store') }}" class="btn">explore products</a>
          <a href="{{ route('about') }}" class="btn-outline">about us</a>
        </div>
      </div>
    </div>
    <div class="scroller" data-speed="fast">
      <div class="scroller__inner ">
          @foreach($categories as $category)
          <div class="d-flex flex-column justify-content-center align-items-center gap-8">
           {{-- Category Image --}}
                    @if($category->image)
        <img src="{{ asset('storage/' . $category->image) }}"
                             alt="{{ $category->name }}">
       @endif
       {{-- Category Name --}}
          <h3 class="font-semibold mb-1">{{ $category->name }}</h3>
        </div>
          @endforeach
      </div>
    </div>
  </section>
  <!-- ============== End Hero section ========== -->

  <!-- ============== Start bestsellers section ========== -->
  <section class="bestsellers section position-relative pt-4 mt-4" id="bestsellers">
    <div class="container d-flex flex-column gap-64">
      <div class="heading row justify-content-between align-items-start g-4">
        <div class="d-flex flex-column align-items-start justify-content-start gap-8 col-lg-6 col-12">
          <h1 class="heading-1">Bestsellers</h1>
          <p class="body-1">browse favorite sale styles and brands</p>
        </div>
        <div class="col-lg-6 col-12 d-flex justify-content-lg-end justify-content-start">
          <a href="{{ route('store') }}" class="learn-more">Browse All Products <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="row g-4">
          @foreach($featuredProducts as $product)
        <div class="col-lg-3 col-md-6 col-12">
          <div class="bg-box d-flex flex-column gap-16 position-relative b-radius">
            <h4 class="category">{{ $product->category->name ?? 'No Category' }}</h4>
            <img class="product-img" src="{{ asset('uploads/products/' . $product->images[0]) }}" alt="product">
            <div class="d-flex flex-row justify-content-between padding-16">
              <a href="{{ route('product.show', $product->id) }}">
                <h3 class="heading-4">{{ $product->name }}</h3>
              </a>
              <h3 class="heading-3 ">${{ number_format($product->price, 2) }}</h3>
            </div>
          <button class="btn add-to-cart-btn px-4 py-2 rounded-lg font-medium transition-colors"
                             data-id="{{ $product->id }}">
                                Add to Cart
                            </button>
            
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- ============== End bestsellers section ========== -->

  

  <!-- ============== Start New product section ========== -->
  <section class="bestsellers section position-relative pt-4 mt-4" id="about">
    <div class="container d-flex flex-column ">
      <div class="heading row justify-content-between align-items-start g-4">
        <div class="d-flex flex-column align-items-start justify-content-start gap-8 col-lg-6 col-12">
          <h1 class="heading-1">New Products</h1>
          <p class="body-1">browse favorite sale styles and brands</p>
        </div>
        <div class="col-lg-6 col-12 d-flex justify-content-lg-end justify-content-start">
          <a href="{{ route('store') }}" class="learn-more">Browse All Products <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="row g-4 product-container">
        
          <div class="row g-4">
             @foreach($newProducts as $product)
            <div class="col-lg-3 col-md-6 col-12">
              
              <div class="bg-box d-flex flex-column gap-16 position-relative b-radius">
                <h4 class="category">New</h4>
                 
                <img class="product-img" src="{{ asset('uploads/products/' . $product->images[0]) }}" alt="product">
                 
                <div class="d-flex flex-row justify-content-between padding-16">
                  <a href="{{ route('product.show', $product->id) }}">
                    <h3 class="heading-4">{{ $product->name }}</h3>
                  </a>
                  <h3 class="heading-3 grey-text">${{ number_format($product->price, 2) }}</h3>
                </div>
                 <button class="btn add-to-cart-btn px-4 py-2 rounded-lg font-medium transition-colors"
                             data-id="{{ $product->id }}">
                                Add to Cart
                   </button>
              </div>
                
            </div>
            @endforeach
        
  
      
    </div>
  </section>
  <!-- ============== end New products section ========== -->

  <!-- ============== Start ALl product section ========== -->
  <section class="bestsellers section position-relative pt-4 mt-4" id="about">
    <div class="container d-flex flex-column ">
      <div class="heading row justify-content-between align-items-start g-4">
        <div class="d-flex flex-column align-items-start justify-content-start gap-8 col-lg-6 col-12">
          <h1 class="heading-1">All Products</h1>
          <p class="body-1">browse favorite sale styles and brands</p>
        </div>
        <div class="col-lg-6 col-12 d-flex justify-content-lg-end justify-content-start">
          <a href="{{ route('store') }}" class="learn-more">Browse All Products <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="row g-4 product-container">
        
          <div class="row g-4">
              @foreach($products as $product)
            <div class="col-lg-3 col-md-6 col-12">
              
              <div class="bg-box d-flex flex-column gap-16 position-relative b-radius">
             @if(in_array('new', $product->flags))
               <h4 class="category">New</h4>
             @endif
                 
                <img class="product-img" src="{{ asset('uploads/products/' . $product->images[0]) }}" alt="product">
                 
                <div class="d-flex flex-row justify-content-between padding-16">
                  <a href="{{ route('product.show', $product->id) }}">
                    <h3 class="heading-4">{{ $product->name }}</h3>
                  </a>
                  <h3 class="heading-3 grey-text">${{ number_format($product->price, 2) }}</h3>
                </div>
                 <button class="btn add-to-cart-btn px-4 py-2 rounded-lg font-medium transition-colors"
                             data-id="{{ $product->id }}">
                                Add to Cart
                   </button>
              </div>
                
            </div>
            @endforeach
        
  
      
    </div>
  </section>
  <!-- ============== end ALL products section ========== -->


  <!-- ============== start about section ============== -->
  <section class="about section" id="services">
    <div class="container d-flex flex-column text-center justify-content-between align-items-center gap-32 ">
      <div class="heading d-flex flex-column justify-content-between align-items-center">
        <h2 class="heading-1 col-lg-6 col-12">about us</h2>
        <p class="body-1 col-lg-8">Welcome to our digital emporium, where style meets innovation in the realm of
          watches, gadgets, and cutting-edge technology. Discover a curated collection that transcends time.
        </p>
      </div>
      <div class="d-flex flex-column gap-16  justify-content-center align-items-center">
        <div class="row justify-content-center align-items-center g-4 h-100 ">
          <div class="col-lg-7 col-12 h-100 img">
            <img class="w-100 h-100" src="images/about/about-1.png" alt="about">
          </div>
          <div class="col-lg-5 col-12 h-100 ">
            <div class="d-flex flex-column justify-content-center  text-start gap-8 bg-box padding-16 b-radius h-100">
              <h2 class="heading-2">Explore Tomorrow's Watches Today!</h2>
              <p class="body-2">Welcome to our digital emporium, where style meets innovation in the realm of watches,
                gadgets, and cutting-edge technology. Discover a curated collection that transcends time.</p>
              <a href="{{ route('store') }}" class="btn w-fit">shop now</a>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-lg-2 align-items-center g-4 h-100 ">
          <div class="col-lg-7 col-12 h-100 ">
            <div class="d-flex flex-column justify-content-center  text-start gap-8 bg-box padding-16 b-radius h-100">
              <h2 class="heading-2">Elevate Your Lifestyle with Our Range of High-Tech Watches and Gadgets.</h2>
              <p class="body-2">Welcome to our digital emporium, where style meets innovation in the realm of watches,
                gadgets, and cutting-edge technology. Discover a curated collection that transcends time.</p>
              <a href="{{ route('store') }}" class="btn w-fit">shop now</a>
            </div>
          </div>
          <div class="col-lg-5 col-12 h-100 img">
            <img class="w-100 h-100" src="images/about/about-2.png" alt="about">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ============== End about section ========== -->

  <!-- ============== Start Features section ========== -->
  <section class="features section position-relative pt-4 mt-4" id="features">
    <div class="container d-flex flex-column gap-64">
      <div class="heading d-flex flex-column gap-8 justify-content-center align-items-center text-center">
        <h1 class="heading-1">Our Features</h1>
        <p class="body-1 col-lg-8">Welcome to our digital emporium, where style meets innovation in the realm of
          watches,
          gadgets, and cutting-edge technology. Discover a curated collection that transcends time.</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6 col-12">
          <div class="d-flex flex-column gap-16">
            <div class="d-flex justify-content-center align-items-center b-radius icon-box bg-box">
              <i class="fa-solid fa-truck-fast icon-sm"></i>
            </div>
            <div class="d-flex flex-column mt-2">
              <h3 class="heading-3">Free shipping</h3>
              <p class="body-2">Elevate your casual style with our Men's Hoodie</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="d-flex flex-column gap-16">
            <div class="d-flex justify-content-center align-items-center b-radius icon-box bg-box">
              <i class="fa-solid fa-credit-card icon-sm"></i>
            </div>
            <div class="d-flex flex-column mt-2">
              <h3 class="heading-3">secure payments</h3>
              <p class="body-2">Elevate your casual style with our Men's Hoodie</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="d-flex flex-column gap-16">
            <div class="d-flex justify-content-center align-items-center b-radius icon-box bg-box">
              <i class="fa-solid fa-box-open icon-sm"></i>
            </div>
            <div class="d-flex flex-column mt-2">
              <h3 class="heading-3">30 days free return</h3>
              <p class="body-2">Elevate your casual style with our Men's Hoodie</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="d-flex flex-column gap-16">
            <div class="d-flex justify-content-center align-items-center b-radius icon-box bg-box">
              <i class="fa-regular fa-gem icon-sm"></i>
            </div>
            <div class="d-flex flex-column mt-2">
              <h3 class="heading-3">curated collections</h3>
              <p class="body-2">Elevate your casual style with our Men's Hoodie</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ============== End Features section ========== -->

  
 @include('components.store.testimonials')

 @include('components.store.cta')

 @include('components.store.faq')



@endsection