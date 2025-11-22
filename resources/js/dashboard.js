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

        // Navigation functionality
        window.showSection = function showSection(sectionName) {
            // Hide all sections
            const sections = ['dashboardSection', 'ordersSection', 'productsSection', 'categoriesSection', 'customersSection', 'analyticsSection', 'settingsSection'];
            sections.forEach(section => {
                document.getElementById(section).classList.add('hidden');
            });

            // Show selected section
            document.getElementById(sectionName + 'Section').classList.remove('hidden');

            // Update page title
            const titles = {
                'dashboard': 'Dashboard',
                'orders': 'Orders Management',
                'products': 'Products Management',
                'categories': 'Categories Management',
                'customers': 'Customers Management',
                'analytics': 'Analytics & Reports',
                'settings': 'Store Settings'
            };
            document.getElementById('pageTitle').textContent = titles[sectionName];

            // Update active nav item
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active', 'bg-blue-50', 'text-blue-600');
            });
            event.target.classList.add('active', 'bg-blue-50', 'text-blue-600');

            // Reset to list views when switching sections
            if (sectionName === 'orders') {
                showOrdersList();
            } else if (sectionName === 'products') {
                showProductsList();
            } else if (sectionName === 'categories') {
                showCategoriesList();
            } else if (sectionName === 'customers') {
                showCustomersList();
            }

            // Close mobile menu
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
                mobileOverlay.classList.add('hidden');
            }
        }

        // Product Management Functions
        function showAddProduct() {
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

        function showProductsList() {
            document.getElementById('addProductView').classList.add('hidden');
            document.getElementById('productsListView').classList.remove('hidden');
        }

        function editProduct(productId) {
            showAddProduct();
            document.querySelector('#addProductView h3').textContent = 'Edit Product';
            
            // Simulate loading product data
            const productData = {
                'smartphone': { name: 'Smartphone XYZ', price: '299.99', stock: '25', category: 'electronics' },
                'tshirt': { name: 'Cotton T-Shirt', price: '24.99', stock: '150', category: 'clothing' },
                'book': { name: 'Programming Book', price: '39.99', stock: '8', category: 'books' }
            };
            
            const product = productData[productId];
            if (product) {
                document.getElementById('productName').value = product.name;
                document.getElementById('productPrice').value = product.price;
                document.getElementById('productStock').value = product.stock;
                document.getElementById('productCategory').value = product.category;
            }
        }

        function deleteProduct(productId) {
            // Create inline confirmation
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = 'Confirm Delete?';
            button.classList.remove('bg-red-600', 'hover:bg-red-700');
            button.classList.add('bg-red-800');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-red-800');
                button.classList.add('bg-red-600', 'hover:bg-red-700');
            }, 3000);
            
            // Simulate delete after confirmation
            button.onclick = () => {
                showToast('Product deleted successfully!', 'success');
                button.closest('.border').style.opacity = '0.5';
            };
        }

        function saveProduct(event) {
            event.preventDefault();
            
            const name = document.getElementById('productName').value;
            const price = document.getElementById('productPrice').value;
            const stock = document.getElementById('productStock').value;
            const category = document.getElementById('productCategory').value;
            
            if (!name || !price || !stock || !category) {
                showToast('Please fill in all required fields', 'error');
                return;
            }
            
            // Simulate saving
            showToast('Product saved successfully!', 'success');
            setTimeout(() => {
                showProductsList();
            }, 1000);
        }

        function addSpecification() {
            const container = document.querySelector('.space-y-3');
            const newSpec = document.createElement('div');
            newSpec.className = 'flex space-x-2';
            newSpec.innerHTML = `
                <input type="text" placeholder="Specification name" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <input type="text" placeholder="Value" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            container.insertBefore(newSpec, container.lastElementChild);
        }

        // Order Management Functions
        function showOrdersList() {
            document.getElementById('orderDetailsView').classList.add('hidden');
            document.getElementById('ordersListView').classList.remove('hidden');
        }

        function viewOrder(orderId) {
            document.getElementById('ordersListView').classList.add('hidden');
            document.getElementById('orderDetailsView').classList.remove('hidden');
            document.getElementById('orderDetailId').textContent = orderId;
        }

        function processOrder(orderId) {
            const statusSelect = document.getElementById('orderStatusUpdate');
            const currentStatus = statusSelect.value;
            
            // Determine next status
            const statusFlow = {
                'pending': 'confirmed',
                'confirmed': 'processing',
                'processing': 'shipped',
                'shipped': 'delivered'
            };
            
            const nextStatus = statusFlow[currentStatus] || 'processing';
            statusSelect.value = nextStatus;
            
            updateOrderStatus();
        }

        function cancelOrder(orderId) {
            // Create inline confirmation
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = 'Confirm Cancel?';
            button.classList.add('bg-red-800');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-red-800');
            }, 3000);
            
            // Simulate cancel after confirmation
            button.onclick = () => {
                showToast('Order cancelled successfully!', 'success');
                // Update status in UI
                const statusBadge = button.closest('tr').querySelector('.rounded-full');
                statusBadge.className = 'px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800';
                statusBadge.textContent = 'Cancelled';
            };
        }

        function updateOrderStatus() {
            const newStatus = document.getElementById('orderStatusUpdate').value;
            const statusColors = {
                'pending': 'bg-yellow-100 text-yellow-800',
                'confirmed': 'bg-blue-100 text-blue-800',
                'processing': 'bg-purple-100 text-purple-800',
                'shipped': 'bg-indigo-100 text-indigo-800',
                'delivered': 'bg-green-100 text-green-800',
                'cancelled': 'bg-red-100 text-red-800'
            };
            
            // Update current status display
            const currentStatusBadge = document.querySelector('#orderDetailsView .rounded-full');
            currentStatusBadge.className = `px-3 py-1 text-sm font-semibold rounded-full ${statusColors[newStatus]}`;
            currentStatusBadge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
            
            showToast(`Order status updated to ${newStatus}!`, 'success');
        }

        function printOrder() {
            showToast('Printing order...', 'info');
            // Simulate print functionality
            setTimeout(() => {
                showToast('Order printed successfully!', 'success');
            }, 2000);
        }

        function sendSMS() {
            showToast('Sending SMS update to customer...', 'info');
            // Simulate SMS functionality
            setTimeout(() => {
                showToast('SMS sent successfully!', 'success');
            }, 2000);
        }

        function refundOrder() {
            // Create inline confirmation
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = '🔄 Confirm Refund?';
            button.classList.add('bg-red-800');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-red-800');
            }, 3000);
            
            // Simulate refund after confirmation
            button.onclick = () => {
                showToast('Refund processed successfully!', 'success');
            };
        }

        // Category Management Functions
       window.showAddCategory = function showAddCategory() {
            document.getElementById('categoriesListView').classList.add('hidden');
            document.getElementById('addCategoryView').classList.remove('hidden');
            document.querySelector('#addCategoryView h3').textContent = 'Add New Category';
           
        }

        function showCategoriesList() {
            document.getElementById('addCategoryView').classList.add('hidden');
            document.getElementById('categoriesListView').classList.remove('hidden');
        }

      
  document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.delete-category-form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // stop the form from submitting immediately

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

        // Initialize Elements SDK
        async function onConfigChange(config) {
            // Update store name
            const storeName = config.store_name || defaultConfig.store_name;
            document.getElementById('storeName').textContent = storeName;

            // Update welcome message
            const welcomeMessage = config.welcome_message || defaultConfig.welcome_message;
            document.getElementById('welcomeMessage').textContent = welcomeMessage;

            // Update dashboard labels
            const totalOrdersLabel = config.total_orders_label || defaultConfig.total_orders_label;
            document.getElementById('totalOrdersLabel').textContent = totalOrdersLabel;

            const pendingOrdersLabel = config.pending_orders_label || defaultConfig.pending_orders_label;
            document.getElementById('pendingOrdersLabel').textContent = pendingOrdersLabel;

            const totalProductsLabel = config.total_products_label || defaultConfig.total_products_label;
            document.getElementById('totalProductsLabel').textContent = totalProductsLabel;

            const revenueLabel = config.revenue_label || defaultConfig.revenue_label;
            document.getElementById('revenueLabel').textContent = revenueLabel;
        }

        // Initialize the Elements SDK
        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig: defaultConfig,
                onConfigChange: onConfigChange,
                mapToCapabilities: (config) => ({
                    recolorables: [],
                    borderables: [],
                    fontEditable: undefined,
                    fontSizeable: undefined
                }),
                mapToEditPanelValues: (config) => new Map([
                    ["store_name", config.store_name || defaultConfig.store_name],
                    ["welcome_message", config.welcome_message || defaultConfig.welcome_message],
                    ["total_orders_label", config.total_orders_label || defaultConfig.total_orders_label],
                    ["pending_orders_label", config.pending_orders_label || defaultConfig.pending_orders_label],
                    ["total_products_label", config.total_products_label || defaultConfig.total_products_label],
                    ["revenue_label", config.revenue_label || defaultConfig.revenue_label]
                ])
            });
        }

        // Customer Management Functions
        let currentCustomerId = null;
        let currentCustomerData = {};

        function showCustomersList() {
            document.getElementById('customerDetailsView').classList.add('hidden');
            document.getElementById('customersListView').classList.remove('hidden');
        }

        function viewCustomer(customerId) {
            currentCustomerId = customerId;
            
            // Sample customer data
            const customerData = {
                'john': {
                    id: 'CUST-001',
                    name: 'John Doe',
                    type: 'Premium Customer',
                    email: 'john@example.com',
                    phone: '+1 (555) 123-4567',
                    joinDate: 'December 1, 2023',
                    lastOrder: 'January 15, 2024',
                    totalOrders: '5',
                    totalSpent: '$567.50',
                    avgOrder: '$113.50',
                    pendingOrders: '1',
                    completedOrders: '4',
                    cancelledOrders: '0',
                    status: 'active',
                    avatar: 'JD',
                    avatarColor: 'bg-blue-600'
                },
                'jane': {
                    id: 'CUST-002',
                    name: 'Jane Smith',
                    type: 'Regular Customer',
                    email: 'jane@example.com',
                    phone: '+1 (555) 987-6543',
                    joinDate: 'January 5, 2024',
                    lastOrder: 'January 12, 2024',
                    totalOrders: '3',
                    totalSpent: '$234.75',
                    avgOrder: '$78.25',
                    pendingOrders: '0',
                    completedOrders: '3',
                    cancelledOrders: '0',
                    status: 'active',
                    avatar: 'JS',
                    avatarColor: 'bg-green-600'
                },
                'mike': {
                    id: 'CUST-003',
                    name: 'Mike Johnson',
                    type: 'New Customer',
                    email: 'mike@example.com',
                    phone: '+1 (555) 456-7890',
                    joinDate: 'January 18, 2024',
                    lastOrder: 'January 18, 2024',
                    totalOrders: '1',
                    totalSpent: '$89.99',
                    avgOrder: '$89.99',
                    pendingOrders: '0',
                    completedOrders: '1',
                    cancelledOrders: '0',
                    status: 'active',
                    avatar: 'MJ',
                    avatarColor: 'bg-purple-600'
                },
                'sarah': {
                    id: 'CUST-004',
                    name: 'Sarah Wilson',
                    type: 'Blocked Customer',
                    email: 'sarah@example.com',
                    phone: '+1 (555) 321-0987',
                    joinDate: 'November 15, 2023',
                    lastOrder: 'December 20, 2023',
                    totalOrders: '2',
                    totalSpent: '$156.25',
                    avgOrder: '$78.13',
                    pendingOrders: '0',
                    completedOrders: '2',
                    cancelledOrders: '0',
                    status: 'blocked',
                    avatar: 'SW',
                    avatarColor: 'bg-gray-500'
                }
            };

            const customer = customerData[customerId];
            if (customer) {
                currentCustomerData = customer;
                
                // Update customer details view
                document.getElementById('customerDetailId').textContent = customer.id;
                document.getElementById('customerName').textContent = customer.name;
                document.getElementById('customerType').textContent = customer.type;
                document.getElementById('customerEmail').textContent = customer.email;
                document.getElementById('customerPhone').textContent = customer.phone;
                document.getElementById('customerJoinDate').textContent = customer.joinDate;
                document.getElementById('customerLastOrder').textContent = customer.lastOrder;
                document.getElementById('customerTotalOrders').textContent = customer.totalOrders;
                document.getElementById('customerTotalSpent').textContent = customer.totalSpent;
                document.getElementById('customerAvgOrder').textContent = customer.avgOrder;
                document.getElementById('customerPendingOrders').textContent = customer.pendingOrders;
                document.getElementById('customerCompletedOrders').textContent = customer.completedOrders;
                document.getElementById('customerCancelledOrders').textContent = customer.cancelledOrders;
                
                // Update avatar
                const avatar = document.getElementById('customerAvatar');
                avatar.textContent = customer.avatar;
                avatar.className = `w-16 h-16 ${customer.avatarColor} rounded-full flex items-center justify-center text-white text-2xl font-semibold mr-4`;
                
                // Update status badge and block/unblock button
                const statusBadge = document.getElementById('customerStatusBadge');
                const blockBtn = document.getElementById('blockUnblockBtn');
                
                if (customer.status === 'blocked') {
                    statusBadge.className = 'px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800';
                    statusBadge.textContent = 'Blocked';
                    blockBtn.textContent = '✅ Unblock Customer';
                    blockBtn.className = 'w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors';
                } else {
                    statusBadge.className = 'px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800';
                    statusBadge.textContent = 'Active';
                    blockBtn.textContent = '🚫 Block Customer';
                    blockBtn.className = 'w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors';
                }
                
                // Show customer details view
                document.getElementById('customersListView').classList.add('hidden');
                document.getElementById('customerDetailsView').classList.remove('hidden');
            }
        }

        function blockCustomer(customerId) {
            // Create inline confirmation
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = 'Confirm Block?';
            button.classList.add('bg-red-800');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-red-800');
            }, 3000);
            
            // Simulate block after confirmation
            button.onclick = () => {
                const customerRow = document.getElementById(`customer-${customerId}`);
                const statusBadge = customerRow.querySelector('.rounded-full');
                const actionButton = customerRow.querySelector('button:last-child');
                
                // Update status
                statusBadge.className = 'px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800';
                statusBadge.textContent = 'Blocked';
                
                // Update action button
                actionButton.textContent = 'Unblock';
                actionButton.className = 'text-green-600 hover:text-green-900';
                actionButton.onclick = () => unblockCustomer(customerId);
                
                // Add opacity to row
                customerRow.classList.add('opacity-60');
                
                // Update customer type
                const customerType = customerRow.querySelector('.text-gray-500');
                customerType.textContent = 'Blocked Customer';
                
                showToast(`Customer ${customerId} has been blocked successfully!`, 'success');
            };
        }

        function unblockCustomer(customerId) {
            // Create inline confirmation
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = 'Confirm Unblock?';
            button.classList.add('bg-green-800');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-green-800');
            }, 3000);
            
            // Simulate unblock after confirmation
            button.onclick = () => {
                const customerRow = document.getElementById(`customer-${customerId}`);
                const statusBadge = customerRow.querySelector('.rounded-full');
                const actionButton = customerRow.querySelector('button:last-child');
                
                // Update status
                statusBadge.className = 'px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800';
                statusBadge.textContent = 'Active';
                
                // Update action button
                actionButton.textContent = 'Block';
                actionButton.className = 'text-red-600 hover:text-red-900';
                actionButton.onclick = () => blockCustomer(customerId);
                
                // Remove opacity from row
                customerRow.classList.remove('opacity-60');
                
                // Update customer type based on customer
                const customerType = customerRow.querySelector('.text-gray-500');
                if (customerId === 'sarah') {
                    customerType.textContent = 'Regular Customer';
                }
                
                showToast(`Customer ${customerId} has been unblocked successfully!`, 'success');
            };
        }

        function toggleCustomerBlock() {
            if (currentCustomerData.status === 'blocked') {
                unblockCustomerFromDetails();
            } else {
                blockCustomerFromDetails();
            }
        }

        function blockCustomerFromDetails() {
            // Create inline confirmation
            const button = document.getElementById('blockUnblockBtn');
            const originalText = button.textContent;
            button.textContent = '🔄 Confirm Block?';
            button.classList.add('bg-red-800');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-red-800');
            }, 3000);
            
            // Simulate block after confirmation
            button.onclick = () => {
                // Update current customer data
                currentCustomerData.status = 'blocked';
                currentCustomerData.type = 'Blocked Customer';
                
                // Update UI
                const statusBadge = document.getElementById('customerStatusBadge');
                statusBadge.className = 'px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800';
                statusBadge.textContent = 'Blocked';
                
                document.getElementById('customerType').textContent = 'Blocked Customer';
                
                button.textContent = '✅ Unblock Customer';
                button.className = 'w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors';
                button.onclick = toggleCustomerBlock;
                
                // Update avatar color
                const avatar = document.getElementById('customerAvatar');
                avatar.className = 'w-16 h-16 bg-gray-500 rounded-full flex items-center justify-center text-white text-2xl font-semibold mr-4';
                
                showToast(`Customer has been blocked successfully!`, 'success');
            };
        }

        function unblockCustomerFromDetails() {
            // Create inline confirmation
            const button = document.getElementById('blockUnblockBtn');
            const originalText = button.textContent;
            button.textContent = '🔄 Confirm Unblock?';
            button.classList.add('bg-green-800');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-green-800');
            }, 3000);
            
            // Simulate unblock after confirmation
            button.onclick = () => {
                // Update current customer data
                currentCustomerData.status = 'active';
                currentCustomerData.type = 'Regular Customer';
                
                // Update UI
                const statusBadge = document.getElementById('customerStatusBadge');
                statusBadge.className = 'px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800';
                statusBadge.textContent = 'Active';
                
                document.getElementById('customerType').textContent = 'Regular Customer';
                
                button.textContent = '🚫 Block Customer';
                button.className = 'w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors';
                button.onclick = toggleCustomerBlock;
                
                // Update avatar color (restore original color based on customer)
                const avatar = document.getElementById('customerAvatar');
                if (currentCustomerId === 'sarah') {
                    avatar.className = 'w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center text-white text-2xl font-semibold mr-4';
                }
                
                showToast(`Customer has been unblocked successfully!`, 'success');
            };
        }

        function sendCustomerEmail() {
            showToast('Sending email to customer...', 'info');
            setTimeout(() => {
                showToast('Email sent successfully!', 'success');
            }, 2000);
        }

        function sendCustomerSMS() {
            showToast('Sending SMS to customer...', 'info');
            setTimeout(() => {
                showToast('SMS sent successfully!', 'success');
            }, 2000);
        }

        function viewCustomerOrders() {
            showToast('Redirecting to customer orders...', 'info');
            setTimeout(() => {
                showSection('orders');
                showToast('Showing orders for this customer', 'success');
            }, 1000);
        }

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

        // Initialize with default config
        onConfigChange(defaultConfig);

(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'99f9c6ea14dee280',t:'MTc2MzMyNTM0OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();