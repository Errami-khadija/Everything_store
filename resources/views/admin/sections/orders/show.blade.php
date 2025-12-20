@extends('admin.layout')

@section('content')
<!-- Order Details View -->
    <div id="orderDetailsView" class="bg-white rounded-xl shadow-sm ">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <div>
        <h3 class="text-lg font-semibold text-gray-800">Order Details</h3>
        <p class="text-sm text-gray-600 mt-1">Order #<span id="orderDetailId">ORD{{ $order->id }}</span></p>
       </div>
       <a href="{{ route('admin.orders.index') }}" class="text-gray-600 hover:text-gray-800">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </a>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8"><!-- Order Information -->
       <div class="lg:col-span-2 space-y-6"><!-- Customer Information -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Information</h4>
         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
           <p class="text-gray-900">{{ $order->customer_name }}</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
           <p class="text-gray-900">{{ $order->customer_phone }}</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Order Date</label>
           <p class="text-gray-900">{{ $order->created_at->format('F j, Y') }}</p>
          </div>
         </div>
        </div><!-- Delivery Address -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Delivery Address</h4>
         <div class="space-y-2">
          <p class="text-gray-900">{{ $order->customer_address }}</p>
          
         </div>
        </div><!-- Order Items -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Order Items</h4>
         @foreach($order->items as $item)
         <div class="space-y-4"> 
          <div class="flex items-center justify-between p-4 bg-white rounded-lg">
           <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
              <img 
                src="{{ asset('uploads/products/' . $item->product_image) }}" 
                alt="{{ $item->product->name }}"
                class="w-full h-full object-cover"
               >
            </div>
            <div>
             <h5 class="font-medium text-gray-900">{{ $item->product->name }}</h5>
             <p class="text-sm text-gray-600">SKU: {{ $item->product->sku }}</p>
             <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
            </div>
           </div>
           <div class="text-right">
            <p class="font-semibold text-gray-900">${{ $item->price * $item->quantity }}</p>
           </div>
          </div>
         </div>
         @endforeach
        </div>
       </div><!-- Order Summary & Actions -->
         @php
             $statusClasses = [
               'pending' => 'bg-yellow-100 text-yellow-800',
               'processing' => 'bg-purple-100 text-purple-800',
               'delivered' => 'bg-green-100 text-green-800',
               'cancelled' => 'bg-red-100 text-red-800',
             ];
         @endphp
     
       <div class="space-y-6"><!-- Order Status -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Order Status</h4>
         <div class="space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-sm text-gray-600">Current Status:</span> 
            <span 
              id="orderStatusBadge"
            class="px-3 py-1 text-sm font-semibold rounded-full {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
            {{ ucfirst($order->status) }}
           </span>
          </div>
          <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Update Status</label> 
           <select 
               id="orderStatusUpdate" 
               data-order-id="{{ $order->id }}"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
               >
               
               @foreach(['pending', 'processing', 'delivered', 'cancelled'] as $status)
                 <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                   {{ ucfirst($status) }}
                 </option>
               @endforeach
             </select>

              <button onclick="updateOrderStatus()" class="w-full mt-3 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors"> Update Status </button>
          </div>
         </div>
        </div><!-- Order Summary -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Order Summary</h4>
         <div class="space-y-3">
          <div class="flex justify-between">
            <span class="text-gray-600">Subtotal:</span> 
            <span class="text-gray-900">  ${{ number_format($subtotal, 2) }}</span>
          </div>
          <div class="flex justify-between">
            <span class="text-gray-600">Delivery Fee:</span> 
            <span class="text-gray-900">  ${{ number_format($deliveryFee, 2) }}</span>
          </div>
          <hr class="border-gray-300">
          <div class="flex justify-between font-semibold text-lg">
            <span class="text-gray-900">Total:</span> 
            <span class="text-gray-900"> ${{ number_format($total, 2) }}</span>
          </div>
          <div class="mt-2"><span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800"> 💰 Cash on Delivery </span>
          </div>
         </div>
        </div><!-- Quick Actions -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h4>
         <div class="space-y-3">
          <button  onclick="downloadInvoice({{ $order->id }})" 
                   class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors"> 🖨️ Download Invoice </button> 
          <button  onclick="sendSMS({{ $order->id }})"
           class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors"> 📱 Send SMS Update </button> 
            <!-- Cancel (only if allowed) -->
            @if(!in_array($order->status, ['cancelled', 'delivered']))
           <button onclick="cancelOrder({{ $order->id }})" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors"> ❌ Cancel Order </button>
             @endif
        </div>
       </div>
      </div>
    </div>
 @endsection