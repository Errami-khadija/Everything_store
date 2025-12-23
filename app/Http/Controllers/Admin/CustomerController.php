<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
     public function index()
    {
        $customers = \App\Models\Customer::withCount('orders')
        ->withSum('orders', 'total_amount')
        ->latest()
        ->get();
        return view('admin.sections.customers.customers-section', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::with('orders.items')->findOrFail($id);
        return view('admin.sections.customers.show', compact('customer'));
    }

    public function toggleBlock(Customer $customer)
{
    $customer->update([
        'is_blocked' => ! $customer->is_blocked
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
