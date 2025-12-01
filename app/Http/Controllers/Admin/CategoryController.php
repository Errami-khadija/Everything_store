<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
      public function index()
    {
        $categories = Category::all();
        $category = null; 
        return view('admin.sections.categories-section', compact('categories', 'category'));
    }
    public function create()
    {
       $category = null;
    return view('admin.sections.categories-section', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'slug'  => 'nullable|unique:categories,slug',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->only(['name', 'description', 'meta_description', 'status']);

        // slug
        $data['slug'] = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->name);

        // image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully');
    }

   public function edit(Category $category)
{
    $categories = Category::all(); 

    return view('admin.sections.categories-section', [
        'categories' => $categories,
        'selectedCategory' => $category   
    ]);
}


public function update(Request $request, Category $category)
{
    $request->validate([
        'name'  => 'required',
        'slug'  => 'nullable|unique:categories,slug,' . $category->id,
        'image' => 'nullable|image|max:2048',
        'status' => 'required|in:Active,Inactive',
    ]);

    $data = $request->only(['name', 'description', 'meta_description', 'status']);
    $data['slug'] = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);

    // Replace image if uploaded
    if ($request->hasFile('image')) {
        // Delete old image
        if ($category->image && file_exists(storage_path('app/public/categories/' . $category->image))) {
            unlink(storage_path('app/public/categories/' . $category->image));
        }
        $data['image'] = $request->file('image')->store('categories', 'public');
    }

    $category->update($data);

    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
}


    public function destroy(Category $category)
{
    // Delete image file from storage if exists
    if ($category->image && file_exists(storage_path('app/public/categories/' . $category->image))) {
        unlink(storage_path('app/public/categories/' . $category->image));
    }

    // Delete category from database
    $category->delete();

    return redirect()->back()->with('success', 'Category deleted successfully.');
}

}
