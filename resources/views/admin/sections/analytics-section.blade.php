@extends('admin.layout')

@section('content')
<!-- Analytics Section -->
   <section id="analyticsSection" class="p-6 fade-in">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
     <div class="bg-white rounded-xl shadow-sm p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Revenue Analytics</h3>
      <div class="chart-placeholder h-64">
       📈 Revenue Chart <br><small>Monthly revenue trends</small>
      </div>
     </div>
     <div class="bg-white rounded-xl shadow-sm p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Top Products</h3>
      <div class="space-y-4">
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg"><span class="font-medium">Smartphone XYZ</span> <span class="text-green-600 font-semibold">$2,340</span>
       </div>
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg"><span class="font-medium">Cotton T-Shirt</span> <span class="text-green-600 font-semibold">$1,890</span>
       </div>
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg"><span class="font-medium">Programming Book</span> <span class="text-green-600 font-semibold">$1,245</span>
       </div>
      </div>
     </div>
    </div>
   </section>
@endsection