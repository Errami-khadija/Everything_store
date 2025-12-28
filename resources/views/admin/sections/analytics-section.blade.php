@extends('admin.layout')
@section('page-title', 'Analytics')
@section('page-subtitle', 'Store performance insights')

@section('content')
<!-- Analytics Section -->
   <section id="analyticsSection" class="p-6 fade-in">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
     <div class="bg-white rounded-xl shadow-sm p-6">
       <h3 class="text-lg font-semibold text-gray-800 mb-4">
       Revenue Analytics
      </h3>

        <div class="h-64">
         <canvas id="revenueChart"></canvas>
       </div>
      </div>
     <div class="bg-white rounded-xl shadow-sm p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Top Products</h3>
      <div class="space-y-4">
         @forelse($topProducts as $product)
       <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
         <span class="font-medium">{{ $product->name }}</span> 
         <span class="text-green-600 font-semibold">${{ number_format($product->revenue, 2) }}</span>
       </div>
       @empty
         <p class="text-gray-500">No product sales yet</p>
       @endforelse
      
      </div>
     </div>
    </div>
   </section>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


   <script>
  const revenueData = @json($monthlyRevenue);

  const labels = revenueData.map(item => `Month ${item.month}`);
  const data = revenueData.map(item => item.total);

  const ctx = document.getElementById('revenueChart').getContext('2d');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Revenue ($)',
        data: data,
        borderWidth: 2,
        tension: 0.4,
        fill: false
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  });
</script>

@endsection