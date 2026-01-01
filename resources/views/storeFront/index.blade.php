<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="TickHub - Electronics Store Ecommerce Website Template">


  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{ asset('css/storeFront css/bootstrap.min.css') }}">

  <!-- owl carousel -->
  <link rel="stylesheet" href="{{ asset('css/storeFront css/owl.carousel.min.css') }}">

  <!-- toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <!-- fontawesome -->
  <link rel="stylesheet" href="{{ asset('css/storeFront css/all.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- main css -->
  <link rel="stylesheet" href="{{ asset('css/storeFront css/styles.css') }}">

  <title>TickHub - Electronics Store Ecommerce Website Template</title>
</head>


<body class="body position-relative">

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
          <h3 class="heading-2 primary-text">TickHub</h3>
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
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="store.html">store</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                pages
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item py-2" href="product.html">product page</a></li>
                <li><a class="dropdown-item py-2" href="privacy-policy.html">privacy policy</a></li>
                <li><a class="dropdown-item py-2" href="terms.html">terms of use</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">contact</a>
            </li>
          </ul>
          <div class="d-flex align-items-center justify-content-center  gap-2 ms-auto">
            <button class="cart">
              <i class="fa-solid fa-cart-shopping"></i>
            </button>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- ======= end Header ======= -->

  <!-- ============== start shopping cart ============== -->
  <section class="shopping-cart">
    <div class="d-flex flex-column gap-8 products-container">
      <div class="d-flex pt-4 px-3 justify-content-between align-items-center">
        <h4 class="heading-4">shopping cart</h4>
      </div>
      <hr class="m-0 mx-3 p-0 ">
      <div class="d-flex justify-content-between align-items-center gap-16 padding-16">
        <div class="d-flex align-items-center justify-content-center gap-8">
          <div class="img">
            <img src="images/products/2.png" alt="product">
          </div>
          <div class="d-flex flex-column">
            <h5>IWatch SE 3</h5>
            <h5>QTY: <span class="grey-text">3</span></h5>
          </div>
        </div>
        <div class="d-flex flex-column align-items-start">
          <div class="heading-4 grey-text">US$39.99</div>
          <button class="remove">remove</button>
        </div>
      </div>
      <hr class="m-0 mx-3 p-0 ">
      <div class="d-flex justify-content-between align-items-center gap-16 padding-16">
        <div class="d-flex align-items-center justify-content-center gap-2">
          <div class="img">
            <img src="images/products/3.png" alt="product">
          </div>
          <div class="d-flex flex-column">
            <h5>IWatch SE 3</h5>
            <h5>QTY: <span class="grey-text">3</span></h5>
          </div>
        </div>
        <div class="d-flex flex-column align-items-start">
          <div class="heading-4 grey-text">US$39.99</div>
          <button class="remove">remove</button>
        </div>
      </div>
      <hr class="m-0 mx-3  p-0 ">
      <div class="d-flex justify-content-between align-items-center gap-16 padding-16">
        <div class="d-flex align-items-center justify-content-center gap-8">
          <div class="img">
            <img src="images/products/4.png" alt="product">
          </div>
          <div class="d-flex flex-column">
            <h5>IWatch SE 3</h5>
            <h5>QTY: <span class="grey-text">3</span></h5>
          </div>
        </div>
        <div class="d-flex flex-column align-items-start">
          <div class="heading-4 grey-text">US$39.99</div>
          <button class="remove">remove</button>
        </div>
      </div>
      <hr class="m-0 mx-3  p-0 ">
      <div class="d-flex justify-content-between align-items-center gap-16 padding-16">
        <div class="d-flex align-items-center justify-content-center gap-8">
          <div class="img">
            <img src="images/products/5.png" alt="product">
          </div>
          <div class="d-flex flex-column">
            <h5>IWatch SE 3</h5>
            <h5>QTY: <span class="grey-text">3</span></h5>
          </div>
        </div>
        <div class="d-flex flex-column align-items-start">
          <div class="heading-4 grey-text">US$39.99</div>
          <button class="remove">remove</button>
        </div>
      </div>
    </div>
    <div class="d-flex flex-column gap-16 padding-16">
      <hr>
      <div class="d-flex align-items-start justify-content-between gap-16">
        <div class="d-flex flex-column">
          <h4 class="heading-4">Total</h4>
          <p class="body-2">Shipping and taxes are calculated at checkout</p>
        </div>
        <h5>$102.9</h5>
      </div>
      <button class="btn">checkout now</button>
    </div>
  </section>
  <!-- ============== end shopping cart ============== -->

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
          <a href="store.html" class="btn">explore products</a>
          <a href="about.html" class="btn-outline">about us</a>
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
          <a href="store.html" class="learn-more">Browse All Products <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="row g-4">
          @foreach($featuredProducts as $product)
        <div class="col-lg-3 col-md-6 col-12">
          <div class="bg-box d-flex flex-column gap-16 position-relative b-radius">
            <h4 class="category">{{ $product->category->name ?? 'No Category' }}</h4>
            <img class="product-img" src="{{ asset('uploads/products/' . $product->images[0]) }}" alt="product">
            <div class="d-flex flex-row justify-content-between padding-16">
              <a href="product.html">
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
          <a href="store.html" class="learn-more">Browse All Products <i class="fa-solid fa-arrow-right"></i></a>
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
                  <a href="product.html">
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
          <a href="store.html" class="learn-more">Browse All Products <i class="fa-solid fa-arrow-right"></i></a>
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
                  <a href="product.html">
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
              <a href="store.html" class="btn w-fit">shop now</a>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-lg-2 align-items-center g-4 h-100 ">
          <div class="col-lg-7 col-12 h-100 ">
            <div class="d-flex flex-column justify-content-center  text-start gap-8 bg-box padding-16 b-radius h-100">
              <h2 class="heading-2">Elevate Your Lifestyle with Our Range of High-Tech Watches and Gadgets.</h2>
              <p class="body-2">Welcome to our digital emporium, where style meets innovation in the realm of watches,
                gadgets, and cutting-edge technology. Discover a curated collection that transcends time.</p>
              <a href="store.html" class="btn w-fit">shop now</a>
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

  


  <!-- ============== start testimonials section ========== -->
  <section class="testimonials position-relative pt-4 mt-4 section" id="testimonials">
    <div class="container">
      <div class="heading d-flex flex-column justify-content-between align-items-center">
        <h2 class="heading-1">what our clients says</h2>
      </div>

      <div class="row mt-4 pt-2">
        <div class="owl-carousel testimonial owl-theme">
          <div class="item">
            <div class="bg-box padding-16">
              <div class="d-flex flex-column gap-16 h-100">
                <div class="d-flex align-items-center justify-content-between gap-8 text">
                  <div class="d-flex justify-content-center align-items-center gap-8">
                    <div class="img">
                      <img src="images/testimonials/testimonials-1.jpg" alt="testimonial" class="b-radius">
                    </div>
                    <h3 class="heading-3 m-0 p-0">John Doe</h3>
                  </div>
                  <div class="d-flex gap-2">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <p class="body-1">As a tech aficionado, I'm always on the lookout for the latest and greatest. This
                  website exceeded my expectations! The variety of gadgets is mind-blowing, and the expert reviews
                  helped me make informed choices. I've found my go-to destination for staying ahead in the world of
                  tech.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="bg-box padding-16">
              <div class="d-flex flex-column gap-16 h-100">
                <div class="d-flex align-items-center justify-content-between gap-8 text">
                  <div class="d-flex justify-content-center align-items-center gap-8">
                    <div class="img">
                      <img src="images/testimonials/testimonials-2.jpg" alt="testimonial" class="b-radius">
                    </div>
                    <h3 class="heading-3 m-0 p-0">robert alderson</h3>
                  </div>
                  <div class="d-flex gap-2">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <p class="body-1">I've been collecting watches for years, and this website caters to my passion
                  impeccably. The range of timepieces, from classic to modern, is impressive. The detailed product
                  descriptions and high-quality images ensure I know exactly what I'm getting. This is now my go-to
                  destination for expanding my watch collection.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="bg-box padding-16">
              <div class="d-flex flex-column gap-16 h-100">
                <div class="d-flex align-items-center justify-content-between gap-8 text">
                  <div class="d-flex justify-content-center align-items-center gap-8">
                    <div class="img">
                      <img src="images/testimonials/testimonials-3.jpg" alt="testimonial" class="b-radius">
                    </div>
                    <h3 class="heading-3 m-0 p-0">sarah lee</h3>
                  </div>
                  <div class="d-flex gap-2">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <p class="body-1">I've been shopping for watches online for years, and this website stands out for its
                  exceptional service and selection. The curated collection features both classic and contemporary
                  timepieces, catering to every style and budget. The easy navigation and secure checkout process make
                  shopping a breeze. I've never been disappointed with my purchases and will continue to be a loyal
                  customer.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="bg-box padding-16">
              <div class="d-flex flex-column gap-16 h-100">
                <div class="d-flex align-items-center justify-content-between gap-8 text">
                  <div class="d-flex justify-content-center align-items-center gap-8">
                    <div class="img">
                      <img src="images/testimonials/testimonials-4.jpg" alt="testimonial" class="b-radius">
                    </div>
                    <h3 class="heading-3 m-0 p-0">james white</h3>
                  </div>
                  <div class="d-flex gap-2">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <p class="body-1">
                  Being a photography enthusiast, finding high-quality camera gear is essential, and this website never
                  disappoints. The range of cameras, lenses, and accessories is unmatched, and the competitive prices
                  make it a budget-friendly option. The customer service team is knowledgeable and always available to
                  answer any questions I have. Thanks to this website, I've been able to take my photography to the next
                  level!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ============== End testimonials section ========== -->

  <!-- ============== Start cta section ========== -->
  <section class="cta section">
    <div class="container section b-radius bg-box d-flex flex-column justify-content-center align-items-center">
      <div class="d-flex flex-column justify-content-center align-items-center gap-16">
        <h2 class="heading-1 col-lg-8 text-center">Explore Our Latest Watch and Gadget Collection!</h2>
        <p class="body-1 col-lg-8 text-center">where style meets innovation in the realm of watches, gadgets, and
          cutting-edge technology. Discover a curated collection that transcends time.</p>
        <a href="#" class="btn">get started</a>
      </div>
    </div>
  </section>
  <!-- ============== end cta section ========== -->

  <!-- ============== start faq section ========== -->
  <section class="faq position-relative pt-4 mt-4" id="faq">
    <div class="container section">
      <div class="heading d-flex flex-column text-center justify-content-center align-items-center">
        <h2 class="heading-1">frequently asked <span class="unique-text">questions</span></h2>
      </div>
      <div class="row justify-content-center align-items-center  g-4 mt-4 pt-2">
        <div class="col-lg-8 col-12">
          <div class="d-flex flex-column justify-content-center gap-16">
            <div class="b-radius padding-16 bg-box">
              <button class="btn col-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                onclick="rotateIcon('icon1')" aria-expanded="false">
                <span class="d-flex justify-content-between w-100 m-0 p-0 heading-4">
                  What are your membership options and pricing?
                  <i id="icon1" class="fa-solid fa-chevron-down mx-4 icon-sm primary-text rotate-icon"></i>
                </span>
              </button>
              <div class="collapse" id="collapseOne">
                <p class="body-1 mt-4">
                  We offer a variety of membership options to fit your fitness goals and lifestyle, including
                  monthly,
                  quarterly, and annual plans. Our pricing is competitive and transparent, with no hidden fees.
                  Visit
                  our Membership page for more information on pricing and benefits.
                </p>
              </div>
            </div>

            <div class="box b-radius padding-16 bg-box">
              <button class="btn col-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                onclick="rotateIcon('icon2')" aria-expanded="false">
                <span class="d-flex justify-content-between w-100 heading-4 m-0 p-0">
                  What amenities and facilities does your gym offer?
                  <i id="icon2" class="fa-solid fa-chevron-down mx-4 icon-sm primary-text rotate-icon"></i>
                </span>
              </button>
              <div class="collapse" id="collapseTwo">
                <p class="body-2 mt-4">
                  Our state-of-the-art facilities include cardio and strength training equipment, group fitness
                  classes,
                  personal training services, locker rooms with showers, and more. We pride ourselves on creating
                  a
                  welcoming and inclusive environment where members can achieve their fitness goals comfortably.
                </p>
              </div>
            </div>

            <div class="box b-radius padding-16 bg-box">
              <button class="btn col-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                onclick="rotateIcon('icon3')" aria-expanded="false">
                <span class="d-flex justify-content-between w-100 heading-4 m-0 p-0 ">
                  Do you offer personal training services?
                  <i id="icon3" class="fa-solid fa-chevron-down mx-4 icon-sm primary-text rotate-icon"></i>
                </span>
              </button>
              <div class="collapse" id="collapseThree">
                <p class="body-2 mt-4">
                  Yes, we offer personalized training programs led by certified fitness professionals who are
                  dedicated
                  to helping you reach your full potential. Whether you're new to exercise or looking to take your
                  fitness to the next level, our trainers will provide the guidance, motivation, and expertise you
                  need
                  to succeed.
                </p>
              </div>
            </div>

            <div class="b-radius padding-16 bg-box">
              <button class="btn col-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour"
                onclick="rotateIcon('icon4')" aria-expanded="false">
                <span class="d-flex justify-content-between w-100 heading-4 m-0 p-0">
                  What safety measures are in place at your gym?
                  <i id="icon4" class="fa-solid fa-chevron-down mx-4 icon-sm primary-text rotate-icon"></i>
                </span>
              </button>
              <div class="collapse" id="collapsefour">
                <p class="body-2 mt-4">
                  The health and safety of our members are our top priorities. We have implemented rigorous
                  cleaning
                  protocols, social distancing measures, and capacity limits to ensure a safe and hygienic
                  environment
                  for everyone. Additionally, we require all members to adhere to our guidelines for wearing masks
                  and
                  sanitizing equipment before and after use.
                </p>
              </div>
            </div>

            <div class="b-radius padding-16 bg-box">
              <button class="btn col-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                onclick="rotateIcon('icon5')" aria-expanded="false">
                <span class="d-flex justify-content-between w-100 heading-4 m-0 p-0">
                  Can I try out your gym before committing to a membership?
                  <i id="icon5" class="fa-solid fa-chevron-down mx-4 icon-sm primary-text rotate-icon"></i>
                </span>
              </button>
              <div class="collapse" id="collapseFive">
                <p class="body-2 mt-4">
                  Absolutely! We offer complimentary trial passes for first-time visitors to experience our
                  facilities
                  and services firsthand. Simply fill out the form on our website to request your free trial pass
                  and
                  start your fitness journey with us today.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ============== end faq section ========== -->

  <!-- ============== start footer section ========== -->
  <section class="footer position-relative pt-4 mt-4">
    <div class="container">
      <div class="row justify-content-center align-items-center g-4 py-5">
        <div class="col-lg-6 col-12">
          <div class="d-flex flex-column gap-8">
            <h3 class="heading-3">TickHub</h3>
            <p class="body-1 col-lg-8 col-12">Dive into a world where fashion meets expression. Our online clothing
              emporium is a
              curated destination for style enthusiasts</p>
            <div class="d-flex gap-3">
              <i class="fa-brands fa-facebook icon-sm"></i>
              <i class="fa-brands fa-instagram icon-sm"></i>
              <i class="fa-brands fa-twitter icon-sm"></i>
              <i class="fa-brands fa-linkedin icon-sm"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="d-flex flex-column gap-8">
            <h3 class="heading-4">Menu</h3>
            <div class="d-flex flex-column gap-2">
              <a href="index.html">home</a>
              <a href="about.html">about us</a>
              <a href="services.html">services</a>
              <a href="contact.html">contact</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="d-flex flex-column gap-8">
            <h3 class="heading-4">social media</h3>
            <div class="d-flex flex-column gap-2">
              <a href="index.html">twitter</a>
              <a href="about.html">instagram</a>
              <a href="services.html">facebook</a>
              <a href="contact.html">telegram</a>
            </div>
          </div>
        </div>
      </div>
      <hr class="p-0 m-0">
      <div class="d-flex justify-content-between align-items-center g-4 py-2 w-100">
        <p class="body-2">copyright © 2024 TickHub</p>
        <p class="body-2"><a href="terms.html">Terms & Conditions</a> | <a href="privacy-policy.html">Privacy Policy</a>
        </p>
      </div>
    </div>
  </section>
  <!-- ============== end footer section ========== -->


  <!-- jQuery -->
<script src="{{ asset('js/storeFront js/jquery-3.6.1.min.js') }}"></script>

<!-- toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- owl carousel -->
<script src="{{ asset('js/storeFront js/owl.carousel.min.js') }}"></script>

<!-- isotope filter -->
<script src="{{ asset('js/storeFront js/isotope.min.js') }}"></script>

<!-- bootstrap bundle -->
<script src="{{ asset('js/storeFront js/bootstrap.bundle.min.js') }}"></script>

<!-- counter -->
<script src="{{ asset('js/storeFront js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/storeFront js/jquery.waypoints.js') }}"></script>

<!-- main js -->
<script src="{{ asset('js/storeFront js/main.js') }}"></script>


</body>

</html>