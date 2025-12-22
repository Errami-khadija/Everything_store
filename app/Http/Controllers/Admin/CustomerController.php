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
        return view('admin.sections.customers-section', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::with('orders.items')->findOrFail($id);
        return view('admin.sections.customers-section', compact('customer'));
    }

}
