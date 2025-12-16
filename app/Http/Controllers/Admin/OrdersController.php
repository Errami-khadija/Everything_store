<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrdersController extends Controller
{
    // List all orders
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.sections.orders-section', compact('orders'));
    }

    // Show order details
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.sections.orders-section', compact('order'));
    }

    // Update order status
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated.');
    }

    // Cancel order (delete)
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Order canceled.');
    }
}
