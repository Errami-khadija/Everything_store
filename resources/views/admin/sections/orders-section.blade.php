@extends('admin.layout')

@section('content')

<!-- Orders Section -->
   <section id="ordersSection" class="p-6 fade-in "><!-- Orders List View -->
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
        @foreach($orders as $order)
        <tr>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD{{ $order->id }}</td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div>
           <div class="text-sm font-medium text-gray-900">
            {{ $order->customer_name }}
           </div>
           
           <div class="text-sm text-gray-500">
            📞 {{ $order->customer_phone }}
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->total_items ?? '—' }} Items</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ $order->total_amount }}(COD)</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full
        @if($order->status == 'pending') bg-yellow-100 text-yellow-800
        @elseif($order->status == 'delivered') bg-green-100 text-green-800
        @elseif($order->status == 'processing') bg-blue-100 text-blue-800
        @else bg-gray-100 text-gray-800 @endif">
            {{ ucfirst($order->status) }}
        </span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> {{ $order->created_at->format('Y-m-d') }}</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewOrder('ORD{{ $order->id }}')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="processOrder('ORD{{ $order->id }}')" class="text-green-600 hover:text-green-900 mr-3">Process</button> <button onclick="cancelOrder('ORD{{ $order->id }}')" class="text-red-600 hover:text-red-900">Cancel</button></td>
        </tr>
       @endforeach
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
   </section>
   @endsection