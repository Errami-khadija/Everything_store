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
    public function index(Request $request)
    {
        $query = Order::query();

    // Filter by status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter by date range
    if ($request->filled('from')) {
        $query->whereDate('created_at', '>=', $request->from);
    }

    if ($request->filled('to')) {
        $query->whereDate('created_at', '<=', $request->to);
    }

    $orders = $query->latest()->paginate(10);

   
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
    if ($order->status === 'delivered' ) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to update status!'
        ], 403);
    }
    //  prevent update cancelled orders
     if ($order->status === 'cancelled' ) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to update status!'
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

public function export(Request $request)
{
    $query = Order::query();

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('from')) {
        $query->whereDate('created_at', '>=', $request->from);
    }

    if ($request->filled('to')) {
        $query->whereDate('created_at', '<=', $request->to);
    }

    $orders = $query->get();

    $filename = 'orders_' . now()->format('Y-m-d') . '.csv';

    $headers = [
        "Content-Type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$filename",
    ];

    $callback = function () use ($orders) {
        $file = fopen('php://output', 'w');

        // CSV header
        fputcsv($file, ['ID', 'Customer', 'Status', 'Total', 'Date']);

        foreach ($orders as $order) {
            fputcsv($file, [
                $order->id,
                $order->customer_name,
                $order->status,
                $order->total_price,
                $order->created_at->format('Y-m-d'),
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
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
