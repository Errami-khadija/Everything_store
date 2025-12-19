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
         @php
            $statusClasses = [
              'pending' => 'bg-yellow-100 text-yellow-800',
              'processing' => 'bg-purple-100 text-purple-800',
              'delivered' => 'bg-green-100 text-green-800',
              'cancelled' => 'bg-red-100 text-red-800',
                      ];
          @endphp
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
         <td class="px-6 py-4 whitespace-nowrap">
          <span  class="px-3 py-1 text-sm font-semibold rounded-full {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
            {{ ucfirst($order->status) }}
        </span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> {{ $order->created_at->format('Y-m-d') }}</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
          <a href="{{ route('admin.orders.show', $order->id) }}"
             class="text-blue-600 hover:text-blue-900 mr-3">
             View
           </a>
          <button onclick="cancelOrder('ORD{{ $order->id }}')" class="text-red-600 hover:text-red-900">Cancel</button></td>
        </tr>
       @endforeach
       </tbody>
      </table>
     </div>
    </div>
    
    </div>
   </section>
   @endsection