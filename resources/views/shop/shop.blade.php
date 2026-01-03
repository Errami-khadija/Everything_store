<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Everything Store</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-white shadow p-4 flex justify-between items-center sticky top-0 z-50">
    <h1 class="text-2xl font-bold text-gray-800">Everything Store</h1>

    <div class="hidden md:flex space-x-6 items-center">
      <a href="#home" class="hover:text-blue-600">Home</a>
      <a href="#categories" class="hover:text-blue-600">Categories</a>
      <a href="#featured" class="hover:text-blue-600">Featured</a>
      <a href="#products" class="hover:text-blue-600">All Products</a>
      <a href="#about" class="hover:text-blue-600">About</a>
      <a href="#contact" class="hover:text-blue-600">Contact</a>
      <form  method="GET">
        <input type="text" name="query" placeholder="Search products..."
          class="border rounded px-2 py-1" />
      </form>
    </div>

    <button id="openCartBtn"
      class="relative bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition md:ml-4">
      Cart
      <span id="cartCount"
        class="absolute -top-2 -right-2 bg-red-500 text-xs text-white px-2 py-0.5 rounded-full">0</span>
    </button>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="bg-blue-600 text-white py-20 px-4 text-center">
    <h2 class="text-4xl font-bold mb-4">Welcome to Everything Store</h2>
    <p class="text-lg mb-6">Find everything you need at the best prices. Fast delivery, COD available!</p>
    <a href="#products" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition">
      Shop Now
    </a>
  </section>

  <!-- Categories Section -->
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
                            <button class="add-to-cart-btn px-4 py-2 rounded-lg font-medium transition-colors"
                             data-id="{{ $product->id }}">
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

<!-- Footer -->
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

 <!-- Cart Popup Sidebar -->
<div id="cartPopup"
  class="fixed top-0 right-0 w-80 h-full bg-white shadow-xl transform translate-x-full transition-all duration-300 z-50 flex flex-col">

  <!-- Header -->
  <div class="p-4 border-b flex justify-between items-center">
    <h2 class="text-xl font-semibold">Your Cart</h2>
    <button onclick="closeCart()" class="text-gray-600 hover:text-black">✖</button>
  </div>

  <!-- Cart Items -->
  <div id="cartItems" class="p-4 space-y-4 flex-1 overflow-y-auto">

    <!-- JS will insert cart items here -->
    @if(!session()->has('cart') || count(session('cart')) == 0)
      <p class="text-gray-600 text-center" id="emptyCartMsg">Your cart is empty.</p>
    @endif

  </div>
 <div class="mt-4 border-t pt-3">
    <p class="text-lg font-semibold">Total Items: <span id="totalItems">0</span></p>
    <p class="text-lg font-semibold">Total Price: $<span id="totalPrice">0.00</span></p>
</div>

  <!-- Footer -->
  <div class="p-4 border-t">
    <a href="#checkout" id="checkoutBtn"
      class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded inline-block text-center">
      Checkout (COD)
    </a>
  </div>

</div>


  <!-- Checkout Form Popup -->
  <div id="checkoutPopup"
    class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center p-4">
    <div class="bg-white p-6 rounded-xl w-full max-w-md">
      <h2 class="text-xl font-semibold mb-4">Checkout (Cash on Delivery)</h2>
      <form id="checkoutForm" class="space-y-3">
        @csrf
        <input type="text" name="name" id="customerName" placeholder="Full Name" required class="w-full border p-2 rounded" />
        <input type="text" name="phone" id="customerPhone" placeholder="Phone Number" required class="w-full border p-2 rounded" />
        <input type="text" name="city" id="customerCity" placeholder="City" required class="w-full border p-2 rounded" />
        <textarea name="address" id="customerAddress" placeholder="Address" required class="w-full border p-2 rounded"></textarea>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">Place Order</button>
        <button type="button" onclick="closeCheckout()" class="w-full bg-gray-300 hover:bg-gray-400 py-2 rounded">Cancel</button>
      </form>
    </div>
</div>
   



