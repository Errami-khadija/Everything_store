@extends('admin.layout')

@section('content')
<!-- Settings Section -->
   <section id="settingsSection" class="p-6 fade-in">
    <div class="bg-white rounded-xl shadow-sm p-6">
     <h3 class="text-lg font-semibold text-gray-800 mb-6">Store Settings</h3>
     <div class="space-y-6">
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Store Name</label> <input type="text" value="Everything Store" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Store Description</label> <textarea rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Your one-stop shop for everything you need..."></textarea>
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Cash on Delivery Settings</label>
       <div class="space-y-3"><label class="flex items-center"> <input type="checkbox" checked class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Enable Cash on Delivery</span> </label>
        <div class="ml-6"><label class="block text-sm font-medium text-gray-700 mb-1">Delivery Fee</label> <input type="number" value="5.00" class="w-32 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
       </div>
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Contact Information</label>
       <div class="grid grid-cols-1 md:grid-cols-2 gap-4"><input type="email" placeholder="store@example.com" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> <input type="tel" placeholder="+1 (555) 123-4567" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
       </div>
      </div><button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors"> Save Settings </button>
     </div>
    </div>
   </section>
@endsection