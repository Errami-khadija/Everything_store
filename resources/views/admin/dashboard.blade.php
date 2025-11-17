<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Everything Store - Admin Panel</title>
  <script src="/_sdk/element_sdk.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
        body {
            box-sizing: border-box;
        }
        
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .hover-scale {
            transition: transform 0.2s ease;
        }
        
        .hover-scale:hover {
            transform: scale(1.02);
        }
        
        .chart-placeholder {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
    </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
 <body class="bg-gray-50 font-sans"><!-- Mobile Menu Button --> <button id="mobileMenuBtn" class="lg:hidden fixed top-4 left-4 z-50 bg-blue-600 text-white p-2 rounded-lg shadow-lg">
   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
   </svg></button> <!-- Sidebar -->
  <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 sidebar-transition z-40">
   <div class="p-6 border-b border-gray-200">
    <h1 id="storeName" class="text-2xl font-bold text-gray-800">Everything Store</h1>
    <p class="text-sm text-gray-600 mt-1">Admin Panel</p>
   </div>
   <nav class="mt-6"><a href="#" onclick="showSection('dashboard')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors active">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
     </svg> Dashboard </a> <a href="#" onclick="showSection('orders')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
     </svg> Orders </a> <a href="#" onclick="showSection('products')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
     </svg> Products </a> <a href="#" onclick="showSection('categories')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
     </svg> Categories </a> <a href="#" onclick="showSection('customers')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
     </svg> Customers </a> <a href="#" onclick="showSection('analytics')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
     </svg> Analytics </a> <a href="#" onclick="showSection('settings')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
     </svg> Settings </a>
   </nav>
  </aside><!-- Main Content -->
  <main class="lg:ml-64 min-h-full"><!-- Header -->
   <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
    <div class="flex items-center justify-between">
     <div>
      <h2 id="pageTitle" class="text-2xl font-semibold text-gray-800">Dashboard</h2>
      <p id="welcomeMessage" class="text-gray-600 mt-1">Welcome back, Admin!</p>
     </div>
     <div class="flex items-center space-x-4">
      <div class="relative"><button id="notificationBtn" onclick="toggleNotifications()" class="relative p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4 19h6v-2H4v2zM4 15h8v-2H4v2zM4 11h10V9H4v2z" />
        </svg><span id="notificationBadge" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span> </button> <!-- Notifications Dropdown -->
       <div id="notificationsDropdown" class="absolute right-0 top-full mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-200 z-50 hidden">
        <div class="p-4 border-b border-gray-200">
         <div class="flex items-center justify-between">
          <h3 class="text-lg font-semibold text-gray-800">Notifications</h3><button onclick="markAllAsRead()" class="text-sm text-blue-600 hover:text-blue-800">Mark all as read</button>
         </div>
        </div>
        <div class="max-h-96 overflow-y-auto">
         <div class="notification-item p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer" onclick="handleNotificationClick('order-pending')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-red-500 rounded-full mt-2 flex-shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-900">New Order Received</p>
            <p class="text-sm text-gray-600">Order #ORD-001 from John Doe needs processing</p>
            <p class="text-xs text-gray-500 mt-1">2 minutes ago</p>
           </div>
          </div>
         </div>
         <div class="notification-item p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer" onclick="handleNotificationClick('stock-low')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-orange-500 rounded-full mt-2 flex-shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-900">Low Stock Alert</p>
            <p class="text-sm text-gray-600">Programming Book has only 3 items left in stock</p>
            <p class="text-xs text-gray-500 mt-1">15 minutes ago</p>
           </div>
          </div>
         </div>
         <div class="notification-item p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer" onclick="handleNotificationClick('customer-new')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-900">New Customer Registration</p>
            <p class="text-sm text-gray-600">Mike Johnson just created an account</p>
            <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
           </div>
          </div>
         </div>
         <div class="notification-item p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer opacity-60" onclick="handleNotificationClick('order-delivered')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-gray-300 rounded-full mt-2 flex-shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-700">Order Delivered</p>
            <p class="text-sm text-gray-500">Order #ORD-002 has been successfully delivered</p>
            <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
           </div>
          </div>
         </div>
         <div class="notification-item p-4 hover:bg-gray-50 cursor-pointer opacity-60" onclick="handleNotificationClick('payment-received')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-gray-300 rounded-full mt-2 flex-shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-700">Payment Received</p>
            <p class="text-sm text-gray-500">COD payment of $89.50 received for Order #ORD-002</p>
            <p class="text-xs text-gray-400 mt-1">4 hours ago</p>
           </div>
          </div>
         </div>
        </div>
        <div class="p-4 border-t border-gray-200"><button onclick="viewAllNotifications()" class="w-full text-center text-sm text-blue-600 hover:text-blue-800 font-medium"> View All Notifications </button>
        </div>
       </div>
      </div>
      <div class="flex items-center space-x-3">
       <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
        A
       </div><span class="text-gray-700 font-medium">Admin</span>
      </div>
     </div>
    </div>
   </header><!-- Dashboard Section -->
   <section id="dashboardSection" class="p-6 fade-in"><!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
     <div class="bg-white rounded-xl shadow-sm p-6 hover-scale">
      <div class="flex items-center justify-between">
       <div>
        <p id="totalOrdersLabel" class="text-gray-600 text-sm font-medium">Total Orders</p>
        <p class="text-3xl font-bold text-gray-800 mt-2">1,247</p>
        <p class="text-green-600 text-sm mt-1">↗ +12% from last month</p>
       </div>
       <div class="bg-blue-100 p-3 rounded-lg">
        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
       </div>
      </div>
     </div>
     <div class="bg-white rounded-xl shadow-sm p-6 hover-scale">
      <div class="flex items-center justify-between">
       <div>
        <p id="pendingOrdersLabel" class="text-gray-600 text-sm font-medium">Pending Orders</p>
        <p class="text-3xl font-bold text-gray-800 mt-2">23</p>
        <p class="text-orange-600 text-sm mt-1">Needs attention</p>
       </div>
       <div class="bg-orange-100 p-3 rounded-lg">
        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
       </div>
      </div>
     </div>
     <div class="bg-white rounded-xl shadow-sm p-6 hover-scale">
      <div class="flex items-center justify-between">
       <div>
        <p id="totalProductsLabel" class="text-gray-600 text-sm font-medium">Total Products</p>
        <p class="text-3xl font-bold text-gray-800 mt-2">856</p>
        <p class="text-blue-600 text-sm mt-1">↗ +5 new this week</p>
       </div>
       <div class="bg-green-100 p-3 rounded-lg">
        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
        </svg>
       </div>
      </div>
     </div>
     <div class="bg-white rounded-xl shadow-sm p-6 hover-scale">
      <div class="flex items-center justify-between">
       <div>
        <p id="revenueLabel" class="text-gray-600 text-sm font-medium">Total Revenue</p>
        <p class="text-3xl font-bold text-gray-800 mt-2">$45,230</p>
        <p class="text-green-600 text-sm mt-1">↗ +18% from last month</p>
       </div>
       <div class="bg-purple-100 p-3 rounded-lg">
        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
        </svg>
       </div>
      </div>
     </div>
    </div><!-- Charts and Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
     <div class="bg-white rounded-xl shadow-sm p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Sales Overview</h3>
      <div class="chart-placeholder h-64">
       📊 Sales Chart Placeholder <br><small>Connect to your Laravel backend</small>
      </div>
     </div>
     <div class="bg-white rounded-xl shadow-sm p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Orders</h3>
      <div class="space-y-4">
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
        <div>
         <p class="font-medium text-gray-800">#ORD-001</p>
         <p class="text-sm text-gray-600">John Doe - $125.00</p>
        </div><span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm rounded-full">Pending</span>
       </div>
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
        <div>
         <p class="font-medium text-gray-800">#ORD-002</p>
         <p class="text-sm text-gray-600">Jane Smith - $89.50</p>
        </div><span class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">Delivered</span>
       </div>
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
        <div>
         <p class="font-medium text-gray-800">#ORD-003</p>
         <p class="text-sm text-gray-600">Mike Johnson - $234.75</p>
        </div><span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">Processing</span>
       </div>
      </div>
     </div>
    </div>
   </section><!-- Orders Section -->
   <section id="ordersSection" class="p-6 fade-in hidden"><!-- Orders List View -->
    <div id="ordersListView" class="bg-white rounded-xl shadow-sm">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Orders Management</h3>
       <div class="flex space-x-3"><select id="orderStatusFilter" class="border border-gray-300 rounded-lg px-3 py-2 text-sm"> <option value="">All Orders</option> <option value="pending">Pending</option> <option value="confirmed">Confirmed</option> <option value="processing">Processing</option> <option value="shipped">Shipped</option> <option value="delivered">Delivered</option> <option value="cancelled">Cancelled</option> </select> <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors"> Export Orders </button>
       </div>
      </div>
     </div>
     <div class="overflow-x-auto">
      <table class="w-full">
       <thead class="bg-gray-50">
        <tr>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
       </thead>
       <tbody class="bg-white divide-y divide-gray-200">
        <tr>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-001</td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div>
           <div class="text-sm font-medium text-gray-900">
            John Doe
           </div>
           <div class="text-sm text-gray-500">
            john@example.com
           </div>
           <div class="text-sm text-gray-500">
            📞 +1 (555) 123-4567
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3 items</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$125.00 (COD)</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-01-15</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewOrder('ORD-001')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="processOrder('ORD-001')" class="text-green-600 hover:text-green-900 mr-3">Process</button> <button onclick="cancelOrder('ORD-001')" class="text-red-600 hover:text-red-900">Cancel</button></td>
        </tr>
        <tr>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-002</td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div>
           <div class="text-sm font-medium text-gray-900">
            Jane Smith
           </div>
           <div class="text-sm text-gray-500">
            jane@example.com
           </div>
           <div class="text-sm text-gray-500">
            📞 +1 (555) 987-6543
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2 items</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$89.50 (COD)</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Delivered</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-01-14</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewOrder('ORD-002')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button class="text-gray-400 cursor-not-allowed mr-3">Process</button> <button class="text-gray-400 cursor-not-allowed">Cancel</button></td>
        </tr>
        <tr>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-003</td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div>
           <div class="text-sm font-medium text-gray-900">
            Mike Johnson
           </div>
           <div class="text-sm text-gray-500">
            mike@example.com
           </div>
           <div class="text-sm text-gray-500">
            📞 +1 (555) 456-7890
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1 item</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$234.75 (COD)</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Processing</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-01-16</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewOrder('ORD-003')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="processOrder('ORD-003')" class="text-green-600 hover:text-green-900 mr-3">Process</button> <button onclick="cancelOrder('ORD-003')" class="text-red-600 hover:text-red-900">Cancel</button></td>
        </tr>
       </tbody>
      </table>
     </div>
    </div><!-- Order Details View -->
    <div id="orderDetailsView" class="bg-white rounded-xl shadow-sm hidden">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <div>
        <h3 class="text-lg font-semibold text-gray-800">Order Details</h3>
        <p class="text-sm text-gray-600 mt-1">Order #<span id="orderDetailId">ORD-001</span></p>
       </div><button onclick="showOrdersList()" class="text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8"><!-- Order Information -->
       <div class="lg:col-span-2 space-y-6"><!-- Customer Information -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Information</h4>
         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
           <p class="text-gray-900">John Doe</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
           <p class="text-gray-900">john@example.com</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
           <p class="text-gray-900">+1 (555) 123-4567</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Order Date</label>
           <p class="text-gray-900">January 15, 2024</p>
          </div>
         </div>
        </div><!-- Delivery Address -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Delivery Address</h4>
         <div class="space-y-2">
          <p class="text-gray-900">123 Main Street, Apt 4B</p>
          <p class="text-gray-900">New York, NY 10001</p>
          <p class="text-gray-900">United States</p>
         </div>
        </div><!-- Order Items -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Order Items</h4>
         <div class="space-y-4">
          <div class="flex items-center justify-between p-4 bg-white rounded-lg">
           <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
             📱
            </div>
            <div>
             <h5 class="font-medium text-gray-900">Smartphone XYZ</h5>
             <p class="text-sm text-gray-600">SKU: PHONE-001</p>
             <p class="text-sm text-gray-600">Qty: 1</p>
            </div>
           </div>
           <div class="text-right">
            <p class="font-semibold text-gray-900">$299.99</p>
           </div>
          </div>
          <div class="flex items-center justify-between p-4 bg-white rounded-lg">
           <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
             👕
            </div>
            <div>
             <h5 class="font-medium text-gray-900">Cotton T-Shirt</h5>
             <p class="text-sm text-gray-600">SKU: SHIRT-001</p>
             <p class="text-sm text-gray-600">Qty: 2</p>
            </div>
           </div>
           <div class="text-right">
            <p class="font-semibold text-gray-900">$49.98</p>
           </div>
          </div>
         </div>
        </div>
       </div><!-- Order Summary & Actions -->
       <div class="space-y-6"><!-- Order Status -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Order Status</h4>
         <div class="space-y-3">
          <div class="flex items-center justify-between"><span class="text-sm text-gray-600">Current Status:</span> <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
          </div>
          <div class="mt-4"><label class="block text-sm font-medium text-gray-700 mb-2">Update Status</label> <select id="orderStatusUpdate" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> <option value="pending">Pending</option> <option value="confirmed">Confirmed</option> <option value="processing">Processing</option> <option value="shipped">Shipped</option> <option value="delivered">Delivered</option> <option value="cancelled">Cancelled</option> </select> <button onclick="updateOrderStatus()" class="w-full mt-3 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors"> Update Status </button>
          </div>
         </div>
        </div><!-- Order Summary -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Order Summary</h4>
         <div class="space-y-3">
          <div class="flex justify-between"><span class="text-gray-600">Subtotal:</span> <span class="text-gray-900">$349.97</span>
          </div>
          <div class="flex justify-between"><span class="text-gray-600">Delivery Fee:</span> <span class="text-gray-900">$5.00</span>
          </div>
          <div class="flex justify-between"><span class="text-gray-600">Tax:</span> <span class="text-gray-900">$28.00</span>
          </div>
          <hr class="border-gray-300">
          <div class="flex justify-between font-semibold text-lg"><span class="text-gray-900">Total:</span> <span class="text-gray-900">$382.97</span>
          </div>
          <div class="mt-2"><span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800"> 💰 Cash on Delivery </span>
          </div>
         </div>
        </div><!-- Delivery Notes -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Delivery Notes</h4><!-- Current Saved Notes Display -->
         <div id="currentDeliveryNotes" class="mb-4 p-3 bg-white border border-gray-200 rounded-lg">
          <div class="flex items-center justify-between mb-2"><span class="text-sm font-medium text-gray-700">Current Notes:</span> <span class="text-xs text-gray-500">Last updated: Jan 15, 2024</span>
          </div>
          <p class="text-gray-900 text-sm">Please call before delivery. Ring doorbell twice.</p>
         </div><!-- Edit Notes Section -->
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Update Notes:</label> <textarea id="deliveryNotesInput" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="3" placeholder="Add delivery instructions or notes...">Please call before delivery. Ring doorbell twice.</textarea> <button onclick="saveDeliveryNotes()" class="w-full mt-3 bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors"> Save Notes </button>
         </div>
        </div><!-- Quick Actions -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h4>
         <div class="space-y-3"><button onclick="printOrder()" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors"> 🖨️ Print Order </button> <button onclick="sendSMS()" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors"> 📱 Send SMS Update </button> <button onclick="refundOrder()" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors"> 💸 Process Refund </button>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </section><!-- Categories Section -->
   <section id="categoriesSection" class="p-6 fade-in hidden"><!-- Categories List View -->
    <div id="categoriesListView" class="bg-white rounded-xl shadow-sm">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Categories Management</h3>
       <div class="flex space-x-3"><button onclick="showAddCategory()" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors"> Add New Category </button>
       </div>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gradient-to-br from-blue-400 to-blue-600 h-32 rounded-lg mb-4 flex items-center justify-center text-white text-4xl">
         📱
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Electronics</h4>
        <p class="text-gray-600 text-sm mb-2">25 products</p>
        <p class="text-xs text-gray-500 mb-3">Smartphones, laptops, gadgets and more</p>
        <div class="flex space-x-2"><button onclick="editCategory('electronics')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteCategory('electronics')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gradient-to-br from-pink-400 to-pink-600 h-32 rounded-lg mb-4 flex items-center justify-center text-white text-4xl">
         👕
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Clothing</h4>
        <p class="text-gray-600 text-sm mb-2">150 products</p>
        <p class="text-xs text-gray-500 mb-3">Fashion, apparel, shoes and accessories</p>
        <div class="flex space-x-2"><button onclick="editCategory('clothing')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteCategory('clothing')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gradient-to-br from-green-400 to-green-600 h-32 rounded-lg mb-4 flex items-center justify-center text-white text-4xl">
         📚
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Books</h4>
        <p class="text-gray-600 text-sm mb-2">8 products</p>
        <p class="text-xs text-gray-500 mb-3">Educational, fiction, technical books</p>
        <div class="flex space-x-2"><button onclick="editCategory('books')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteCategory('books')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gradient-to-br from-purple-400 to-purple-600 h-32 rounded-lg mb-4 flex items-center justify-center text-white text-4xl">
         🏠
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Home &amp; Garden</h4>
        <p class="text-gray-600 text-sm mb-2">42 products</p>
        <p class="text-xs text-gray-500 mb-3">Furniture, decor, gardening supplies</p>
        <div class="flex space-x-2"><button onclick="editCategory('home-garden')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteCategory('home-garden')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gradient-to-br from-orange-400 to-orange-600 h-32 rounded-lg mb-4 flex items-center justify-center text-white text-4xl">
         ⚽
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Sports &amp; Outdoors</h4>
        <p class="text-gray-600 text-sm mb-2">18 products</p>
        <p class="text-xs text-gray-500 mb-3">Sports equipment, outdoor gear</p>
        <div class="flex space-x-2"><button onclick="editCategory('sports')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteCategory('sports')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gradient-to-br from-teal-400 to-teal-600 h-32 rounded-lg mb-4 flex items-center justify-center text-white text-4xl">
         💄
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Beauty &amp; Health</h4>
        <p class="text-gray-600 text-sm mb-2">35 products</p>
        <p class="text-xs text-gray-500 mb-3">Cosmetics, skincare, health products</p>
        <div class="flex space-x-2"><button onclick="editCategory('beauty')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteCategory('beauty')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
      </div>
     </div>
    </div><!-- Add/Edit Category Form -->
    <div id="addCategoryView" class="bg-white rounded-xl shadow-sm hidden">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Add New Category</h3><button onclick="showCategoriesList()" class="text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      </div>
     </div>
     <form onsubmit="saveCategory(event)" class="p-6">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8"><!-- Left Column -->
       <div class="space-y-6">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label> <input type="text" id="categoryName" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter category name">
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Description</label> <textarea id="categoryDescription" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter category description"></textarea>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category Icon/Emoji</label>
         <div class="grid grid-cols-6 gap-3 mb-4"><button type="button" onclick="selectIcon('📱')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">📱</button> <button type="button" onclick="selectIcon('👕')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">👕</button> <button type="button" onclick="selectIcon('📚')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">📚</button> <button type="button" onclick="selectIcon('🏠')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">🏠</button> <button type="button" onclick="selectIcon('⚽')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">⚽</button> <button type="button" onclick="selectIcon('💄')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">💄</button> <button type="button" onclick="selectIcon('🍔')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">🍔</button> <button type="button" onclick="selectIcon('🚗')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">🚗</button> <button type="button" onclick="selectIcon('🎵')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">🎵</button> <button type="button" onclick="selectIcon('🎮')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">🎮</button> <button type="button" onclick="selectIcon('🐾')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">🐾</button> <button type="button" onclick="selectIcon('🎨')" class="category-icon-btn w-12 h-12 border-2 border-gray-300 rounded-lg flex items-center justify-center text-2xl hover:border-blue-500 transition-colors">🎨</button>
         </div><input type="text" id="categoryIcon" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Or enter custom emoji/icon">
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category Color</label>
         <div class="grid grid-cols-6 gap-3 mb-4"><button type="button" onclick="selectColor('blue')" class="color-btn w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg border-2 border-gray-300 hover:border-blue-500 transition-colors"></button> <button type="button" onclick="selectColor('pink')" class="color-btn w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-lg border-2 border-gray-300 hover:border-pink-500 transition-colors"></button> <button type="button" onclick="selectColor('green')" class="color-btn w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-lg border-2 border-gray-300 hover:border-green-500 transition-colors"></button> <button type="button" onclick="selectColor('purple')" class="color-btn w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg border-2 border-gray-300 hover:border-purple-500 transition-colors"></button> <button type="button" onclick="selectColor('orange')" class="color-btn w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg border-2 border-gray-300 hover:border-orange-500 transition-colors"></button> <button type="button" onclick="selectColor('teal')" class="color-btn w-12 h-12 bg-gradient-to-br from-teal-400 to-teal-600 rounded-lg border-2 border-gray-300 hover:border-teal-500 transition-colors"></button> <button type="button" onclick="selectColor('red')" class="color-btn w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-lg border-2 border-gray-300 hover:border-red-500 transition-colors"></button> <button type="button" onclick="selectColor('indigo')" class="color-btn w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-lg border-2 border-gray-300 hover:border-indigo-500 transition-colors"></button> <button type="button" onclick="selectColor('yellow')" class="color-btn w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-lg border-2 border-gray-300 hover:border-yellow-500 transition-colors"></button> <button type="button" onclick="selectColor('gray')" class="color-btn w-12 h-12 bg-gradient-to-br from-gray-400 to-gray-600 rounded-lg border-2 border-gray-300 hover:border-gray-500 transition-colors"></button>
         </div><input type="hidden" id="categoryColor" value="blue">
        </div>
       </div><!-- Right Column -->
       <div class="space-y-6">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category Image</label>
         <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">
          <div id="categoryPreview" class="mb-4">
           <div class="w-32 h-32 mx-auto bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center text-white text-6xl">
            📱
           </div>
          </div>
          <div class="mt-4"><label class="cursor-pointer"> <span class="mt-2 block text-sm font-medium text-gray-900">Upload category image</span> <input type="file" class="sr-only" accept="image/*" onchange="previewCategoryImage(event)"> </label>
           <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
           <p class="mt-1 text-xs text-gray-500">Or use the icon/color combination above</p>
          </div>
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category Status</label>
         <div class="space-y-2"><label class="flex items-center"> <input type="radio" name="categoryStatus" value="active" checked class="text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Active</span> </label> <label class="flex items-center"> <input type="radio" name="categoryStatus" value="inactive" class="text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Inactive</span> </label>
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label> <input type="number" id="categoryOrder" min="1" value="1" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="1">
         <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">SEO Settings</label>
         <div class="space-y-3"><input type="text" id="categorySlug" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="category-url-slug"> <textarea id="categoryMetaDescription" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Meta description for SEO"></textarea>
         </div>
        </div>
       </div>
      </div>
      <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200"><button type="button" onclick="showCategoriesList()" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"> Cancel </button> <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"> Save Category </button>
      </div>
     </form>
    </div>
   </section><!-- Products Section -->
   <section id="productsSection" class="p-6 fade-in hidden"><!-- Products List View -->
    <div id="productsListView" class="bg-white rounded-xl shadow-sm">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Products Management</h3>
       <div class="flex space-x-3"><select class="border border-gray-300 rounded-lg px-3 py-2 text-sm"> <option>All Categories</option> <option>Electronics</option> <option>Clothing</option> <option>Books</option> <option>Home &amp; Garden</option> </select> <button onclick="showAddProduct()" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors"> Add New Product </button>
       </div>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gray-200 h-32 rounded-lg mb-4 flex items-center justify-center">
         📱 Product Image
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Smartphone XYZ</h4>
        <p class="text-gray-600 text-sm mb-2">Electronics • Stock: 25</p>
        <p class="text-lg font-bold text-gray-800 mb-3">$299.99</p>
        <div class="flex space-x-2"><button onclick="editProduct('smartphone')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteProduct('smartphone')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gray-200 h-32 rounded-lg mb-4 flex items-center justify-center">
         👕 Product Image
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Cotton T-Shirt</h4>
        <p class="text-gray-600 text-sm mb-2">Clothing • Stock: 150</p>
        <p class="text-lg font-bold text-gray-800 mb-3">$24.99</p>
        <div class="flex space-x-2"><button onclick="editProduct('tshirt')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteProduct('tshirt')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gray-200 h-32 rounded-lg mb-4 flex items-center justify-center">
         📚 Product Image
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Programming Book</h4>
        <p class="text-gray-600 text-sm mb-2">Books • Stock: 8</p>
        <p class="text-lg font-bold text-gray-800 mb-3">$39.99</p>
        <div class="flex space-x-2"><button onclick="editProduct('book')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteProduct('book')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
      </div>
     </div>
    </div><!-- Add/Edit Product Form -->
    <div id="addProductView" class="bg-white rounded-xl shadow-sm hidden">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Add New Product</h3><button onclick="showProductsList()" class="text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      </div>
     </div>
     <form onsubmit="saveProduct(event)" class="p-6">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8"><!-- Left Column -->
       <div class="space-y-6">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label> <input type="text" id="productName" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter product name">
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Description</label> <textarea id="productDescription" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter product description"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Price *</label> <input type="number" id="productPrice" step="0.01" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0.00">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label> <input type="number" id="productStock" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0">
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category *</label> <select id="productCategory" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> <option value="">Select Category</option> <option value="electronics">Electronics</option> <option value="clothing">Clothing</option> <option value="books">Books</option> <option value="home-garden">Home &amp; Garden</option> <option value="sports">Sports &amp; Outdoors</option> <option value="beauty">Beauty &amp; Health</option> </select>
        </div>
       </div><!-- Right Column -->
       <div class="space-y-6">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Images</label>
         <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">
          <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewbox="0 0 48 48"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <div class="mt-4"><label class="cursor-pointer"> <span class="mt-2 block text-sm font-medium text-gray-900">Upload product images</span> <input type="file" class="sr-only" multiple accept="image/*"> </label>
           <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 10MB each</p>
          </div>
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Specifications</label>
         <div class="space-y-3">
          <div class="flex space-x-2"><input type="text" placeholder="Specification name" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> <input type="text" placeholder="Value" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> <button type="button" class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg></button>
          </div><button type="button" onclick="addSpecification()" class="text-blue-600 hover:text-blue-800 text-sm font-medium">+ Add Specification</button>
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Status</label>
         <div class="space-y-2"><label class="flex items-center"> <input type="radio" name="productStatus" value="active" checked class="text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Active</span> </label> <label class="flex items-center"> <input type="radio" name="productStatus" value="draft" class="text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Draft</span> </label> <label class="flex items-center"> <input type="radio" name="productStatus" value="inactive" class="text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Inactive</span> </label>
         </div>
        </div>
       </div>
      </div>
      <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200"><button type="button" onclick="showProductsList()" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"> Cancel </button> <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"> Save Product </button>
      </div>
     </form>
    </div>
   </section><!-- Customers Section -->
   <section id="customersSection" class="p-6 fade-in hidden"><!-- Customers List View -->
    <div id="customersListView" class="bg-white rounded-xl shadow-sm">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Customers Management</h3>
       <div class="flex space-x-3"><select id="customerStatusFilter" class="border border-gray-300 rounded-lg px-3 py-2 text-sm"> <option value="">All Customers</option> <option value="active">Active</option> <option value="blocked">Blocked</option> <option value="new">New (Last 30 days)</option> </select> <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors"> Export Customers </button>
       </div>
      </div>
     </div>
     <div class="overflow-x-auto">
      <table class="w-full">
       <thead class="bg-gray-50">
        <tr>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Spent</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Join Date</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
       </thead>
       <tbody class="bg-white divide-y divide-gray-200">
        <tr id="customer-john">
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
           <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
            JD
           </div>
           <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">
             John Doe
            </div>
            <div class="text-sm text-gray-500">
             Premium Customer
            </div>
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="text-sm text-gray-900">
           john@example.com
          </div>
          <div class="text-sm text-gray-500">
           +1 (555) 123-4567
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">5 orders</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$567.50</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Dec 1, 2023</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewCustomer('john')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="blockCustomer('john')" class="text-red-600 hover:text-red-900">Block</button></td>
        </tr>
        <tr id="customer-jane">
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
           <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-semibold">
            JS
           </div>
           <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">
             Jane Smith
            </div>
            <div class="text-sm text-gray-500">
             Regular Customer
            </div>
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="text-sm text-gray-900">
           jane@example.com
          </div>
          <div class="text-sm text-gray-500">
           +1 (555) 987-6543
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3 orders</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$234.75</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jan 5, 2024</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewCustomer('jane')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="blockCustomer('jane')" class="text-red-600 hover:text-red-900">Block</button></td>
        </tr>
        <tr id="customer-mike">
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
           <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
            MJ
           </div>
           <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">
             Mike Johnson
            </div>
            <div class="text-sm text-gray-500">
             New Customer
            </div>
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="text-sm text-gray-900">
           mike@example.com
          </div>
          <div class="text-sm text-gray-500">
           +1 (555) 456-7890
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1 order</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$89.99</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jan 18, 2024</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewCustomer('mike')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="blockCustomer('mike')" class="text-red-600 hover:text-red-900">Block</button></td>
        </tr>
        <tr id="customer-sarah" class="opacity-60">
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
           <div class="w-10 h-10 bg-gray-500 rounded-full flex items-center justify-center text-white font-semibold">
            SW
           </div>
           <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">
             Sarah Wilson
            </div>
            <div class="text-sm text-gray-500">
             Blocked Customer
            </div>
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="text-sm text-gray-900">
           sarah@example.com
          </div>
          <div class="text-sm text-gray-500">
           +1 (555) 321-0987
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2 orders</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$156.25</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Blocked</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Nov 15, 2023</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewCustomer('sarah')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="unblockCustomer('sarah')" class="text-green-600 hover:text-green-900">Unblock</button></td>
        </tr>
       </tbody>
      </table>
     </div>
    </div><!-- Customer Details View -->
    <div id="customerDetailsView" class="bg-white rounded-xl shadow-sm hidden">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <div>
        <h3 class="text-lg font-semibold text-gray-800">Customer Details</h3>
        <p class="text-sm text-gray-600 mt-1">Customer ID: <span id="customerDetailId">CUST-001</span></p>
       </div><button onclick="showCustomersList()" class="text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8"><!-- Customer Information -->
       <div class="lg:col-span-2 space-y-6"><!-- Personal Information -->
        <div class="bg-gray-50 rounded-lg p-6">
         <div class="flex items-center justify-between mb-4">
          <h4 class="text-lg font-semibold text-gray-800">Personal Information</h4>
          <div id="customerStatusBadge" class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
           Active
          </div>
         </div>
         <div class="flex items-center mb-6">
          <div id="customerAvatar" class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-semibold mr-4">
           JD
          </div>
          <div>
           <h5 id="customerName" class="text-xl font-semibold text-gray-900">John Doe</h5>
           <p id="customerType" class="text-gray-600">Premium Customer</p>
          </div>
         </div>
         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
           <p id="customerEmail" class="text-gray-900">john@example.com</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
           <p id="customerPhone" class="text-gray-900">+1 (555) 123-4567</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Join Date</label>
           <p id="customerJoinDate" class="text-gray-900">December 1, 2023</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Last Order</label>
           <p id="customerLastOrder" class="text-gray-900">January 15, 2024</p>
          </div>
         </div>
        </div><!-- Delivery Addresses -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Delivery Addresses</h4>
         <div class="space-y-4">
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2"><span class="font-medium text-gray-900">Home Address</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Primary</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>123 Main Street, Apt 4B</p>
            <p>New York, NY 10001</p>
            <p>United States</p>
           </div>
          </div>
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2"><span class="font-medium text-gray-900">Office Address</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Secondary</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>456 Business Ave, Suite 200</p>
            <p>New York, NY 10002</p>
            <p>United States</p>
           </div>
          </div>
         </div>
        </div><!-- Order History -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Recent Orders</h4>
         <div class="space-y-4">
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2">
            <div><span class="font-medium text-gray-900">#ORD-001</span> <span class="text-sm text-gray-500 ml-2">January 15, 2024</span>
            </div><span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>3 items • $125.00 (COD)</p>
            <p>Smartphone XYZ, Cotton T-Shirt (x2)</p>
           </div>
          </div>
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2">
            <div><span class="font-medium text-gray-900">#ORD-045</span> <span class="text-sm text-gray-500 ml-2">December 28, 2023</span>
            </div><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>2 items • $189.50 (COD)</p>
            <p>Programming Book, Wireless Headphones</p>
           </div>
          </div>
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2">
            <div><span class="font-medium text-gray-900">#ORD-032</span> <span class="text-sm text-gray-500 ml-2">December 10, 2023</span>
            </div><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>1 item • $253.00 (COD)</p>
            <p>Gaming Keyboard</p>
           </div>
          </div>
         </div><button class="w-full mt-4 text-blue-600 hover:text-blue-800 text-sm font-medium">View All Orders</button>
        </div>
       </div><!-- Customer Stats & Actions -->
       <div class="space-y-6"><!-- Customer Statistics -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Statistics</h4>
         <div class="space-y-4">
          <div class="flex justify-between items-center"><span class="text-gray-600">Total Orders:</span> <span id="customerTotalOrders" class="font-semibold text-gray-900">5</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Total Spent:</span> <span id="customerTotalSpent" class="font-semibold text-gray-900">$567.50</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Average Order:</span> <span id="customerAvgOrder" class="font-semibold text-gray-900">$113.50</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Pending Orders:</span> <span id="customerPendingOrders" class="font-semibold text-gray-900">1</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Completed Orders:</span> <span id="customerCompletedOrders" class="font-semibold text-gray-900">4</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Cancelled Orders:</span> <span id="customerCancelledOrders" class="font-semibold text-gray-900">0</span>
          </div>
         </div>
        </div><!-- Customer Actions -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Actions</h4>
         <div class="space-y-3"><button onclick="sendCustomerEmail()" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors"> 📧 Send Email </button> <button onclick="sendCustomerSMS()" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors"> 📱 Send SMS </button> <button onclick="viewCustomerOrders()" class="w-full bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition-colors"> 📋 View All Orders </button> <button id="blockUnblockBtn" onclick="toggleCustomerBlock()" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors"> 🚫 Block Customer </button>
         </div>
        </div><!-- Customer Notes -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Notes</h4><!-- Current Saved Notes Display -->
         <div id="currentCustomerNotes" class="mb-4 p-3 bg-white border border-gray-200 rounded-lg">
          <div class="flex items-center justify-between mb-2"><span class="text-sm font-medium text-gray-700">Current Notes:</span> <span class="text-xs text-gray-500">Last updated: Jan 10, 2024</span>
          </div>
          <p class="text-gray-900 text-sm">Premium customer with excellent payment history. Prefers COD delivery. Usually orders electronics and books.</p>
         </div><!-- Edit Notes Section -->
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Update Notes:</label> <textarea id="customerNotesInput" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Add notes about this customer...">Premium customer with excellent payment history. Prefers COD delivery. Usually orders electronics and books.</textarea> <button onclick="saveCustomerNotes()" class="w-full mt-3 bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors"> Save Notes </button>
         </div>
        </div><!-- Customer Preferences -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Preferences</h4>
         <div class="space-y-3">
          <div class="flex justify-between items-center"><span class="text-gray-600">Preferred Payment:</span> <span class="font-semibold text-gray-900">Cash on Delivery</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Email Notifications:</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Enabled</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">SMS Notifications:</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Enabled</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Marketing Emails:</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Disabled</span>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </section><!-- Analytics Section -->
   <section id="analyticsSection" class="p-6 fade-in hidden">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
     <div class="bg-white rounded-xl shadow-sm p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Revenue Analytics</h3>
      <div class="chart-placeholder h-64">
       📈 Revenue Chart <br><small>Monthly revenue trends</small>
      </div>
     </div>
     <div class="bg-white rounded-xl shadow-sm p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Top Products</h3>
      <div class="space-y-4">
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg"><span class="font-medium">Smartphone XYZ</span> <span class="text-green-600 font-semibold">$2,340</span>
       </div>
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg"><span class="font-medium">Cotton T-Shirt</span> <span class="text-green-600 font-semibold">$1,890</span>
       </div>
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg"><span class="font-medium">Programming Book</span> <span class="text-green-600 font-semibold">$1,245</span>
       </div>
      </div>
     </div>
    </div>
   </section><!-- Settings Section -->
   <section id="settingsSection" class="p-6 fade-in hidden">
    <div class="bg-white rounded-xl shadow-sm p-6">
     <h3 class="text-lg font-semibold text-gray-800 mb-6">Store Settings</h3>
     <div class="space-y-6">
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Store Name</label> <input type="text" value="Everything Store" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Store Description</label> <textarea rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Your one-stop shop for everything you need..."></textarea>
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Cash on Delivery Settings</label>
       <div class="space-y-3"><label class="flex items-center"> <input type="checkbox" checked class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Enable Cash on Delivery</span> </label>
        <div class="ml-6"><label class="block text-sm font-medium text-gray-700 mb-1">Delivery Fee</label> <input type="number" value="5.00" class="w-32 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
       </div>
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Contact Information</label>
       <div class="grid grid-cols-1 md:grid-cols-2 gap-4"><input type="email" placeholder="store@example.com" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> <input type="tel" placeholder="+1 (555) 123-4567" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
       </div>
      </div><button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors"> Save Settings </button>
     </div>
    </div>
   </section>
  </main><!-- Mobile Overlay -->
  <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden"></div>
  <script>
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
        function showSection(sectionName) {
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
        function showAddCategory() {
            document.getElementById('categoriesListView').classList.add('hidden');
            document.getElementById('addCategoryView').classList.remove('hidden');
            document.querySelector('#addCategoryView h3').textContent = 'Add New Category';
            // Clear form
            document.getElementById('categoryName').value = '';
            document.getElementById('categoryDescription').value = '';
            document.getElementById('categoryIcon').value = '';
            document.getElementById('categoryColor').value = 'blue';
            document.getElementById('categoryOrder').value = '1';
            document.getElementById('categorySlug').value = '';
            document.getElementById('categoryMetaDescription').value = '';
            updateCategoryPreview();
        }

        function showCategoriesList() {
            document.getElementById('addCategoryView').classList.add('hidden');
            document.getElementById('categoriesListView').classList.remove('hidden');
        }

        function editCategory(categoryId) {
            showAddCategory();
            document.querySelector('#addCategoryView h3').textContent = 'Edit Category';
            
            // Simulate loading category data
            const categoryData = {
                'electronics': { name: 'Electronics', description: 'Smartphones, laptops, gadgets and more', icon: '📱', color: 'blue' },
                'clothing': { name: 'Clothing', description: 'Fashion, apparel, shoes and accessories', icon: '👕', color: 'pink' },
                'books': { name: 'Books', description: 'Educational, fiction, technical books', icon: '📚', color: 'green' },
                'home-garden': { name: 'Home & Garden', description: 'Furniture, decor, gardening supplies', icon: '🏠', color: 'purple' },
                'sports': { name: 'Sports & Outdoors', description: 'Sports equipment, outdoor gear', icon: '⚽', color: 'orange' },
                'beauty': { name: 'Beauty & Health', description: 'Cosmetics, skincare, health products', icon: '💄', color: 'teal' }
            };
            
            const category = categoryData[categoryId];
            if (category) {
                document.getElementById('categoryName').value = category.name;
                document.getElementById('categoryDescription').value = category.description;
                document.getElementById('categoryIcon').value = category.icon;
                document.getElementById('categoryColor').value = category.color;
                updateCategoryPreview();
            }
        }

        function deleteCategory(categoryId) {
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
                showToast('Category deleted successfully!', 'success');
                button.closest('.border').style.opacity = '0.5';
            };
        }

        function saveCategory(event) {
            event.preventDefault();
            
            const name = document.getElementById('categoryName').value;
            const icon = document.getElementById('categoryIcon').value;
            const color = document.getElementById('categoryColor').value;
            
            if (!name) {
                showToast('Please enter a category name', 'error');
                return;
            }
            
            if (!icon) {
                showToast('Please select an icon for the category', 'error');
                return;
            }
            
            // Auto-generate slug from name
            const slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            document.getElementById('categorySlug').value = slug;
            
            // Simulate saving
            showToast('Category saved successfully!', 'success');
            setTimeout(() => {
                showCategoriesList();
            }, 1000);
        }

        function selectIcon(icon) {
            document.getElementById('categoryIcon').value = icon;
            
            // Update visual selection
            document.querySelectorAll('.category-icon-btn').forEach(btn => {
                btn.classList.remove('border-blue-500', 'bg-blue-50');
                btn.classList.add('border-gray-300');
            });
            event.target.classList.remove('border-gray-300');
            event.target.classList.add('border-blue-500', 'bg-blue-50');
            
            updateCategoryPreview();
        }

        function selectColor(color) {
            document.getElementById('categoryColor').value = color;
            
            // Update visual selection
            document.querySelectorAll('.color-btn').forEach(btn => {
                btn.classList.remove('ring-4', 'ring-offset-2');
            });
            event.target.classList.add('ring-4', 'ring-offset-2');
            
            updateCategoryPreview();
        }

        function updateCategoryPreview() {
            const icon = document.getElementById('categoryIcon').value || '📱';
            const color = document.getElementById('categoryColor').value || 'blue';
            
            const colorClasses = {
                'blue': 'from-blue-400 to-blue-600',
                'pink': 'from-pink-400 to-pink-600',
                'green': 'from-green-400 to-green-600',
                'purple': 'from-purple-400 to-purple-600',
                'orange': 'from-orange-400 to-orange-600',
                'teal': 'from-teal-400 to-teal-600',
                'red': 'from-red-400 to-red-600',
                'indigo': 'from-indigo-400 to-indigo-600',
                'yellow': 'from-yellow-400 to-yellow-600',
                'gray': 'from-gray-400 to-gray-600'
            };
            
            const preview = document.getElementById('categoryPreview');
            preview.innerHTML = `
                <div class="w-32 h-32 mx-auto bg-gradient-to-br ${colorClasses[color]} rounded-lg flex items-center justify-center text-white text-6xl">
                    ${icon}
                </div>
            `;
        }

        function previewCategoryImage(event) {
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
                    dot.className = 'w-2 h-2 bg-gray-300 rounded-full mt-2 flex-shrink-0';
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
                    dot.className = 'w-2 h-2 bg-gray-300 rounded-full mt-2 flex-shrink-0';
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
    </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'99f9c6ea14dee280',t:'MTc2MzMyNTM0OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>