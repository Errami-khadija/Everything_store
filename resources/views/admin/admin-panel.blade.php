<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Everything Store - Admin Panel</title>
  <script src="/_sdk/element_sdk.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  {{-- CSS --}}
  @vite(['resources/css/dashboard.css'])

  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
</head>

 <body class="bg-gray-50 font-sans">
 <!-- Mobile Menu Button --> 
 <button id="mobileMenuBtn" class="lg:hidden fixed top-4 left-4 z-50 bg-blue-600 text-white p-2 rounded-lg shadow-lg">
   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
   </svg>
   </button> 
   <!-- Sidebar -->
  <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 sidebar-transition z-40">
   <div class="p-6 border-b border-gray-200">
    <h1 id="storeName" class="text-2xl font-bold text-gray-800">Everything Store</h1>
    <p class="text-sm text-gray-600 mt-1">Admin Panel</p>
   </div>
   <nav class="mt-6">
   <a href="#" onclick="showSection('dashboard')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors active">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
     </svg> Dashboard </a> 
     <a href="#" onclick="showSection('orders')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
     </svg> Orders </a>
    <a href="#" onclick="showSection('products')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
     </svg> Products </a> 
     <a href="#" onclick="showSection('categories')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
     </svg> Categories </a> 
     <a href="#" onclick="showSection('customers')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
     </svg> Customers </a> 
     <a href="#" onclick="showSection('analytics')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
     </svg> Analytics </a> 
     <a href="#" onclick="showSection('settings')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
     </svg> Settings </a>
   </nav>
  </aside>
  <!-- Main Content -->
  <main class="lg:ml-64 min-h-full">
  <!-- Header -->
   <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
    <div class="flex items-center justify-between">
     <div>
      <h2 id="pageTitle" class="text-2xl font-semibold text-gray-800">Dashboard</h2>
      <p id="welcomeMessage" class="text-gray-600 mt-1">Welcome back, Admin!</p>
     </div>
     <div class="flex items-center space-x-4">
      <div class="relative">
      <button id="notificationBtn" onclick="toggleNotifications()" class="relative p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4 19h6v-2H4v2zM4 15h8v-2H4v2zM4 11h10V9H4v2z" />
        </svg>
        <span id="notificationBadge" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span> 
        </button> 
        <!-- Notifications Dropdown -->
       <div id="notificationsDropdown" class="absolute right-0 top-full mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-200 z-50 hidden">
        <div class="p-4 border-b border-gray-200">
         <div class="flex items-center justify-between">
          <h3 class="text-lg font-semibold text-gray-800">Notifications</h3>
          <button onclick="markAllAsRead()" class="text-sm text-blue-600 hover:text-blue-800">Mark all as read</button>
         </div>
        </div>
        <div class="max-h-96 overflow-y-auto">
         <div class="notification-item p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer" onclick="handleNotificationClick('order-pending')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-red-500 rounded-full mt-2 shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-900">New Order Received</p>
            <p class="text-sm text-gray-600">Order #ORD-001 from John Doe needs processing</p>
            <p class="text-xs text-gray-500 mt-1">2 minutes ago</p>
           </div>
          </div>
         </div>
         <div class="notification-item p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer" onclick="handleNotificationClick('stock-low')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-orange-500 rounded-full mt-2 shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-900">Low Stock Alert</p>
            <p class="text-sm text-gray-600">Programming Book has only 3 items left in stock</p>
            <p class="text-xs text-gray-500 mt-1">15 minutes ago</p>
           </div>
          </div>
         </div>
         <div class="notification-item p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer" onclick="handleNotificationClick('customer-new')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-green-500 rounded-full mt-2 shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-900">New Customer Registration</p>
            <p class="text-sm text-gray-600">Mike Johnson just created an account</p>
            <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
           </div>
          </div>
         </div>
         <div class="notification-item p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer opacity-60" onclick="handleNotificationClick('order-delivered')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-gray-300 rounded-full mt-2 shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-700">Order Delivered</p>
            <p class="text-sm text-gray-500">Order #ORD-002 has been successfully delivered</p>
            <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
           </div>
          </div>
         </div>
         <div class="notification-item p-4 hover:bg-gray-50 cursor-pointer opacity-60" onclick="handleNotificationClick('payment-received')">
          <div class="flex items-start space-x-3">
           <div class="w-2 h-2 bg-gray-300 rounded-full mt-2 shrink-0"></div>
           <div class="flex-1">
            <p class="text-sm font-medium text-gray-700">Payment Received</p>
            <p class="text-sm text-gray-500">COD payment of $89.50 received for Order #ORD-002</p>
            <p class="text-xs text-gray-400 mt-1">4 hours ago</p>
           </div>
          </div>
         </div>
        </div>
        <div class="p-4 border-t border-gray-200">
        <button onclick="viewAllNotifications()" class="w-full text-center text-sm text-blue-600 hover:text-blue-800 font-medium"> View All Notifications </button>
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
   </header>
    @include('admin.sections.dashboard-section')
    @include('admin.sections.orders-section')
    @include('admin.sections.products-section')
    @include('admin.sections.categories-section')
    @include('admin.sections.customers-section')
    @include('admin.sections.analytics-section')
    @include('admin.sections.settings-section')
 
  </main>
  <!-- Mobile Overlay -->
  <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden"></div>
  </body>
  @vite(['resources/js/dashboard.js'])
</html>