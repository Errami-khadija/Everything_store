<!DOCTYPE html>
<html lang="en">
<head>
    <x-store.head />
</head>
<body class="body position-relative">

    <x-store.header />

    <main>
        @yield('content')
    </main>

    <x-store.footer />

    
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

 <script>
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    document.getElementById("openCartBtn").onclick = () => {
      document.getElementById("cartPopup").classList.remove("translate-x-full");
    };
    function closeCart() {
      document.getElementById("cartPopup").classList.add("translate-x-full");
    }
   document.getElementById("checkoutBtn")?.addEventListener("click", () => {
  document.getElementById("checkoutPopup").classList.add("show");
});

function closeCheckout() {
  document.getElementById("checkoutPopup").classList.remove("show");
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
     try {
    const response = await fetch("/cart/checkout", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
            "Accept": "application/json"
        },
        body: JSON.stringify({ name, phone, city, address })
    });

    const data = await response.json();
  if (response.ok) {

            showNotification(data.message || "Order placed successfully!", "success");

            closeCheckout();


            document.getElementById("checkoutForm").reset();

            document.getElementById("cartItems").innerHTML = "";
            document.getElementById("totalItems").innerText = 0;
            document.getElementById("totalPrice").innerText = "$0.00";
        } else {
            showNotification(data.message || "Something went wrong", "error");
        }

    } catch (error) {
        showNotification("Network error. Please try again.", "error");
        console.error(error);
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
         document.getElementById("totalPrice").textContent = "0.00$";
        return;
    }

   Object.values(cart).forEach(item => {
    cartItemsDiv.innerHTML += `
       <div class="d-flex align-items-center gap-3 border-bottom pb-3 ">

    <!-- Product Image -->
    <img 
        src="${item.image ? `/uploads/products/${item.image}` : '/images/no-image.png'}"
        class="rounded"
        width="56"
        height="56"
        style="width: 56px; height: 56px; object-fit: cover; flex-shrink: 0;"
    />

    <!-- Product Info -->
    <div class="flex-grow-1">
        <p class="fw-semibold mb-1">${item.name}</p>

        <!-- Quantity Controls -->
        <div class="d-flex align-items-center gap-2">
            <button 
                onclick="updateQty(${item.id}, 'minus')"
                class="btn btn-xs btn-outline-secondary">
                −
            </button>

            <span class="fw-medium">${item.quantity}</span>

            <button 
                onclick="updateQty(${item.id}, 'plus')"
                class="btn btn-xs btn-outline-secondary">
                +
            </button>
        </div>
    </div>

    <!-- Price -->
    <div class="text-end me-2">
        <strong>$${(item.price * item.quantity).toFixed(2)}</strong>
    </div>

    <!-- Remove Button -->
    <button 
        onclick="removeFromCart(${item.id})"
        class="btn btn-sm btn-outline-danger">
        ✖
    </button>

</div>

    `;
});
    
    document.getElementById("totalItems").textContent = totalItems;
     document.getElementById("totalPrice").innerText = `$${totalPrice.toFixed(2)}`;
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