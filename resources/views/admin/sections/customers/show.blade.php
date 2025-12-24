@extends('admin.layout')

@section('content')
<!-- Customer Details View -->
    <div id="customerDetailsView" class="bg-white rounded-xl shadow-sm p-6 fade-in">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <div>
        <h3 class="text-lg font-semibold text-gray-800">Customer Details</h3>
        <p class="text-sm text-gray-600 mt-1">Customer ID: <span id="customerDetailId">CUST-{{ $customer->id }}</span></p>
       </div><a href="{{ route('admin.customers.index') }}" class="text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></a>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8"><!-- Customer Information -->
       <div class="lg:col-span-2 space-y-6"><!-- Personal Information -->
        <div class="bg-gray-50 rounded-lg p-6">
         <div class="flex items-center justify-between mb-4">
          <h4 class="text-lg font-semibold text-gray-800">Personal Information</h4>
          <div id="customerStatusBadge" class="px-3 py-1 text-sm font-semibold rounded-full {{ $customer->is_blocked
        ? 'bg-red-100 text-red-800'
        : 'bg-green-100 text-green-800' }}">
            {{ $customer->is_blocked ? 'Blocked' : 'Active' }}
          </div>
         </div>
         <div class="flex items-center mb-6">
          <div id="customerAvatar" class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-semibold mr-4">
           {{ strtoupper(substr($customer->name,0,1) . substr(explode(' ', $customer->name)[1] ?? '',0,1)) }}
          </div>
          <div>
           <h5 id="customerName" class="text-xl font-semibold text-gray-900"> {{ $customer->name }}</h5>
           <p id="customerType" class="text-gray-600"> {{ $customer->orders_count > 5 ? 'Premium Customer' : 'Regular Customer' }}</p>
          </div>
         </div>
         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
           <p id="customerPhone" class="text-gray-900"> {{ $customer->phone }}</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Join Date</label>
           <p id="customerJoinDate" class="text-gray-900">{{ $customer->created_at->format('M d, Y') }}</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Last Order</label>
           <p id="customerLastOrder" class="text-gray-900"> {{ $customer->orders->last()?->created_at->format('M d, Y') }}</p>
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
            <p>{{ $customer->address }}</p>
            <p>{{ $customer->city }}</p>
           </div>
          </div>
          
         </div>
        </div><!-- Order History -->
          @php
            $statusClasses = [
              'pending' => 'bg-yellow-100 text-yellow-800',
              'processing' => 'bg-purple-100 text-purple-800',
              'delivered' => 'bg-green-100 text-green-800',
              'cancelled' => 'bg-red-100 text-red-800',
                      ];
          @endphp
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Recent Orders</h4>
         <div class="space-y-4">
            @foreach($customer->orders->take(3) as $order)
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2">
            <div><span class="font-medium text-gray-900">#ORD-{{ $order->id }}</span> <span class="text-sm text-gray-500 ml-2">{{ $order->created_at->format('M d, Y') }}</span>
            </div><span class="px-2 py-1 text-xs font-semibold rounded-full {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-800' }}"> {{ $order->status }}</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>{{ $order->total_items }} items • ${{ number_format($order->total_amount, 2) }} (COD)</p>
           <ul class="list-disc pl-5 text-sm text-gray-700">
               @foreach ($order->items as $item)
                   <li>
                       {{ $item->product->name }} × {{ $item->quantity }}
                   </li>
               @endforeach
           </ul>
           </div>
          </div>
         
            @endforeach
            </div>
        </div>
       </div><!-- Customer Stats & Actions -->
       <div class="space-y-6"><!-- Customer Statistics -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Statistics</h4>
         <div class="space-y-4">
          <div class="flex justify-between items-center"><span class="text-gray-600">Total Orders:</span> <span id="customerTotalOrders" class="font-semibold text-gray-900">{{ $customer->orders->count() }}</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Total Spent:</span> <span id="customerTotalSpent" class="font-semibold text-gray-900">${{ number_format($customer->orders->sum('total_amount'), 2) }}</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Average Order:</span> <span id="customerAvgOrder" class="font-semibold text-gray-900">${{ number_format($customer->orders->avg('total_amount'), 2) }}</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Pending Orders:</span> <span id="customerPendingOrders" class="font-semibold text-gray-900"> {{ $customer->orders->where('status', 'pending')->count() }}</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Completed Orders:</span> <span id="customerCompletedOrders" class="font-semibold text-gray-900"> {{ $customer->orders->where('status', 'delivered')->count() }}</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Cancelled Orders:</span> <span id="customerCancelledOrders" class="font-semibold text-gray-900"> {{ $customer->orders->where('status', 'cancelled')->count() }}</span>
          </div>
         </div>
        </div><!-- Customer Actions -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Actions</h4>
         <div class="space-y-3">
           <a href="{{ route('admin.customers.orders', $customer->id) }}"
            class="w-full block text-center bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
            📋 View All Orders
           </a>
  <form
    action="{{ route('admin.customers.toggle-block', $customer->id) }}"
    method="POST"
    class="toggle-customer-form"
>
    @csrf
    @method('PUT')

    <button
        type="submit"
        class="
            w-full py-2 px-4 rounded-lg text-white transition-colors
            {{ $customer->is_blocked
        ? 'bg-green-600 hover:bg-green-700'
        : 'bg-red-600 hover:bg-red-700' }}
        ">

        {{ $customer->is_blocked ? '✅ Unblock Customer' : '🚫 Block Customer' }}
    </button>
</form>
         </div>
        </div>

       
        </div>
       </div>
      </div>
     </div>
@endsection
