@extends('admin.layout')

@section('page-title', 'Products')
@section('page-subtitle', 'Manage your store products')

@section('content')

<!-- Products Section -->
   <section id="productsSection" class="p-6 fade-in"><!-- Products List View -->
    <div id="productsListView" class="bg-white rounded-xl shadow-sm">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Products Management</h3>
       <div class="flex space-x-3">
        <form method="GET" action="{{ route('admin.products.index') }}">
            <select name="category_id" onchange="this.form.submit()" 
            class="border border-gray-300 rounded-lg px-3 py-2 text-sm">

        <option value="">All Categories</option>

         @foreach ($categories as $category)
        <option value="{{ $category->id }}"
            {{ request('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
    </select>
</form>


        <button onclick="showAddProduct()" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors"> Add New Product </button>
       </div>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
         @foreach ($products as $product)
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gray-200 h-60 rounded-lg mb-4 flex items-center justify-center">
    @if (!empty($product->images) && isset($product->images[0]))
            <img src="{{ asset('uploads/products/' . $product->images[0]) }}" class="h-full w-full object-cover rounded-lg">
        @else
            <span class="text-gray-500">No image</span>
        @endif
        </div>
        <h4 class="font-semibold text-gray-800 mb-2"> {{ $product->name }}</h4>
        <p class="text-sm mb-2 {{ $product->status === 'active' ? 'text-green-600' : 'text-red-600' }}">
          {{ ucfirst($product->status) }}
         </p>

        <p class="text-gray-600 text-sm mb-2"> {{ $product->category->name ?? 'No Category' }} • Stock: {{ $product->stock_quantity ?? 0 }}</p>
        <p class="text-lg font-bold text-gray-800 mb-3">${{ number_format($product->price, 2) }}</p>
        <div class="flex space-x-2">
          <a href="{{ route('admin.products.edit', $product->id) }}" 
               class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors text-center">
              Edit
            </a>
            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="delete-product-form flex-1">
                    @csrf
                    @method('DELETE')
                    <button
                        class="w-full bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors"
                      data-id="{{ $product->id }}"
                    >
                        Delete
                    </button>
                </form>
        </div>
       </div>
         @endforeach  
       
      </div>
     </div>
    </div><!-- Add Product Form -->
    <div id="addProductView" class="bg-white rounded-xl shadow-sm hidden">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Add New Product</h3><button onclick="showProductsList()" class="text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      </div>
     </div>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
    @csrf
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8"><!-- Left Column -->
       <div class="space-y-6">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label> 
        <input type="text"  name="name" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter product name">
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Description</label> 
        <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter product description"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Price *</label> 
         <input type="number" name="price" step="0.01" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0.00">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label> 
         <input type="number" name="stock_quantity" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0">
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category *</label> 
       <select name="category_id" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
        </div>
       </div><!-- Right Column -->
       <div class="space-y-6">
         <div>
  <label class="block text-sm font-medium text-gray-700 mb-2">Product Images</label>

  <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">

    <!-- PREVIEW CONTAINER -->
    <div id="imagePreview" class="mb-4 flex gap-4 overflow-x-auto"></div>

    <div class="mt-4">
      <label class="cursor-pointer">
        
        <span class="mt-2 block text-sm font-medium text-gray-900">Upload product images</span>
        <input type="file" name="images[]" multiple accept="image/*" class="sr-only" onchange="previewProductImage(event)">
      </label>
      <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
    </div>

  </div>
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-2">Product Tags</label>

    <div class="flex items-center space-x-4">

        <!-- New checkbox -->
        <label class="inline-flex items-center">
            <input type="checkbox" name="flags[]" value="new"
                   class="rounded border-gray-300 text-blue-600"
                   @if(!empty($product) && in_array('new', $product->flags ?? [])) checked @endif>
            <span class="ml-2">New</span>
        </label>

        <!-- Featured checkbox -->
        <label class="inline-flex items-center">
            <input type="checkbox" name="flags[]" value="featured"
                   class="rounded border-gray-300 text-blue-600"
                   @if(!empty($product) && in_array('featured', $product->flags ?? [])) checked @endif>
            <span class="ml-2">Featured</span>
        </label>

    </div>
</div>


        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Specifications</label>
         <div class="space-y-3">
          <div class="flex space-x-2">
            <div id="specifications-wrapper">
                    <div class="flex space-x-2 spec-row mb-2">
                        <input type="text" name="specification_name[]" placeholder="Specification name" class="flex-1 border border-gray-300 rounded-lg px-3 py-2">
                        <input type="text" name="specification_value[]" placeholder="Value" class="flex-1 border border-gray-300 rounded-lg px-3 py-2">
                        <button type="button" onclick="this.closest('.spec-row').remove()" class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg">Delete</button>
                    </div>
                </div>
          </div>
          <button type="button" onclick="addSpecification()" class="text-blue-600 hover:text-blue-800 text-sm font-medium">+ Add Specification</button>
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Status</label>
         <div class="space-y-2"> 
                <label><input type="radio" name="status" value="active" checked> Active</label>
                <label><input type="radio" name="status" value="draft"> Draft</label>
                <label><input type="radio" name="status" value="inactive"> Inactive</label>
            </div>
         </div>
        </div>
       </div>
      <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
        <button type="button" onclick="showProductsList()" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"> Cancel </button> 
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"> Save Product </button>
      </div>
     </form>
  
    </div>

    <!-- Edit Product Form -->
   <div id="editProductView" class="bg-white rounded-xl shadow-sm hidden">
     @if(isset($selectedProduct))

    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Edit Product</h3>
        <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-800">
            ✕
        </a>
    </div>

    <form action="{{ route('admin.products.update', $selectedProduct->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="p-6">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $selectedProduct->id }}">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Left -->
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                    <input type="text" name="name" value="{{ $selectedProduct->name }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" 
                        rows="4"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ $selectedProduct->description }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
                        <input type="number" name="price" value="{{ $selectedProduct->price }}" step="0.01"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Stock *</label>
                        <input type="number" name="stock_quantity" value="{{ $selectedProduct->stock_quantity }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category_id"
        class="w-full border border-gray-300 rounded-lg px-3 py-2">

    @foreach ($categories as $category)
        <option value="{{ $category->id }}"
            {{ $selectedProduct->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach

</select>

                </div>
            </div>

            <!-- Right -->
            <div class="space-y-6">

                <!-- Preview -->
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Current Images</label>

            <div id="previewEditedImages" class="grid grid-cols-3 gap-4 mb-4">
                @foreach ($selectedProduct->images as $image)
                    <div class="bg-gray-200 h-32 rounded-lg overflow-hidden">
                        <img src="{{ asset('uploads/products/' . $image) }}"
                             class="h-full w-full object-cover">
                    </div>
                @endforeach
            </div>
  
    <div class="border-2 border-gray-400 border-dashed p-4 rounded-lg text-center">
      <label class="cursor-pointer"> 
        <span class="mt-2 block text-sm font-medium text-gray-900 p-5 ">Upload product images</span>
        <input type="file" name="images[]" multiple accept="image/*" class="sr-only"  onchange="previewEditedImages(event)">
      </label>
      <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
    </div>
    
     </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Product Specifications</label>
            <div class="space-y-3" id="specifications-wrapper-edit">
                @foreach ($selectedProduct->specifications as $specification)
                    <div class="flex space-x-2 spec-row mb-2">
                        <input type="text" name="specification_name[]" value="{{ $specification['name'] }}"
                               class="flex-1 border border-gray-300 rounded-lg px-3 py-2">
                        <input type="text" name="specification_value[]" value="{{ $specification['value'] }}"
                               class="flex-1 border border-gray-300 rounded-lg px-3 py-2">
                        <button type="button" onclick="this.closest('.spec-row').remove()"
                                class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg">Delete</button>
                    </div>
                @endforeach
                  <button type="button" onclick="addSpecificationEdit()"
                    class="text-blue-600 hover:text-blue-800 text-sm font-medium">+ Add Specification</button>
            </div>
          
        </div>

        <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Product Flags</label>

    <div class="space-y-2">

        <label class="flex items-center space-x-2">
            <input 
                type="checkbox" 
                name="flags[]" 
                value="new"
                {{ in_array('new', $selectedProduct->flags ?? []) ? 'checked' : '' }}>
            <span>New</span>
        </label>

        <label class="flex items-center space-x-2">
            <input 
                type="checkbox" 
                name="flags[]" 
                value="featured"
                {{ in_array('featured', $selectedProduct->flags ?? []) ? 'checked' : '' }}>
            <span>Featured</span>
        </label>

    </div>
</div>


                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Status</label>
                    <div class="space-y-2">
                        <label>
                            <input type="radio" name="status" value="active"
                                {{ $selectedProduct->status === 'active' ? 'checked' : '' }}>
                            Active
                        </label>
                        <label>
                            <input type="radio" name="status" value="draft"
                                {{ $selectedProduct->status === 'draft' ? 'checked' : '' }}>
                            Draft
                        </label>
                        <label>
                            <input type="radio" name="status" value="inactive"
                                {{ $selectedProduct->status === 'inactive' ? 'checked' : '' }}>
                            Inactive
                        </label>
                    </div>

            </div>

        </div>

        <button type="submit"
            class="mt-6 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Update Product
        </button>
      </div>
    </form>
 @endif

</div>

</section> 
 @endsection
 @if (isset($selectedProduct))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        showEditProduct();
    });
  </script>
@endif