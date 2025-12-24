<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
   public function index()
{
    $totalOrders = Order::count();

    $pendingOrders = Order::where('status', 'pending')->count();

    $totalProducts = Product::count();

    $totalRevenue = Order::where('status', 'delivered')
        ->sum('total_amount');

        $recentOrders = Order::with('customer')
        ->latest()
        ->take(5)
        ->get();

         $startOfThisWeek = Carbon::now()->startOfWeek();
    $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek();
    $endOfLastWeek   = Carbon::now()->subWeek()->endOfWeek();

    $ordersThisWeek = Order::where('created_at', '>=', $startOfThisWeek)->count();

    $ordersLastWeek = Order::whereBetween('created_at', [
        $startOfLastWeek,
        $endOfLastWeek
    ])->count();

    if ($ordersLastWeek > 0) {
        $ordersGrowth = (($ordersThisWeek - $ordersLastWeek) / $ordersLastWeek) * 100;
    } else {
        $ordersGrowth = 0;
    }

     /* ================= REVENUE ================= */
    $revenueThisWeek = Order::where('status', 'delivered')
        ->where('created_at', '>=', $startOfThisWeek)
        ->sum('total_amount');

    $revenueLastWeek = Order::where('status', 'delivered')
        ->whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])
        ->sum('total_amount');

    $revenueGrowth = $revenueLastWeek > 0
        ? (($revenueThisWeek - $revenueLastWeek) / $revenueLastWeek) * 100
        : 0;

    /* ================= PRODUCTS ================= */
    $productsThisWeek = Product::where('created_at', '>=', $startOfThisWeek)->count();

    $productsLastWeek = Product::whereBetween('created_at', [
        $startOfLastWeek,
        $endOfLastWeek
    ])->count();

    $productsGrowth = $productsLastWeek > 0
        ? (($productsThisWeek - $productsLastWeek) / $productsLastWeek) * 100
        : 0;


    /* ================= SALES DATA FOR CHART ================= */

$days = collect(range(6, 0))->map(function ($i) {
    return Carbon::now()->subDays($i)->format('Y-m-d');
});

$salesData = $days->map(function ($date) {
    return Order::where('status', 'delivered')
        ->whereDate('created_at', $date)
        ->sum('total_amount');
});

$chartLabels = $days->map(function ($date) {
    return Carbon::parse($date)->format('D');
});


    return view('admin.sections.dashboard-section', compact(
        'totalOrders',
        'pendingOrders',
        'totalProducts',
        'totalRevenue',
        'recentOrders',
        'ordersGrowth',
        'ordersThisWeek',
        'revenueThisWeek',
        'revenueGrowth',
        'productsThisWeek',
        'productsGrowth',
        'chartLabels',
        'salesData'

    ));
}
}
