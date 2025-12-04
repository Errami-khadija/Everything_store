<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Everything Store</title>
  <script src="/_sdk/element_sdk.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
   @vite(['resources/css/shop.css'])
 
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
 <body>
  <div id="app" class="min-h-full flex flex-col w-full"><!-- Header -->
   <header id="header" class="sticky top-0 z-50 shadow-md w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
     <div class="flex items-center justify-between">
      <div>
       <h1 id="store-name" class="text-3xl font-bold">Everything Store</h1>
       <p id="store-tagline" class="text-sm mt-1">Your one-stop shop for everything</p>
      </div><button id="cart-btn" class="relative p-3 rounded-full transition-colors">
       <svg class="w-7 h-7" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
       </svg><span id="cart-count" class="absolute -top-1 -right-1 text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center">0</span> </button>
     </div><!-- Search Bar -->
     <div class="mt-4">
      <div class="relative"><input type="text" id="search-input" placeholder="Search products..." class="w-full px-4 py-3 pl-12 rounded-lg border-2 focus:outline-none focus:border-opacity-80 transition-colors">
       <svg class="w-5 h-5 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
       </svg>
      </div>
     </div>
    </div><!-- Navigation Bar -->
    <nav id="nav-bar" class="border-t w-full">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-center gap-8 py-3 flex-wrap"><a href="#home" class="nav-link font-medium">Home</a> <a href="#categories" class="nav-link font-medium">Categories</a> <a href="#featured" class="nav-link font-medium">Featured</a> <a href="#products" class="nav-link font-medium">All Products</a> <a href="#about" class="nav-link font-medium">About</a> <a href="#contact" class="nav-link font-medium">Contact</a>
      </div>
     </div>
    </nav>
   </header><!-- Main Content -->
   <main class="flex-1 w-full"><!-- Hero Section -->
    <section id="hero" class="py-20 w-full">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <div class="text-8xl mb-6">
       🛍️✨🎉
      </div>
      <h1 id="hero-title" class="text-5xl font-bold mb-4">Welcome to Everything Store</h1>
      <p id="hero-subtitle" class="text-xl mb-8 opacity-80">Discover amazing products at unbeatable prices</p><button id="hero-button" class="px-8 py-4 rounded-lg font-semibold text-lg transition-colors shadow-lg hover:shadow-xl"> <span id="hero-button-text">Shop Now</span> </button>
     </div>
    </section><!-- Categories Section -->
    <section id="categories" class="py-12 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <h2 id="categories-title" class="text-3xl font-bold mb-8 text-center">Shop by Category</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            
            @foreach($categories as $category)
                <div class="category-card rounded-lg shadow-md p-6 text-center">
                    
                    {{-- Category Image --}}
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}"
                             alt="{{ $category->name }}"
                             class="w-16 h-16 mx-auto mb-3 object-cover rounded-full">
                    @else
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto mb-3"></div>
                    @endif

                    {{-- Category Name --}}
                    <h3 class="font-semibold mb-1">{{ $category->name }}</h3>

                    {{-- Number of items --}}
                    <p class="text-sm opacity-70">{{ $category->products_count }} items</p>

                </div>
            @endforeach

        </div>

    </div>
</section>
<!-- New Products Section -->
    <section id="new-products" class="py-12 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 id="new-products-title" class="text-3xl font-bold mb-8 text-center">New Arrivals</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($newProducts as $product)
                <div class="product-card rounded-lg shadow-md overflow-hidden bg-white">

                    {{-- Product Image --}}
                    @if(!empty($product->images))
                        <img src="{{ asset('uploads/products/' . $product->images[0]) }}"
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-6xl">
                            🎁
                        </div>
                    @endif

                    <div class="p-4">

                        {{-- New badge --}}
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold px-2 py-1 rounded" style="background: #10b981; color: white;">NEW</span>
                        </div>

                        {{-- Product Name --}}
                        <h3 class="font-semibold text-lg mb-1">{{ $product->name }}</h3>

                        {{-- Category Name --}}
                        <p class="text-sm opacity-70 mb-3">{{ $product->category->name ?? 'No Category' }}</p>

                        {{-- Price + Add To Cart button --}}
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold">${{ number_format($product->price, 2) }}</span>
                            <button class="add-to-cart-btn px-4 py-2 rounded-lg font-medium transition-colors">
                                Add to Cart
                            </button>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        <div class="text-center mt-8">
            <a href="#products" class="show-more-link inline-block px-6 py-3 rounded-lg font-semibold transition-opacity">
                Show More →
            </a>
        </div>

    </div>
