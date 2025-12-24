        // Default configuration
        const defaultConfig = {
            store_name: "Everything Store",
            welcome_message: "Welcome back, Admin!",
            total_orders_label: "Total Orders",
            pending_orders_label: "Pending Orders", 
            total_products_label: "Total Products",
            revenue_label: "Total Revenue"
        };

        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');

        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            mobileOverlay.classList.toggle('hidden');
        });

        mobileOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            mobileOverlay.classList.add('hidden');
        });


   

       
        // Product Management Functions
        window.showAddProduct = function showAddProduct() {
            document.getElementById('productsListView').classList.add('hidden');
            document.getElementById('addProductView').classList.remove('hidden');
            document.querySelector('#addProductView h3').textContent = 'Add New Product';
            // Clear form
            document.getElementById('productName').value = '';
            document.getElementById('productDescription').value = '';
            document.getElementById('productPrice').value = '';
            document.getElementById('productStock').value = '';
            document.getElementById('productCategory').value = '';
        }

        window.showProductsList = function showProductsList() {
            document.getElementById('addProductView').classList.add('hidden');
            document.getElementById('productsListView').classList.remove('hidden');
        }

          window.showEditProduct = function showEditProduct() {
    document.getElementById('productsListView').classList.add('hidden');
    document.getElementById('addProductView').classList.add('hidden');
    document.getElementById('editProductView').classList.remove('hidden');


    const title = document.querySelector('#editProductView h3');
    if (title) title.textContent = 'Edit Product';
}
     

      window.addSpecification = function () {
   const container = document.getElementById('specifications-wrapper');

    
    const newSpec = document.createElement('div');
    newSpec.className = 'spec-row flex space-x-2';   

    newSpec.innerHTML = `
        <input type="text" name="specification_name[]" placeholder="Specification name"
            class="flex-1 border border-gray-300 rounded-lg px-3 py-2">

        <input type="text" name="specification_value[]" placeholder="Value"
            class="flex-1 border border-gray-300 rounded-lg px-3 py-2">

        <button type="button" onclick="this.closest('.spec-row').remove()" 
            class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg">
            Delete
        </button>
    `;

    container.appendChild(newSpec);  
}






        // Order Management Functions
       window.showOrdersList = function showOrdersList() {
            document.getElementById('orderDetailsView').classList.add('hidden');
            document.getElementById('ordersListView').classList.remove('hidden');
        }

       window.viewOrder = function viewOrder(orderId) {
            document.getElementById('ordersListView').classList.add('hidden');
            document.getElementById('orderDetailsView').classList.remove('hidden');
            document.getElementById('orderDetailId').textContent = orderId;
        }


     window.cancelOrder = function (orderId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, cancel it!'
    }).then((result) => {

        if (!result.isConfirmed) return;

        fetch(`/admin/orders/${orderId}/cancel`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            Swal.fire(
                'Cancelled!',
                data.message,
                'success'
            );

            // Refresh page so status updates everywhere
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        })
        .catch(() => {
            Swal.fire(
                'Error!',
                'Something went wrong.',
                'error'
            );
        });
    });
};



       window.updateOrderStatus = function () {
  const select = document.getElementById('orderStatusUpdate');
  const newStatus = select.value;
  const orderId = select.dataset.orderId;

  const statusColors = {
    pending: 'bg-yellow-100 text-yellow-800',
    processing: 'bg-purple-100 text-purple-800',
    delivered: 'bg-green-100 text-green-800',
    cancelled: 'bg-red-100 text-red-800'
  };

  fetch(`/admin/orders/${orderId}/status`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({ status: newStatus })
  })
  .then(res => {
    if (!res.ok) throw new Error('Request failed');
    return res.json();
  })
  .then(data => {
    const badge = document.getElementById('orderStatusBadge');

    if (!badge) return;

    badge.className = `px-3 py-1 text-sm font-semibold rounded-full ${statusColors[newStatus]}`;
    badge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);

    showToast('Order status updated successfully', 'success');
  })
  .catch(() => {
    showToast('Failed to update order status', 'error');
  });
};


window.printOrder = function (orderId) {
    window.open(`/admin/orders/${orderId}/print`, '_blank');
};

