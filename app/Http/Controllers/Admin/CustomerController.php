<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function index(Request $request)
{
    $query = \App\Models\Customer::withCount('orders')
        ->withSum('orders', 'total_amount')
        ->latest();

    // Apply filter
    if ($request->status) {
        if ($request->status === 'new') {
            $query->where('created_at', '>=', now()->subDays(30));
        } elseif ($request->status === 'active') {
            $query->where('is_blocked', false);
        } elseif ($request->status === 'blocked') {
            $query->where('is_blocked', true);
        }
    }

    $customers = $query->get();

    return view('admin.sections.customers.customers-section', compact('customers'));
}


    public function show($id)
    {
        $customer = Customer::with('orders.items')->findOrFail($id);
        return view('admin.sections.customers.show', compact('customer'));
    }

public function export(Request $request)
{
    $query = Customer::withCount('orders')
        ->withSum('orders', 'total_amount');

    if ($request->status) {
        if ($request->status === 'new') {
            $query->where('created_at', '>=', now()->subDays(30));
        } elseif ($request->status === 'active') {
            $query->where('is_blocked', false);
        } elseif ($request->status === 'blocked') {
            $query->where('is_blocked', true);
        }
    }

    $customers = $query->get();

    $filename = 'customers_' . now()->format('Y-m-d') . '.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=$filename",
    ];

    $callback = function () use ($customers) {
        $file = fopen('php://output', 'w');

        fputcsv($file, [
            'ID',
            'Name',
            'Phone',
            'Blocked',
            'Orders Count',
            'Total Spent',
            'Joined At'
        ]);

        foreach ($customers as $customer) {
            fputcsv($file, [
                $customer->id,
                $customer->name,
                $customer->phone,
                $customer->is_blocked ? 'Yes' : 'No',
                $customer->orders_count,
                number_format($customer->orders_sum_total_amount ?? 0, 2),
                $customer->created_at->format('Y-m-d'),
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}


public function toggleBlock(Customer $customer)
{
     $customer->update([
        'is_blocked' => ! $customer->is_blocked,
    ]);

    return back()->with('success', 'Customer status updated.');
}
    public function orders($id)
    {
        $customer = Customer::findOrFail($id);
        $orders = $customer->orders()->with('items.product')->latest()->get();

        return view('admin.sections.customers.orders', compact('customer', 'orders'));
    }


}
