<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;  

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class HomeController extends Controller
{
    public function index()
{
    $categories = Category::where('status', 'active')
                          ->withCount('products')
                          ->get();

     $products = Product::where('status', 'active')
                       ->with('category')
                       ->latest()
                       ->get();
    $newProducts = Product::where('status', 'active')
    ->whereJsonContains('flags', 'new')
    ->with('category')
    ->latest()
    ->get();

    $featuredProducts = Product::where('status', 'active')
    ->whereJsonContains('flags', 'featured')
    ->with('category')
    ->latest()
    ->get();

    return view('storeFront.index', compact('categories','products','newProducts','featuredProducts'));
}
}
