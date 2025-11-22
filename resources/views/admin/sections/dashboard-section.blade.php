<!-- Dashboard Section -->
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
   </section>