</section>
<!-- Featured Products Section -->
   <section id="featured" class="py-12 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 id="featured-title" class="text-3xl font-bold mb-8 text-center">Featured Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($featuredProducts as $product)
                <div class="product-card rounded-lg shadow-md overflow-hidden bg-white">

                    {{-- Product Image --}}
                    @if(!empty($product->images))
                        <img src="{{ asset('uploads/products/' . $product->images[0]) }}"
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-6xl">
                            🎁
                        </div>
                    @endif

                    <div class="p-4">

                        {{-- Featured badge --}}
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold px-2 py-1 rounded" style="background: #f59e0b; color: white;">
                                FEATURED
                            </span>
                        </div>

                        {{-- Product Name --}}
                        <h3 class="font-semibold text-lg mb-1">{{ $product->name }}</h3>

                        {{-- Category Name --}}
                        <p class="text-sm opacity-70 mb-3">{{ $product->category->name ?? 'No Category' }}</p>

                        {{-- Price + Add To Cart button --}}
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold">${{ number_format($product->price, 2) }}</span>
                            <button class="add-to-cart-btn px-4 py-2 rounded-lg font-medium transition-colors">
                                Add to Cart
                            </button>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        <div class="text-center mt-8">
            <a href="#products" class="show-more-link inline-block px-6 py-3 rounded-lg font-semibold transition-opacity">
                Show More →
            </a>
        </div>

    </div>
</section>
<!-- All Products Section -->
    <section id="products" class="py-12 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold mb-8 text-center">All Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            
            @foreach($products as $product)
                <div class="product-card rounded-lg shadow-md overflow-hidden bg-white">

                    {{-- Product Image --}}
                    @if(!empty($product->images))
                        <img src="{{ asset('uploads/products/' . $product->images[0]) }}"
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200"></div>
                    @endif

                    <div class="p-4">

                        {{-- Product Name --}}
                        <h3 class="font-semibold text-lg mb-1">
                            {{ $product->name }}
                        </h3>

                        {{-- Category Name --}}
                        <p class="text-sm opacity-70 mb-3">
                            {{ $product->category->name ?? 'No Category' }}
                        </p>

                        {{-- Price + Add To Cart button --}}
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold">${{ number_format($product->price, 2) }}</span>

                            <button class="add-to-cart-btn px-4 py-2 rounded-lg font-medium transition-colors">
                                Add to Cart
                            </button>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

   </main><!-- Footer -->
   <footer id="footer" class="mt-auto border-t w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
     <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <div class="md:col-span-2">
       <h3 id="footer-store-name" class="text-2xl font-bold mb-4">Everything Store</h3>
       <p id="footer-about" class="opacity-70 mb-4">Your trusted online marketplace for quality products. We offer cash on delivery for your convenience.</p>
      </div>
      <div>
       <h4 class="font-semibold mb-4">Quick Links</h4>
       <ul class="space-y-2 opacity-70">
        <li><a href="#home" class="hover:opacity-100 transition-opacity">Home</a></li>
        <li><a href="#categories" class="hover:opacity-100 transition-opacity">Categories</a></li>
        <li><a href="#featured" class="hover:opacity-100 transition-opacity">Featured</a></li>
        <li><a href="#products" class="hover:opacity-100 transition-opacity">Products</a></li>
       </ul>
      </div>
      <div>
       <h4 class="font-semibold mb-4">Customer Service</h4>
       <ul class="space-y-2 opacity-70">
        <li><a href="#about" class="hover:opacity-100 transition-opacity">About Us</a></li>
        <li><a href="#contact" class="hover:opacity-100 transition-opacity">Contact</a></li>
        <li><a href="#shipping" class="hover:opacity-100 transition-opacity">Shipping Info</a></li>
        <li><a href="#returns" class="hover:opacity-100 transition-opacity">Returns</a></li>
       </ul>
      </div>
     </div>
     <div class="border-t mt-8 pt-8 text-center">
      <p id="copyright-text" class="opacity-70">© 2024 Everything Store. All rights reserved.</p>
     </div>
    </div>
   </footer>
  </div>
   @vite(['resources/js/shop.js'])
</body>
</html>