window.downloadInvoice = function (orderId) {
    window.location.href = `/admin/orders/${orderId}/invoice`;
};
       

        // Category Management Functions
       window.showAddCategory = function showAddCategory() {
            document.getElementById('categoriesListView').classList.add('hidden');
            document.getElementById('addCategoryView').classList.remove('hidden');
            document.querySelector('#addCategoryView h3').textContent = 'Add New Category';
           
        }

       window.showCategoriesList = function showCategoriesList() {
            document.getElementById('addCategoryView').classList.add('hidden');
            document.getElementById('categoriesListView').classList.remove('hidden');
        }

   window.showEditCategory = function showEditCategory() {
    document.getElementById('categoriesListView').classList.add('hidden');
    document.getElementById('addCategoryView').classList.add('hidden');
    document.getElementById('editCategoryView').classList.remove('hidden');


    const title = document.querySelector('#editCategoryView h3');
    if (title) title.textContent = 'Edit Category';
}

  document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.delete-category-form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); 

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit the form if confirmed
                }
            });
        });
    });
});

 document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.delete-product-form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); 

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); 
                }
            });
        });
    });
});


       

      window.previewCategoryImage =  function previewCategoryImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('categoryPreview');
                    preview.innerHTML = `
                        <div class="w-32 h-32 mx-auto rounded-lg overflow-hidden">
                            <img src="${e.target.result}" alt="Category preview" class="w-full h-full object-cover">
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            }
        }

        window.previewProductImage = function previewProductImage(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('imagePreview');

    // Clear previous previews
    previewContainer.innerHTML = '';

    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('w-24', 'h-24', 'object-cover', 'rounded', 'border');
            previewContainer.appendChild(img);
        }
        reader.readAsDataURL(file);
    });
}

window.previewEditedImages = function(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('previewEditedImages');

    // Remove old previews (optional)
    previewContainer.innerHTML = '';

    Array.from(files).forEach(file => {
        const reader = new FileReader();

        reader.onload = function(e) {

            // Wrapper, same style as existing ones
            const box = document.createElement('div');
            box.className = "bg-gray-200 h-32 rounded-lg overflow-hidden";

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = "h-full w-full object-cover";

            box.appendChild(img);
            previewContainer.appendChild(box);
        };

        reader.readAsDataURL(file);
    });
}

window.addSpecificationEdit = function addSpecificationEdit() {
    const container = document.getElementById("specifications-wrapper-edit");

    // Create wrapper div
    const row = document.createElement("div");
    row.className = "flex gap-3 mb-3 items-center";

    row.innerHTML = `
        <input 
            type="text" 
            name="specification_name[]" 
            class="w-1/2 border border-gray-300 p-2 rounded" 
            placeholder="Specification name">

        <input 
            type="text" 
            name="specification_value[]" 
            class="w-1/2 border border-gray-300 p-2 rounded" 
            placeholder="Specification value">

        <button type="button"  onclick="this.parentElement.remove()"
                class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg">Delete</button>
    `;

    container.appendChild(row);
}


        // Toast notification system
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            const colors = {
                'success': 'bg-green-500',
                'error': 'bg-red-500',
                'info': 'bg-blue-500',
                'warning': 'bg-yellow-500'
            };
            
            toast.className = `fixed top-4 right-4 ${colors[type]} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
            toast.textContent = message;
            
            document.body.appendChild(toast);
            
            // Slide in
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);
            
            // Slide out and remove
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }

      
        // Customer Management Functions
        let currentCustomerId = null;
        let currentCustomerData = {};

       window.showCustomersList = function showCustomersList() {
            document.getElementById('customerDetailsView').classList.add('hidden');
            document.getElementById('customersListView').classList.remove('hidden');
        };

        document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.toggle-customer-form');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // STOP default submit

            const isBlocked = form.querySelector('button').textContent.includes('Unblock');

            Swal.fire({
                title: isBlocked ? 'Unblock customer?' : 'Block customer?',
                text: isBlocked
                    ? 'This customer will be able to place orders again.'
                    : 'This customer will no longer be able to place orders.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: isBlocked ? '#16a34a' : '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: isBlocked ? 'Yes, unblock' : 'Yes, block'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); 
                }
            });
        });
    });
});



        function saveCustomerNotes() {
            const notes = document.getElementById('customerNotesInput').value;
            if (notes.trim()) {
                // Update the current notes display
                const currentNotesDisplay = document.getElementById('currentCustomerNotes');
                const notesText = currentNotesDisplay.querySelector('p');
                const lastUpdated = currentNotesDisplay.querySelector('.text-xs');
                
                notesText.textContent = notes;
                lastUpdated.textContent = `Last updated: ${new Date().toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: 'short', 
                    day: 'numeric' 
                })}`;
                
                showToast('Customer notes saved successfully!', 'success');
            } else {
                showToast('Please enter some notes before saving', 'warning');
            }
        }

        function saveDeliveryNotes() {
            const notes = document.getElementById('deliveryNotesInput').value;
            if (notes.trim()) {
                // Update the current notes display
                const currentNotesDisplay = document.getElementById('currentDeliveryNotes');
                const notesText = currentNotesDisplay.querySelector('p');
                const lastUpdated = currentNotesDisplay.querySelector('.text-xs');
                
                notesText.textContent = notes;
                lastUpdated.textContent = `Last updated: ${new Date().toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: 'short', 
                    day: 'numeric' 
                })}`;
                
                showToast('Delivery notes saved successfully!', 'success');
            } else {
                showToast('Please enter some notes before saving', 'warning');
            }
        }

        // Notification System Functions
        function toggleNotifications() {
            const dropdown = document.getElementById('notificationsDropdown');
            dropdown.classList.toggle('hidden');
            
            // Close dropdown when clicking outside
            if (!dropdown.classList.contains('hidden')) {
                document.addEventListener('click', closeNotificationsOnOutsideClick);
            } else {
                document.removeEventListener('click', closeNotificationsOnOutsideClick);
            }
        }

        function closeNotificationsOnOutsideClick(event) {
            const dropdown = document.getElementById('notificationsDropdown');
            const button = document.getElementById('notificationBtn');
            
            if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.add('hidden');
                document.removeEventListener('click', closeNotificationsOnOutsideClick);
            }
        }

        function markAllAsRead() {
            // Mark all notifications as read
            const unreadNotifications = document.querySelectorAll('.notification-item:not(.opacity-60)');
            unreadNotifications.forEach(notification => {
                notification.classList.add('opacity-60');
                const dot = notification.querySelector('.bg-red-500, .bg-orange-500, .bg-green-500');
                if (dot) {
                    dot.className = 'w-2 h-2 bg-gray-300 rounded-full mt-2 shrink-0';
                }
                const title = notification.querySelector('.text-gray-900');
                if (title) {
                    title.className = 'text-sm font-medium text-gray-700';
                }
                const description = notification.querySelector('.text-gray-600');
                if (description) {
                    description.className = 'text-sm text-gray-500';
                }
                const time = notification.querySelector('.text-gray-500');
                if (time) {
                    time.className = 'text-xs text-gray-400 mt-1';
                }
            });
            
            // Update notification badge
            const badge = document.getElementById('notificationBadge');
            badge.textContent = '0';
            badge.classList.add('hidden');
            
            showToast('All notifications marked as read!', 'success');
        }

        function handleNotificationClick(notificationType) {
            // Handle different notification types
            switch(notificationType) {
                case 'order-pending':
                    showSection('orders');
                    viewOrder('ORD-001');
                    showToast('Navigated to pending order', 'info');
                    break;
                case 'stock-low':
                    showSection('products');
                    showToast('Showing products with low stock', 'info');
                    break;
                case 'customer-new':
                    showSection('customers');
                    viewCustomer('mike');
                    showToast('Showing new customer details', 'info');
                    break;
                case 'order-delivered':
                    showSection('orders');
                    showToast('Showing delivered orders', 'info');
                    break;
                case 'payment-received':
                    showSection('orders');
                    showToast('Showing payment information', 'info');
                    break;
                default:
                    showToast('Notification clicked', 'info');
            }
            
            // Mark this notification as read
            const clickedNotification = event.currentTarget;
            if (!clickedNotification.classList.contains('opacity-60')) {
                clickedNotification.classList.add('opacity-60');
                const dot = clickedNotification.querySelector('.bg-red-500, .bg-orange-500, .bg-green-500');
                if (dot) {
                    dot.className = 'w-2 h-2 bg-gray-300 rounded-full mt-2 shrink-0';
                }
                
                // Update notification count
                const badge = document.getElementById('notificationBadge');
                const currentCount = parseInt(badge.textContent);
                const newCount = Math.max(0, currentCount - 1);
                badge.textContent = newCount;
                
                if (newCount === 0) {
                    badge.classList.add('hidden');
                }
            }
            
            // Close dropdown
            document.getElementById('notificationsDropdown').classList.add('hidden');
        }

        function viewAllNotifications() {
            showToast('Opening full notifications panel...', 'info');
            document.getElementById('notificationsDropdown').classList.add('hidden');
            
            // You could implement a full notifications page here
            setTimeout(() => {
                showToast('Full notifications feature coming soon!', 'info');
            }, 1000);
        }

        // Add notification when new orders come in (simulation)
        function simulateNewNotification() {
            const badge = document.getElementById('notificationBadge');
            const currentCount = parseInt(badge.textContent) || 0;
            const newCount = currentCount + 1;
            
            badge.textContent = newCount;
            badge.classList.remove('hidden');
            
            // Add a flash effect
            badge.classList.add('animate-pulse');
            setTimeout(() => {
                badge.classList.remove('animate-pulse');
            }, 2000);
            
            showToast('New notification received!', 'info');
        }

        // Simulate receiving notifications every 30 seconds (for demo purposes)
        setInterval(() => {
            if (Math.random() > 0.7) { // 30% chance every 30 seconds
                simulateNewNotification();
            }
        }, 30000);


(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'99f9c6ea14dee280',t:'MTc2MzMyNTM0OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();