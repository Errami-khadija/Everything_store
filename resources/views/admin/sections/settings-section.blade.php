@extends('layouts.admin')

@section('page-title', 'Store Settings')
@section('page-subtitle', 'Update your store configuration')


@section('content')
<!-- Settings Section -->
   <section id="settingsSection" class="p-6 fade-in">
    <div class="bg-white rounded-xl shadow-sm p-6">
     <h3 class="text-lg font-semibold text-gray-800 mb-6">Store Settings</h3>
     <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
      @csrf

      <div><label class="block text-sm font-medium text-gray-700 mb-2">Store Name</label> 
      <input type="text"
 name="store_name"
 value="{{ old('store_name', $settings->store_name ?? '') }}"
  class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Store Description</label> 
      <textarea name="store_description" rows="3"
 class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Your one-stop shop for everything you need...">
{{ old('store_description', $settings->store_description ?? '') }}
</textarea>
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Cash on Delivery Settings</label>
       <div class="space-y-3"><label class="flex items-center">
         <input type="checkbox"
 name="cash_on_delivery"
 {{ old('cash_on_delivery', $settings->cash_on_delivery ?? false) ? 'checked' : '' }}  class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">

   <span class="ml-2 text-sm text-gray-700">Enable Cash on Delivery</span> </label>
        <div class="ml-6"><label class="block text-sm font-medium text-gray-700 mb-1">Delivery Fee</label> 
        <input type="number" step="0.01"
 name="delivery_fee"
 value="{{ old('delivery_fee', $settings->delivery_fee ?? 0) }}"
 class="w-32 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

        </div>
       </div>
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Contact Information</label>
       <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
         <input type="email"
 name="store_email"
 value="{{ old('store_email', $settings->store_email ?? '') }}"
 placeholder="store@example.com"
 class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        
<input type="tel"
 name="store_phone"
 placeholder="+212-623567890"
 value="{{ old('store_phone', $settings->store_phone ?? '') }}"
class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
       
       </div>
      </div>
      <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors"> Save Settings </button>
       </form>

@if(session('success'))
 <div class="mb-4 text-green-600 font-medium">
  {{ session('success') }}
 </div>
@endif

    </div>
   </section>
@endsection