<script>
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    document.getElementById("openCartBtn").onclick = () => {
      document.getElementById("cartPopup").classList.remove("translate-x-full");
    };
    function closeCart() {
      document.getElementById("cartPopup").classList.add("translate-x-full");
    }
    document.getElementById("checkoutBtn")?.addEventListener("click", () => {
      document.getElementById("checkoutPopup").classList.remove("hidden");
    });
    function closeCheckout() {
      document.getElementById("checkoutPopup").classList.add("hidden");
    }

 document.addEventListener("DOMContentLoaded", async () => {
    try {
        const response = await fetch("/cart/json");
        const data = await response.json();

        updateCartPopup(data.cart, data.totalItems, data.totalPrice);
        updateCartCount(data.totalItems);
    } catch (error) {
        console.error("Failed to load cart:", error);
    }
});



    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
    btn.addEventListener('click', async () => {

        const productId = btn.getAttribute('data-id');

        const response = await fetch("/cart/add", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ id: productId })
        });

        const data = await response.json();

        // Update cart count in navbar
        document.getElementById('cartCount').innerText = data.totalItems;
        // Update cart popup
        updateCartPopup(data.cart,data.totalItems,data.totalPrice);
        updateCartCount(data.totalItems);
        
    });
});

document.getElementById("checkoutForm")?.addEventListener("submit", async (e) => {
    e.preventDefault();

    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const name = document.getElementById("customerName").value;
    const phone = document.getElementById("customerPhone").value;
    const city = document.getElementById("customerCity").value;
    const address = document.getElementById("customerAddress").value;

    const response = await fetch("/cart/checkout", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
            "Accept": "application/json"
        },
        body: JSON.stringify({ name, phone, city, address })
    });

    const text = await response.text();
    try {
        const data = JSON.parse(text);
        alert(data.message);
    } catch (err) {
        console.error("Invalid JSON:", text);
        alert("An error occurred. See console for details.");
    }

    closeCheckout();
    updateCartPopup({}, 0, 0);
    updateCartCount(0);
    document.getElementById("checkoutForm").reset();
});



function updateCartPopup(cart, totalItems, totalPrice) {
    const cartItemsDiv = document.getElementById("cartItems");

    cartItemsDiv.innerHTML = "";

    if (!cart || Object.keys(cart).length === 0) {
        cartItemsDiv.innerHTML = `<p class="text-gray-600 text-center">Your cart is empty.</p>`;
        document.getElementById("totalItems").textContent = 0;
         document.getElementById("totalPrice").textContent = "0.00";
        return;
    }

   Object.values(cart).forEach(item => {
    cartItemsDiv.innerHTML += `
        <div class="flex gap-3 items-center border-b pb-3">

            <img 
                src="${item.image ? `/uploads/products/${item.image}` : '/images/no-image.png'}"
                class="w-14 h-14 object-cover rounded"
            />

            <div class="flex-1">
                <p class="font-semibold">${item.name}</p>

                <div class="flex items-center gap-2 mt-1">
                    <button 
                        onclick="updateQty(${item.id}, 'minus')"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">−</button>

                    <span class="px-3">${item.quantity}</span>

                    <button 
                        onclick="updateQty(${item.id}, 'plus')"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                </div>

                <p class="text-sm font-medium mt-1">
                    $${(item.price * item.quantity).toFixed(2)}
                </p>
            </div>

            <button 
                onclick="removeFromCart(${item.id})"
                class="text-red-500 hover:text-red-700 text-sm">
                ✖
            </button>

        </div>
    `;
});
    
    document.getElementById("totalItems").textContent = totalItems;
     document.getElementById("totalPrice").textContent = totalPrice.toFixed(2);
}

function removeFromCart(productId) {
    fetch("/cart/remove", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ id: productId })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("cartCount").textContent = data.totalItems;
        updateCartPopup(data.cart, data.totalItems, data.totalPrice);
    });
}



function updateCartCount(totalItems) {
    document.getElementById("cartCount").textContent = totalItems;
}

function updateQty(productId, action) {
    fetch("/cart/update", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            id: productId,
            action: action
        })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("cartCount").textContent = data.totalItems;
        updateCartPopup(data.cart, data.totalItems, data.totalPrice);
    });
}


  </script>
</body>
</html>
