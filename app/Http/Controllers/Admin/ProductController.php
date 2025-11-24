<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
     public function index(Request $request)
{
    $categories = Category::all();

    $products = Product::query();

    if ($request->has('category') && $request->category !== '') {
        $products->where('category_id', $request->category);
    }

    $products = $products->latest()->get();

    return view('admin.admin-panel', compact('products', 'categories'));
}

  public function create()
    {
        $categories = Category::all();
        return view('admin.admin-panel', compact('categories'));
    }

   public function store(Request $request)
{
    // Validate
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'stock_quantity' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|in:active,draft,inactive',
        'images.*' => 'image|max:10240',
    ]);

    // Handle images
    $imagePaths = [];
    if($request->hasFile('images')) {
        foreach($request->file('images') as $img) {
            $filename = time().'_'.$img->getClientOriginalName();
            $img->move(public_path('uploads/products'), $filename);
            $imagePaths[] = $filename;
        }
    }

    // Handle specifications
    $specs = [];
    if($request->specification_name && $request->specification_value) {
        foreach($request->specification_name as $i => $name) {
            if($name && isset($request->specification_value[$i])) {
                $specs[] = [
                    'name' => $name,
                    'value' => $request->specification_value[$i]
                ];
            }
        }
    }

    // Save product
    \App\Models\Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'stock_quantity' => $request->stock_quantity,
        'category_id' => $request->category_id,
        'images' => $imagePaths,
        'specifications' => $specs,
        'status' => $request->status
    ]);

    return redirect()->back()->with('success', 'Product added successfully!');
}
}
