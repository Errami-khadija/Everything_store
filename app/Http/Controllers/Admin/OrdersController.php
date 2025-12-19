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
        return view('admin.sections.orders.orders-section', compact('orders'));
    }

    // Show order details
    public function show($id)
    {   
        $order = Order::with('items.product')->findOrFail($id);
        return view('admin.sections.orders.show', compact('order'));
    }

  public function updateStatus(Request $request, Order $order)
{
    $request->validate([
        'status' => 'required|in:pending,processing,delivered,cancelled'
    ]);

    //  prevent cancelling delivered orders
    if ($order->status === 'delivered') {
        return response()->json([
            'success' => false,
            'message' => 'Delivered orders cannot be cancelled'
        ], 403);
    }

    $order->update([
        'status' => $request->status
    ]);

    return response()->json(['success' => true]);
}


    // Cancel order (delete)
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Order canceled.');
    }
}
