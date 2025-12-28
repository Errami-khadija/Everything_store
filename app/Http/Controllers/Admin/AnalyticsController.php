<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
  

public function index()
{
    // Monthly revenue
    $monthlyRevenue = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_amount) as total')
        )
        ->where('status', 'delivered') 
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Top products
    $topProducts = DB::table('order_items')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->select(
            'products.name',
            DB::raw('SUM(order_items.quantity * order_items.price) as revenue')
        )
        ->groupBy('products.name')
        ->orderByDesc('revenue')
        ->limit(5)
        ->get();

    return view('admin.sections.analytics-section', compact('monthlyRevenue', 'topProducts'));
}

}
