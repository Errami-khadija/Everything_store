@extends('admin.layout')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Overview of your store performance')


@section('content')
<!-- Dashboard Section -->
   <section id="dashboardSection" class="p-6 fade-in"><!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
     <div class="bg-white rounded-xl shadow-sm p-6 hover-scale">
      <div class="flex items-center justify-between">
       <div>
        <p id="totalOrdersLabel" class="text-gray-600 text-sm font-medium">Total Orders</p>
        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalOrders }}</p>
        @if($ordersGrowth >= 0)
    <p class="text-green-600 text-sm mt-1">
        ↗ {{ number_format($ordersGrowth, 1) }}% from last week
    </p>
@else
    <p class="text-red-600 text-sm mt-1">
        ↘ {{ number_format(abs($ordersGrowth), 1) }}% from last week
    </p>
@endif

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
        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $pendingOrders }}</p>
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
        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalProducts}}</p>
        @if($productsGrowth >= 0)
    <p class="text-green-600 text-sm mt-1">
        ↗ {{ number_format($productsGrowth, 1) }}% from last week
    </p>
@else
    <p class="text-red-600 text-sm mt-1">
        ↘ {{ number_format(abs($productsGrowth), 1) }}% from last week
    </p>
@endif
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
        <p class="text-3xl font-bold text-gray-800 mt-2">${{ number_format($totalRevenue, 2) }}</p>
      @if($revenueGrowth >= 0)
    <p class="text-green-600 text-sm mt-1">
        ↗ {{ number_format($revenueGrowth, 1) }}% from last week
    </p>
@else
    <p class="text-red-600 text-sm mt-1">
        ↘ {{ number_format(abs($revenueGrowth), 1) }}% from last week
    </p>
@endif
       </div>
       <div class="bg-purple-100 p-3 rounded-lg">
        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
        </svg>
       </div>
      </div>
     </div>
    </div><!-- Charts and Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8 ">
     <div class="bg-white rounded-xl shadow-sm p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Sales Overview</h3>
      
     <canvas id="salesChart" class="h-64"></canvas>

     
     </div>
    <div class="bg-white rounded-xl shadow-sm p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Orders</h3>

    <div class="space-y-4">
        @forelse($recentOrders as $order)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div>
                    <p class="font-medium text-gray-800">
                        #ORD-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}
                    </p>
                    <p class="text-sm text-gray-600">
                        {{ $order->customer->name ?? 'Guest' }} –
                        ${{ number_format($order->total_amount, 2) }}
                    </p>
                </div>

                <span class="px-3 py-1 text-sm rounded-full
                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                    @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                    @elseif($order->status === 'delivered') bg-green-100 text-green-800
                    @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                    @endif
                ">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
        @empty
            <p class="text-gray-500 text-sm">No recent orders.</p>
        @endforelse
    </div>
</div>

    </div>
   </section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
    const ctx = document.getElementById('salesChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Revenue ($)',
                data: @json($salesData),
                borderWidth: 3,
                tension: 0.4,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


   
@endsection