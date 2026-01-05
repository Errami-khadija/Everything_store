 <!-- Mobile Menu Button --> 
 <button id="mobileMenuBtn" class="lg:hidden fixed top-4 left-4 z-50 bg-blue-600 text-white p-2 rounded-lg shadow-lg">
   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
   </svg>
   </button> 
   <!-- Sidebar -->
  <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 sidebar-transition z-40">
   <div class="p-6 border-b border-gray-200">
    <h1 id="storeName" class="text-2xl font-bold text-gray-800"> {{ $settings->store_name ?? 'Everything Store' }}</h1>
    <p class="text-sm text-gray-600 mt-1">Admin Panel</p>
   </div>
   <nav class="mt-6">
   <a href="{{ route('admin.dashboard.index') }}" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('admin.dashboard.index') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
     </svg> Dashboard </a> 
     <a href="{{ route('admin.orders.index') }}" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('admin.orders.index') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
     </svg> Orders </a>
    <a href="{{ route('admin.products.index') }}" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors  {{ request()->routeIs('admin.products.index') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
     </svg> Products </a> 
     <a href="{{ route('admin.categories.index') }}" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors  {{ request()->routeIs('admin.categories.index') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
     </svg> Categories </a> 
     <a href="{{ route('admin.customers.index') }}" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('admin.customers.index') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
     </svg> Customers </a> 
     <a href="{{ route('admin.analytics.index') }}" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('admin.analytics.index') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }} ">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
     </svg> Analytics </a> 
     <a href="{{ route('admin.settings.index') }}" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('admin.settings.index') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
     </svg> Settings </a>
   </nav>
  </aside>