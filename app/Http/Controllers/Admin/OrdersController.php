<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

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
         $subtotal = $order->items->sum(function ($item) {
           return $item->price * $item->quantity;
             });

        $deliveryFee = 5;
        $total = $subtotal + $deliveryFee;
        return view('admin.sections.orders.show', compact('order', 'subtotal', 'deliveryFee', 'total'));
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


public function print(Order $order)
{
    $order->load('items');

    $subtotal = $order->items->sum(fn($item) =>
        $item->price * $item->quantity
    );

    $deliveryFee = 5;
    $total = $subtotal + $deliveryFee;

    return view('admin.sections.orders.print', compact(
        'order',
        'subtotal',
        'deliveryFee',
        'total'
    ));
}

public function invoice(Order $order)
{
    $order->load('items');

    $subtotal = $order->items->sum(fn ($item) =>
        $item->price * $item->quantity
    );

    $deliveryFee = 5;
    $total = $subtotal + $deliveryFee;

    $pdf = Pdf::loadView('admin.sections.orders.invoice', compact(
        'order',
        'subtotal',
        'deliveryFee',
        'total'
    ));

    return $pdf->download('order-'.$order->id.'.pdf');
}



   public function cancel(Order $order)
{
    if ($order->status === 'cancelled') {
        return response()->json(['message' => 'Order already cancelled'], 400);
    }

    $order->update([
        'status' => 'cancelled'
    ]);

    return response()->json([
        'message' => 'Order cancelled successfully'
    ]);
}

}
