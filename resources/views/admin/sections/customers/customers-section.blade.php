@extends('admin.layout')

@section('content')
 <!-- Customers Section -->
   <section id="customersSection" class="p-6 fade-in "><!-- Customers List View -->
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
        @foreach($customers as $customer)
        <tr id="customer-{{ $customer->id }}">
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
           <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
           {{ strtoupper(substr($customer->name,0,1) . substr(explode(' ', $customer->name)[1] ?? '',0,1)) }}
           </div>
           <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">
            {{ $customer->name }}
            </div>
            <div class="text-sm text-gray-500">
               {{ $customer->orders_count > 5 ? 'Premium Customer' : 'Regular Customer' }}
            </div>
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap">
         
          <div class="text-sm text-gray-500">
           {{ $customer->phone }}
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> {{ $customer->orders_count }} orders</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($customer->orders_sum_total_amount ?? 0, 2) }}</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> {{ $customer->created_at->format('M d, Y') }}</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
           <a href="{{ route('admin.customers.show', $customer->id) }}"
             class="text-blue-600 hover:text-blue-900 mr-3">
                 View 
            </a>
        <button onclick="blockCustomer('sarah')" class="text-red-600 hover:text-red-900">Block</button></td>
        </tr>
        @endforeach
       </tbody>
      </table>
     </div>
    </div>
    </div>
   </section>
@endsection