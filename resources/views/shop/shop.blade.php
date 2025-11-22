<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Everything Store</title>
  <script src="/_sdk/element_sdk.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      height: 100%;
    }
    
    html {
      height: 100%;
    }
    
    .product-card {
      transition: transform 0.2s, box-shadow 0.2s;
    }
    
    .product-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }
    
    .category-card {
      transition: transform 0.2s, box-shadow 0.2s;
      cursor: pointer;
    }
    
    .category-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
    
    .collection-card {
      transition: transform 0.2s;
      cursor: pointer;
    }
    
    .collection-card:hover {
      transform: scale(1.02);
    }
    
    .cart-badge {
      animation: bounce 0.3s ease;
    }
    
    @keyframes bounce {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.2); }
    }
    
    .toast {
      position: fixed;
      top: 20px;
      right: 20px;
      background: #10b981;
      color: white;
      padding: 16px 24px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      z-index: 1000;
      animation: slideIn 0.3s ease;
    }
    
    @keyframes slideIn {
      from {
        transform: translateX(400px);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
    
    .modal-backdrop {
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(4px);
    }
    
    .nav-link {
      transition: opacity 0.2s;
    }
    
    .nav-link:hover {
      opacity: 0.7;
    }
  </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
 <body>
  <div id="app" class="min-h-full flex flex-col"><!-- Header -->
   <header id="header" class="sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
     <div class="flex items-center justify-between">
      <div>
       <h1 id="store-name" class="text-3xl font-bold">Everything Store</h1>
       <p id="store-tagline" class="text-sm mt-1">Your one-stop shop for everything</p>
      </div><button id="cart-btn" class="relative p-3 rounded-full transition-colors">
       <svg class="w-7 h-7" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
       </svg><span id="cart-count" class="absolute -top-1 -right-1 text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center cart-badge">0</span> </button>
     </div><!-- Search Bar -->
     <div class="mt-4">
      <div class="relative"><input type="text" id="search-input" placeholder="Search products..." class="w-full px-4 py-3 pl-12 rounded-lg border-2 focus:outline-none focus:border-opacity-80 transition-colors">
       <svg class="w-5 h-5 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
       </svg>
      </div>
     </div>
    </div><!-- Navigation Bar -->
    <nav id="nav-bar" class="border-t">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-center gap-8 py-3 flex-wrap"><a href="#home" class="nav-link font-medium">Home</a> <a href="#categories" class="nav-link font-medium">Categories</a> <a href="#featured" class="nav-link font-medium">Featured</a> <a href="#products" class="nav-link font-medium">All Products</a> <a href="#about" class="nav-link font-medium">About</a> <a href="#contact" class="nav-link font-medium">Contact</a>
      </div>
     </div>
    </nav>
   </header><!-- Main Content -->
   <main class="flex-1 w-full"><!-- Hero Section -->
    <section id="hero" class="py-20">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <div class="text-8xl mb-6">
       🛍️✨🎉
      </div>
      <h1 id="hero-title" class="text-5xl font-bold mb-4">Welcome to Everything Store</h1>
      <p id="hero-subtitle" class="text-xl mb-8 opacity-80">Discover amazing products at unbeatable prices</p><button id="hero-button" class="px-8 py-4 rounded-lg font-semibold text-lg transition-colors shadow-lg hover:shadow-xl"> <span id="hero-button-text">Shop Now</span> </button>
     </div>
    </section><!-- Categories Section -->
    <section id="categories" class="py-12">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 id="categories-title" class="text-3xl font-bold mb-8 text-center">Shop by Category</h2>
      <div id="categories-grid" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4"><!-- Categories will be inserted here -->
      </div>
     </div>
    </section><!-- New Products Section -->
    <section id="new-products" class="py-12">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 id="new-products-title" class="text-3xl font-bold mb-8 text-center">New Arrivals</h2>
      <div id="new-products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"><!-- New products will be inserted here -->
      </div>
     </div>
    </section><!-- Featured Products Section -->
    <section id="featured" class="py-12">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 id="featured-title" class="text-3xl font-bold mb-8 text-center">Featured Products</h2>
      <div id="featured-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"><!-- Featured products will be inserted here -->
      </div>
     </div>
    </section><!-- Products Section -->
    <section id="products" class="py-12">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold mb-8 text-center">All Products</h2>
      <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"><!-- Products will be inserted here -->
      </div>
      <div id="no-results" class="hidden text-center py-16">
       <svg class="w-24 h-24 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
       </svg>
       <p class="text-xl font-semibold opacity-70">No products found</p>
       <p class="mt-2 opacity-50">Try adjusting your search</p>
      </div>
     </div>
    </section>
   </main><!-- Footer -->
   <footer id="footer" class="mt-auto border-t">
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
   </footer><!-- Cart Modal -->
   <div id="cart-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="modal-backdrop fixed inset-0" id="cart-backdrop"></div>
    <div class="flex items-center justify-center min-h-full p-4">
     <div class="relative rounded-lg shadow-2xl max-w-2xl w-full max-h-[90%] overflow-y-auto">
      <div class="sticky top-0 z-10 px-6 py-4 border-b flex items-center justify-between">
       <h2 class="text-2xl font-bold">Shopping Cart</h2><button id="close-cart" class="p-2 rounded-full hover:bg-opacity-10 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg></button>
      </div>
      <div id="cart-items" class="px-6 py-4"><!-- Cart items will be inserted here -->
      </div>
      <div id="cart-empty" class="hidden px-6 py-12 text-center">
       <svg class="w-20 h-20 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
       </svg>
       <p class="text-lg opacity-70">Your cart is empty</p>
      </div>
      <div id="cart-footer" class="sticky bottom-0 px-6 py-4 border-t">
       <div class="flex items-center justify-between mb-4"><span class="text-lg font-semibold">Total:</span> <span id="cart-total" class="text-2xl font-bold">$0.00</span>
       </div><button id="checkout-btn" class="w-full py-3 rounded-lg font-semibold transition-colors"> Proceed to Checkout </button>
      </div>
     </div>
    </div>
   </div><!-- Checkout Modal -->
   <div id="checkout-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="modal-backdrop fixed inset-0" id="checkout-backdrop"></div>
    <div class="flex items-center justify-center min-h-full p-4">
     <div class="relative rounded-lg shadow-2xl max-w-2xl w-full max-h-[90%] overflow-y-auto">
      <div class="sticky top-0 z-10 px-6 py-4 border-b flex items-center justify-between">
       <h2 id="checkout-title" class="text-2xl font-bold">Complete Your Order</h2><button id="close-checkout" class="p-2 rounded-full hover:bg-opacity-10 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg></button>
      </div>
      <form id="checkout-form" class="px-6 py-6">
       <div class="mb-6 p-4 rounded-lg border-2">
        <p id="delivery-notice" class="text-sm font-medium">💵 Cash on Delivery Available</p>
       </div>
       <div class="space-y-4">
        <div><label for="customer-name" class="block text-sm font-medium mb-2">Full Name</label> <input type="text" id="customer-name" required class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:border-opacity-80 transition-colors">
        </div>
        <div><label for="customer-email" class="block text-sm font-medium mb-2">Email Address</label> <input type="email" id="customer-email" required class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:border-opacity-80 transition-colors">
        </div>
        <div><label for="customer-phone" class="block text-sm font-medium mb-2">Phone Number</label> <input type="tel" id="customer-phone" required class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:border-opacity-80 transition-colors">
        </div>
        <div><label for="customer-address" class="block text-sm font-medium mb-2">Delivery Address</label> <textarea id="customer-address" required rows="3" class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:border-opacity-80 transition-colors"></textarea>
        </div>
        <div><label for="customer-city" class="block text-sm font-medium mb-2">City</label> <input type="text" id="customer-city" required class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:border-opacity-80 transition-colors">
        </div>
        <div><label for="customer-notes" class="block text-sm font-medium mb-2">Order Notes (Optional)</label> <textarea id="customer-notes" rows="2" placeholder="Any special instructions..." class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:border-opacity-80 transition-colors"></textarea>
        </div>
       </div>
       <div class="mt-6 p-4 rounded-lg border-2">
        <h3 class="font-semibold mb-3">Order Summary</h3>
        <div id="checkout-items" class="space-y-2 mb-3"><!-- Order items will be inserted here -->
        </div>
        <div class="pt-3 border-t-2 flex items-center justify-between"><span class="font-semibold">Total Amount:</span> <span id="checkout-total" class="text-xl font-bold">$0.00</span>
        </div>
       </div><button type="submit" class="w-full mt-6 py-3 rounded-lg font-semibold transition-colors"> Place Order (Cash on Delivery) </button>
      </form>
     </div>
    </div>
   </div>
  </div>
  <script>
    const defaultConfig = {
      background_color: "#f8fafc",
      surface_color: "#ffffff",
      text_color: "#1e293b",
      primary_action_color: "#3b82f6",
      secondary_action_color: "#64748b",
      font_family: "Inter",
      font_size: 16,
      store_name: "Everything Store",
      store_tagline: "Your one-stop shop for everything",
      hero_title: "Welcome to Everything Store",
      hero_subtitle: "Discover amazing products at unbeatable prices",
      hero_button_text: "Shop Now",
      categories_title: "Shop by Category",
      new_products_title: "New Arrivals",
      featured_title: "Featured Products",
      checkout_title: "Complete Your Order",
      delivery_notice: "💵 Cash on Delivery Available",
      footer_about: "Your trusted online marketplace for quality products. We offer cash on delivery for your convenience.",
      copyright_text: "© 2024 Everything Store. All rights reserved."
    };

    let config = { ...defaultConfig };

    // Sample products data
    const products = [
      { id: 1, name: "Wireless Headphones", price: 79.99, category: "Electronics", image: "🎧", featured: true, isNew: false },
      { id: 2, name: "Smart Watch", price: 199.99, category: "Electronics", image: "⌚", featured: true, isNew: true },
      { id: 3, name: "Laptop Backpack", price: 49.99, category: "Accessories", image: "🎒", featured: false, isNew: true },
      { id: 4, name: "Coffee Maker", price: 89.99, category: "Home", image: "☕", featured: true, isNew: false },
      { id: 5, name: "Yoga Mat", price: 29.99, category: "Sports", image: "🧘", featured: false, isNew: true },
      { id: 6, name: "Desk Lamp", price: 39.99, category: "Home", image: "💡", featured: false, isNew: false },
      { id: 7, name: "Running Shoes", price: 119.99, category: "Sports", image: "👟", featured: true, isNew: true },
      { id: 8, name: "Bluetooth Speaker", price: 59.99, category: "Electronics", image: "🔊", featured: true, isNew: false },
      { id: 9, name: "Water Bottle", price: 19.99, category: "Sports", image: "💧", featured: false, isNew: false },
      { id: 10, name: "Notebook Set", price: 24.99, category: "Stationery", image: "📓", featured: false, isNew: false },
      { id: 11, name: "Sunglasses", price: 69.99, category: "Accessories", image: "🕶️", featured: true, isNew: false },
      { id: 12, name: "Plant Pot", price: 34.99, category: "Home", image: "🪴", featured: false, isNew: false }
    ];

    const categories = [
      { name: "Electronics", icon: "📱", count: 3 },
      { name: "Sports", icon: "⚽", count: 3 },
      { name: "Home", icon: "🏠", count: 3 },
      { name: "Accessories", icon: "👜", count: 2 },
      { name: "Stationery", icon: "✏️", count: 1 },
      { name: "All", icon: "🛍️", count: 12 }
    ];

    let cart = [];
    let filteredProducts = [...products];
    let activeCategory = "All";

    function showToast(message) {
      const toast = document.createElement('div');
      toast.className = 'toast';
      toast.textContent = message;
      document.body.appendChild(toast);
      setTimeout(() => toast.remove(), 3000);
    }

    function updateCartCount() {
      const count = cart.reduce((sum, item) => sum + item.quantity, 0);
      const cartCount = document.getElementById('cart-count');
      cartCount.textContent = count;
      cartCount.classList.add('cart-badge');
      setTimeout(() => cartCount.classList.remove('cart-badge'), 300);
    }

    function calculateTotal() {
      return cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    }

    function addToCart(product) {
      const existing = cart.find(item => item.id === product.id);
      if (existing) {
        existing.quantity++;
      } else {
        cart.push({ ...product, quantity: 1 });
      }
      updateCartCount();
      showToast(`${product.name} added to cart!`);
    }

    function removeFromCart(productId) {
      cart = cart.filter(item => item.id !== productId);
      updateCartCount();
      renderCart();
    }

    function updateQuantity(productId, change) {
      const item = cart.find(item => item.id === productId);
      if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
          removeFromCart(productId);
        } else {
          updateCartCount();
          renderCart();
        }
      }
    }

    function filterByCategory(category) {
      activeCategory = category;
      if (category === "All") {
        filteredProducts = [...products];
      } else {
        filteredProducts = products.filter(p => p.category === category);
      }
      document.getElementById('search-input').value = '';
      renderProducts();
      document.getElementById('products').scrollIntoView({ behavior: 'smooth' });
    }

    function renderNewProducts() {
      const grid = document.getElementById('new-products-grid');
      const newProducts = products.filter(p => p.isNew);
      
      grid.innerHTML = newProducts.map(product => `
        <div class="product-card rounded-lg shadow-md overflow-hidden" style="background: ${config.surface_color}; color: ${config.text_color};">
          <div class="text-6xl text-center py-8" style="background: ${config.background_color};">
            ${product.image}
          </div>
          <div class="p-4">
            <div class="flex items-center gap-2 mb-2">
              <span class="text-xs font-bold px-2 py-1 rounded" style="background: #10b981; color: white;">NEW</span>
            </div>
            <h3 class="font-semibold text-lg mb-1" style="font-family: ${config.font_family}, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; font-size: ${config.font_size * 1.125}px;">${product.name}</h3>
            <p class="text-sm opacity-70 mb-3" style="font-size: ${config.font_size * 0.875}px;">${product.category}</p>
            <div class="flex items-center justify-between">
              <span class="text-xl font-bold" style="font-size: ${config.font_size * 1.25}px;">$${product.price.toFixed(2)}</span>
              <button onclick="addToCart(${JSON.stringify(product).replace(/"/g, '&quot;')})" class="px-4 py-2 rounded-lg font-medium transition-colors" style="background: ${config.primary_action_color}; color: white; font-size: ${config.font_size * 0.875}px;">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      `).join('');
    }

    function renderFeaturedProducts() {
      const grid = document.getElementById('featured-grid');
      const featuredProducts = products.filter(p => p.featured);
      
      grid.innerHTML = featuredProducts.map(product => `
        <div class="product-card rounded-lg shadow-md overflow-hidden" style="background: ${config.surface_color}; color: ${config.text_color};">
          <div class="text-6xl text-center py-8" style="background: ${config.background_color};">
            ${product.image}
          </div>
          <div class="p-4">
            <div class="flex items-center gap-2 mb-2">
              <span class="text-xs font-bold px-2 py-1 rounded" style="background: ${config.primary_action_color}; color: white;">FEATURED</span>
            </div>
            <h3 class="font-semibold text-lg mb-1" style="font-family: ${config.font_family}, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; font-size: ${config.font_size * 1.125}px;">${product.name}</h3>
            <p class="text-sm opacity-70 mb-3" style="font-size: ${config.font_size * 0.875}px;">${product.category}</p>
            <div class="flex items-center justify-between">
              <span class="text-xl font-bold" style="font-size: ${config.font_size * 1.25}px;">$${product.price.toFixed(2)}</span>
              <button onclick="addToCart(${JSON.stringify(product).replace(/"/g, '&quot;')})" class="px-4 py-2 rounded-lg font-medium transition-colors" style="background: ${config.primary_action_color}; color: white; font-size: ${config.font_size * 0.875}px;">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      `).join('');
    }

    function renderCategories() {
      const grid = document.getElementById('categories-grid');
      grid.innerHTML = categories.map(cat => `
        <div class="category-card rounded-lg shadow-md p-6 text-center" style="background: ${config.surface_color}; color: ${config.text_color};" onclick="filterByCategory('${cat.name}')">
          <div class="text-4xl mb-3">${cat.icon}</div>
          <h3 class="font-semibold mb-1" style="font-family: ${config.font_family}, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; font-size: ${config.font_size}px;">${cat.name}</h3>
          <p class="text-sm opacity-70" style="font-size: ${config.font_size * 0.75}px;">${cat.count} items</p>
        </div>
      `).join('');
    }

    function renderProducts() {
      const grid = document.getElementById('products-grid');
      const noResults = document.getElementById('no-results');
      
      if (filteredProducts.length === 0) {
        grid.classList.add('hidden');
        noResults.classList.remove('hidden');
        return;
      }
      
      grid.classList.remove('hidden');
      noResults.classList.add('hidden');
      
      grid.innerHTML = filteredProducts.map(product => `
        <div class="product-card rounded-lg shadow-md overflow-hidden" style="background: ${config.surface_color}; color: ${config.text_color};">
          <div class="text-6xl text-center py-8" style="background: ${config.background_color};">
            ${product.image}
          </div>
          <div class="p-4">
            <h3 class="font-semibold text-lg mb-1" style="font-family: ${config.font_family}, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; font-size: ${config.font_size * 1.125}px;">${product.name}</h3>
            <p class="text-sm opacity-70 mb-3" style="font-size: ${config.font_size * 0.875}px;">${product.category}</p>
            <div class="flex items-center justify-between">
              <span class="text-xl font-bold" style="font-size: ${config.font_size * 1.25}px;">$${product.price.toFixed(2)}</span>
              <button onclick="addToCart(${JSON.stringify(product).replace(/"/g, '&quot;')})" class="px-4 py-2 rounded-lg font-medium transition-colors" style="background: ${config.primary_action_color}; color: white; font-size: ${config.font_size * 0.875}px;">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      `).join('');
    }

    function renderCart() {
      const cartItems = document.getElementById('cart-items');
      const cartEmpty = document.getElementById('cart-empty');
      const cartFooter = document.getElementById('cart-footer');
      const cartTotal = document.getElementById('cart-total');
      
      if (cart.length === 0) {
        cartItems.classList.add('hidden');
        cartFooter.classList.add('hidden');
        cartEmpty.classList.remove('hidden');
        return;
      }
      
      cartItems.classList.remove('hidden');
      cartFooter.classList.remove('hidden');
      cartEmpty.classList.add('hidden');
      
      cartItems.innerHTML = cart.map(item => `
        <div class="flex items-center gap-4 py-4 border-b" style="border-color: ${config.background_color};">
          <div class="text-4xl">${item.image}</div>
          <div class="flex-1">
            <h4 class="font-semibold" style="font-family: ${config.font_family}, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; font-size: ${config.font_size}px; color: ${config.text_color};">${item.name}</h4>
            <p class="opacity-70" style="font-size: ${config.font_size * 0.875}px; color: ${config.text_color};">$${item.price.toFixed(2)} each</p>
          </div>
          <div class="flex items-center gap-2">
            <button onclick="updateQuantity(${item.id}, -1)" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors" style="background: ${config.background_color}; color: ${config.text_color};">-</button>
            <span class="w-8 text-center font-semibold" style="font-size: ${config.font_size}px; color: ${config.text_color};">${item.quantity}</span>
            <button onclick="updateQuantity(${item.id}, 1)" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors" style="background: ${config.background_color}; color: ${config.text_color};">+</button>
          </div>
          <div class="text-right">
            <p class="font-bold" style="font-size: ${config.font_size * 1.125}px; color: ${config.text_color};">$${(item.price * item.quantity).toFixed(2)}</p>
            <button onclick="removeFromCart(${item.id})" class="text-sm mt-1 transition-colors" style="color: ${config.secondary_action_color}; font-size: ${config.font_size * 0.75}px;">Remove</button>
          </div>
        </div>
      `).join('');
      
      cartTotal.textContent = `$${calculateTotal().toFixed(2)}`;
      cartTotal.style.color = config.text_color;
    }

    function renderCheckoutSummary() {
      const checkoutItems = document.getElementById('checkout-items');
      const checkoutTotal = document.getElementById('checkout-total');
      
      checkoutItems.innerHTML = cart.map(item => `
        <div class="flex justify-between text-sm" style="color: ${config.text_color}; font-size: ${config.font_size * 0.875}px;">
          <span>${item.name} × ${item.quantity}</span>
          <span class="font-semibold">$${(item.price * item.quantity).toFixed(2)}</span>
        </div>
      `).join('');
      
      checkoutTotal.textContent = `$${calculateTotal().toFixed(2)}`;
      checkoutTotal.style.color = config.text_color;
    }

    // Event Listeners
    document.getElementById('hero-button').addEventListener('click', () => {
      document.getElementById('products').scrollIntoView({ behavior: 'smooth' });
    });

    document.getElementById('search-input').addEventListener('input', (e) => {
      const query = e.target.value.toLowerCase();
      filteredProducts = products.filter(p => 
        p.name.toLowerCase().includes(query) || 
        p.category.toLowerCase().includes(query)
      );
      renderProducts();
    });

    document.getElementById('cart-btn').addEventListener('click', () => {
      document.getElementById('cart-modal').classList.remove('hidden');
      renderCart();
    });

    document.getElementById('close-cart').addEventListener('click', () => {
      document.getElementById('cart-modal').classList.add('hidden');
    });

    document.getElementById('cart-backdrop').addEventListener('click', () => {
      document.getElementById('cart-modal').classList.add('hidden');
    });

    document.getElementById('checkout-btn').addEventListener('click', () => {
      document.getElementById('cart-modal').classList.add('hidden');
      document.getElementById('checkout-modal').classList.remove('hidden');
      renderCheckoutSummary();
    });

    document.getElementById('close-checkout').addEventListener('click', () => {
      document.getElementById('checkout-modal').classList.add('hidden');
    });

    document.getElementById('checkout-backdrop').addEventListener('click', () => {
      document.getElementById('checkout-modal').classList.add('hidden');
    });

    document.getElementById('checkout-form').addEventListener('submit', (e) => {
      e.preventDefault();
      
      const orderData = {
        customer: {
          name: document.getElementById('customer-name').value,
          email: document.getElementById('customer-email').value,
          phone: document.getElementById('customer-phone').value,
          address: document.getElementById('customer-address').value,
          city: document.getElementById('customer-city').value,
          notes: document.getElementById('customer-notes').value
        },
        items: cart,
        total: calculateTotal(),
        paymentMethod: 'Cash on Delivery',
        timestamp: new Date().toISOString()
      };
      
      console.log('Order Data (ready for Laravel backend):', orderData);
      
      showToast('Order placed successfully! We will contact you soon.');
      
      cart = [];
      updateCartCount();
      document.getElementById('checkout-modal').classList.add('hidden');
      document.getElementById('checkout-form').reset();
    });

    async function onConfigChange(newConfig) {
      const customFont = newConfig.font_family || defaultConfig.font_family;
      const baseFontStack = '-apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif';
      const fontFamily = `${customFont}, ${baseFontStack}`;
      const baseSize = newConfig.font_size || defaultConfig.font_size;
      
      document.body.style.background = newConfig.background_color || defaultConfig.background_color;
      document.body.style.fontFamily = fontFamily;
      document.body.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const header = document.getElementById('header');
      header.style.background = newConfig.surface_color || defaultConfig.surface_color;
      header.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const navBar = document.getElementById('nav-bar');
      navBar.style.borderColor = newConfig.background_color || defaultConfig.background_color;
      navBar.style.background = newConfig.surface_color || defaultConfig.surface_color;
      
      const navLinks = document.querySelectorAll('.nav-link');
      navLinks.forEach(link => {
        link.style.color = newConfig.text_color || defaultConfig.text_color;
        link.style.fontSize = `${baseSize}px`;
      });
      
      const storeName = document.getElementById('store-name');
      storeName.textContent = newConfig.store_name || defaultConfig.store_name;
      storeName.style.fontFamily = fontFamily;
      storeName.style.fontSize = `${baseSize * 1.875}px`;
      storeName.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const storeTagline = document.getElementById('store-tagline');
      storeTagline.textContent = newConfig.store_tagline || defaultConfig.store_tagline;
      storeTagline.style.fontSize = `${baseSize * 0.875}px`;
      storeTagline.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const heroSection = document.getElementById('hero');
      heroSection.style.background = newConfig.background_color || defaultConfig.background_color;
      
      const heroTitle = document.getElementById('hero-title');
      heroTitle.textContent = newConfig.hero_title || defaultConfig.hero_title;
      heroTitle.style.fontFamily = fontFamily;
      heroTitle.style.fontSize = `${baseSize * 3}px`;
      heroTitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const heroSubtitle = document.getElementById('hero-subtitle');
      heroSubtitle.textContent = newConfig.hero_subtitle || defaultConfig.hero_subtitle;
      heroSubtitle.style.fontSize = `${baseSize * 1.25}px`;
      heroSubtitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const heroButton = document.getElementById('hero-button');
      heroButton.style.background = newConfig.primary_action_color || defaultConfig.primary_action_color;
      heroButton.style.color = 'white';
      
      const heroButtonText = document.getElementById('hero-button-text');
      heroButtonText.textContent = newConfig.hero_button_text || defaultConfig.hero_button_text;
      heroButtonText.style.fontSize = `${baseSize * 1.125}px`;
      
      const categoriesTitle = document.getElementById('categories-title');
      categoriesTitle.textContent = newConfig.categories_title || defaultConfig.categories_title;
      categoriesTitle.style.fontFamily = fontFamily;
      categoriesTitle.style.fontSize = `${baseSize * 1.875}px`;
      categoriesTitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const newProductsTitle = document.getElementById('new-products-title');
      newProductsTitle.textContent = newConfig.new_products_title || defaultConfig.new_products_title;
      newProductsTitle.style.fontFamily = fontFamily;
      newProductsTitle.style.fontSize = `${baseSize * 1.875}px`;
      newProductsTitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const featuredTitle = document.getElementById('featured-title');
      featuredTitle.textContent = newConfig.featured_title || defaultConfig.featured_title;
      featuredTitle.style.fontFamily = fontFamily;
      featuredTitle.style.fontSize = `${baseSize * 1.875}px`;
      featuredTitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const cartBtn = document.getElementById('cart-btn');
      cartBtn.style.background = newConfig.primary_action_color || defaultConfig.primary_action_color;
      cartBtn.style.color = 'white';
      
      const cartCount = document.getElementById('cart-count');
      cartCount.style.background = newConfig.secondary_action_color || defaultConfig.secondary_action_color;
      cartCount.style.color = 'white';
      
      const searchInput = document.getElementById('search-input');
      searchInput.style.borderColor = newConfig.secondary_action_color || defaultConfig.secondary_action_color;
      searchInput.style.color = newConfig.text_color || defaultConfig.text_color;
      searchInput.style.fontSize = `${baseSize}px`;
      
      const checkoutTitle = document.getElementById('checkout-title');
      checkoutTitle.textContent = newConfig.checkout_title || defaultConfig.checkout_title;
      checkoutTitle.style.fontFamily = fontFamily;
      checkoutTitle.style.fontSize = `${baseSize * 1.5}px`;
      checkoutTitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const deliveryNotice = document.getElementById('delivery-notice');
      deliveryNotice.textContent = newConfig.delivery_notice || defaultConfig.delivery_notice;
      deliveryNotice.style.fontSize = `${baseSize * 0.875}px`;
      deliveryNotice.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const footer = document.getElementById('footer');
      footer.style.background = newConfig.surface_color || defaultConfig.surface_color;
      footer.style.color = newConfig.text_color || defaultConfig.text_color;
      footer.style.borderColor = newConfig.background_color || defaultConfig.background_color;
      
      const footerStoreName = document.getElementById('footer-store-name');
      footerStoreName.textContent = newConfig.store_name || defaultConfig.store_name;
      footerStoreName.style.fontFamily = fontFamily;
      footerStoreName.style.fontSize = `${baseSize * 1.5}px`;
      footerStoreName.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const footerAbout = document.getElementById('footer-about');
      footerAbout.textContent = newConfig.footer_about || defaultConfig.footer_about;
      footerAbout.style.fontSize = `${baseSize}px`;
      
      const copyrightText = document.getElementById('copyright-text');
      copyrightText.textContent = newConfig.copyright_text || defaultConfig.copyright_text;
      copyrightText.style.fontSize = `${baseSize * 0.875}px`;
      
      const modals = document.querySelectorAll('#cart-modal > div > div, #checkout-modal > div > div');
      modals.forEach(modal => {
        modal.style.background = newConfig.surface_color || defaultConfig.surface_color;
        modal.style.color = newConfig.text_color || defaultConfig.text_color;
      });
      
      const labels = document.querySelectorAll('label');
      labels.forEach(label => {
        label.style.color = newConfig.text_color || defaultConfig.text_color;
        label.style.fontSize = `${baseSize * 0.875}px`;
      });
      
      const inputs = document.querySelectorAll('input, textarea');
      inputs.forEach(input => {
        input.style.borderColor = newConfig.secondary_action_color || defaultConfig.secondary_action_color;
        input.style.color = newConfig.text_color || defaultConfig.text_color;
        input.style.fontSize = `${baseSize}px`;
      });
      
      const checkoutBtn = document.getElementById('checkout-btn');
      checkoutBtn.style.background = newConfig.primary_action_color || defaultConfig.primary_action_color;
      checkoutBtn.style.color = 'white';
      checkoutBtn.style.fontSize = `${baseSize}px`;
      
      const submitBtn = document.querySelector('#checkout-form button[type="submit"]');
      submitBtn.style.background = newConfig.primary_action_color || defaultConfig.primary_action_color;
      submitBtn.style.color = 'white';
      submitBtn.style.fontSize = `${baseSize}px`;
      
      renderCategories();
      renderNewProducts();
      renderFeaturedProducts();
      renderProducts();
      renderCart();
    }

    const element = {
      defaultConfig,
      onConfigChange,
      mapToCapabilities: (config) => ({
        recolorables: [
          {
            get: () => config.background_color || defaultConfig.background_color,
            set: (value) => {
              config.background_color = value;
              window.elementSdk.setConfig({ background_color: value });
            }
          },
          {
            get: () => config.surface_color || defaultConfig.surface_color,
            set: (value) => {
              config.surface_color = value;
              window.elementSdk.setConfig({ surface_color: value });
            }
          },
          {
            get: () => config.text_color || defaultConfig.text_color,
            set: (value) => {
              config.text_color = value;
              window.elementSdk.setConfig({ text_color: value });
            }
          },
          {
            get: () => config.primary_action_color || defaultConfig.primary_action_color,
            set: (value) => {
              config.primary_action_color = value;
              window.elementSdk.setConfig({ primary_action_color: value });
            }
          },
          {
            get: () => config.secondary_action_color || defaultConfig.secondary_action_color,
            set: (value) => {
              config.secondary_action_color = value;
              window.elementSdk.setConfig({ secondary_action_color: value });
            }
          }
        ],
        borderables: [],
        fontEditable: {
          get: () => config.font_family || defaultConfig.font_family,
          set: (value) => {
            config.font_family = value;
            window.elementSdk.setConfig({ font_family: value });
          }
        },
        fontSizeable: {
          get: () => config.font_size || defaultConfig.font_size,
          set: (value) => {
            config.font_size = value;
            window.elementSdk.setConfig({ font_size: value });
          }
        }
      }),
      mapToEditPanelValues: (config) => new Map([
        ["store_name", config.store_name || defaultConfig.store_name],
        ["store_tagline", config.store_tagline || defaultConfig.store_tagline],
        ["hero_title", config.hero_title || defaultConfig.hero_title],
        ["hero_subtitle", config.hero_subtitle || defaultConfig.hero_subtitle],
        ["hero_button_text", config.hero_button_text || defaultConfig.hero_button_text],
        ["categories_title", config.categories_title || defaultConfig.categories_title],
        ["new_products_title", config.new_products_title || defaultConfig.new_products_title],
        ["featured_title", config.featured_title || defaultConfig.featured_title],
        ["checkout_title", config.checkout_title || defaultConfig.checkout_title],
        ["delivery_notice", config.delivery_notice || defaultConfig.delivery_notice],
        ["footer_about", config.footer_about || defaultConfig.footer_about],
        ["copyright_text", config.copyright_text || defaultConfig.copyright_text]
      ])
    };

    if (window.elementSdk) {
      window.elementSdk.init(element);
      config = window.elementSdk.config;
    }

    onConfigChange(config);
  </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9a00907560b32a48',t:'MTc2MzM5NjUxOS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>