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

    $products = Product::with('category');  
    if ($request->filled('category_id')) {
    $products->where('category_id', $request->category_id);
}

    $products = $products->latest()->get();

    return view('admin.sections.products-section', compact('products', 'categories'));
}


  public function create()
    {
        $categories = Category::all();
        return view('admin.sections.products-section', compact('categories'));
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
        'flags' => 'array',
        'flags.*' => 'in:new,featured',

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
        'status' => $request->status,
        'flags' => $request->flags ?? [],
    ]);

    return redirect()->back()->with('success', 'Product added successfully!');
}

public function edit($id)
{
    $products = Product::all();
    $selectedProduct = Product::findOrFail($id);
    $categories = Category::all();

    return view('admin.sections.products-section', compact('products','selectedProduct' , 'categories'));
}


public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock_quantity' => 'required|integer|min:0',
        'category_id' => 'required',
        'status' => 'required|in:active,draft,inactive',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'flags' => 'array',
        'flags.*' => 'in:new,featured',
        
    ]);

    $product->name = $request->name;
    $product->price = $request->price;
    $product->stock_quantity = $request->stock_quantity;
    $product->category_id = $request->category_id;
    $product->description = $request->description;
    $product->status = $request->status;
    $product->flags = $request->flags ?? [];

   // Handle multiple images update
if ($request->hasFile('images')) {

    // Delete old images
    if (!empty($product->images)) {
        foreach ($product->images as $oldImage) {
            $path = public_path('uploads/products/' . $oldImage);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    $newImageNames = [];

    foreach ($request->file('images') as $file) {
        $imageName = time() . '_' . uniqid() . '.' . $file->extension();
        $file->move(public_path('uploads/products'), $imageName);
        $newImageNames[] = $imageName;
    }

    // Save images as array (assuming images column is JSON)
    $product->images = $newImageNames;
}

// ----------- Specifications -----------
    $keys = $request->specification_name ?? [];
    $values = $request->specification_value ?? [];

    $specifications = [];

    for ($i = 0; $i < count($keys); $i++) {
        if (!empty($keys[$i]) && !empty($values[$i])) {
            $specifications[] =  [
                'name'=>$keys[$i],
                'value'=>$values[$i]
            ];
        }
    }

    $product->specifications = $specifications; 

  
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
}


public function destroy($id)
{
    $product = Product::findOrFail($id);

    // If product has image, delete it from storage (optional)
    if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
        unlink(public_path('uploads/products/' . $product->image));
    }

    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully!');
}

}
