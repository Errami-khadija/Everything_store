@extends('admin.layout')

@section('content')

<!-- Categories Section -->
   <section id="categoriesSection" class="p-6 fade-in "><!-- Categories List View -->
    <div id="categoriesListView" class="bg-white rounded-xl shadow-sm">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Categories Management</h3>
       <div class="flex space-x-3"><button onclick="showAddCategory()" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors"> Add New Category </button>
       </div>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">


      @foreach ($categories as $category)
    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">

        {{-- CATEGORY IMAGE --}}
        <div class="h-60 rounded-lg mb-4 bg-cover bg-center"
             style="background-image: url('{{ asset('storage/' . $category->image) }}');">
        </div>

        {{-- CATEGORY NAME --}}
        <h4 class="font-semibold text-gray-800 mb-2">
            {{ $category->name }}
        </h4>

        {{-- STATUS --}}
        <p class="text-sm mb-2 
            {{ $category->status === 'Active' ? 'text-green-600' : 'text-red-600' }}">
            {{ ucfirst($category->status) }}
        </p>

        {{-- DESCRIPTION --}}
        <p class="text-xs text-gray-500 mb-3">
            {{ $category->description ?? 'No description available.' }}
        </p>

        {{-- BUTTONS --}}
        <div class="flex space-x-2">
            <a href="{{ route('admin.categories.edit', $category->id) }}" 
               class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors text-center">
              Edit
            </a>


            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"  class="delete-category-form flex-1">
               @csrf
               @method('DELETE')
               <button type="submit" class="w-full bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">
                   Delete
               </button>
           </form>
        </div>

    </div>
@endforeach

      </div>
     </div>
    </div><!-- Add Category Form -->
    <div id="addCategoryView" class="bg-white rounded-xl shadow-sm hidden">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Add New Category</h3>
       <button onclick="showCategoriesList()" class="text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      </div>
     </div>
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
     @csrf
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8"><!-- Left Column -->
       <div class="space-y-6">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label> 
        <input type="text" name="name" id="categoryName" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter category name">
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Description</label> 
        <textarea id="categoryDescription"  name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter category description"></textarea>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Category Image</label>
         <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">
          <div id="categoryPreview" class="mb-4">
           <div class="w-32 h-32 mx-auto bg-linear-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center text-white text-6xl">
            📱
           </div>
          </div>
          <div class="mt-4">
            <label class="cursor-pointer">
             <span class="mt-2 block text-sm font-medium text-gray-900">Upload category image</span>
              <input type="file" name="image" class="sr-only" accept="image/*" onchange="previewCategoryImage(event)"> 
            </label>
           <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
           
          </div>
         </div>
        </div>
        
        </div>
       
       </div><!-- Right Column -->
       <div class="space-y-6">
      
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category Status</label>
         <div class="space-y-2">
          <label class="flex items-center"> 
            <input type="radio" name="status" value="Active" checked class="text-blue-600 focus:ring-blue-500">
             <span class="ml-2 text-sm text-gray-700">Active</span> 
            </label>
             <label class="flex items-center">
               <input type="radio" name="status" value="Inactive" class="text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Inactive</span> </label>
         </div>
        </div>
       
        <div><label class="block text-sm font-medium text-gray-700 mb-2">SEO Settings</label>
         <div class="space-y-3">
          <input type="text" id="categorySlug" name="slug" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="category-url-slug"> 
          <textarea id="categoryMetaDescription" name="meta_description" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Meta description for SEO"></textarea>
         </div>
        </div>
       </div>
      </div>
      <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
        <button type="button" onclick="showCategoriesList()"  class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"> Cancel </button> 
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"> Save Category </button>
      </div>
     </form>
    </div>

    <!-- Edit Category Form -->
<div id="editCategoryView" class="bg-white rounded-xl shadow-sm hidden">
     @if(isset($selectedCategory))

    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Edit Category</h3>
        <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-800">
            ✕
        </a>
    </div>
  
    <form action="{{ route('admin.categories.update', $selectedCategory->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-6">

                <!-- Category Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label>
                    <input type="text"
                           name="name"
                           value="{{ $selectedCategory->name }}"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description"
                              rows="4"
                              class="w-full border rounded-lg px-3 py-2">{{ $selectedCategory->description }}</textarea>
                </div>

                <!-- Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Current Image</label>

                    <img src="{{ asset('storage/' . $selectedCategory->image) }}"
                         class="w-32 h-32 object-cover rounded-lg mb-3">
                  <div class="border-2 border-gray-400 border-dashed p-4 rounded-lg text-center">
                    <label class="cursor-pointer">
                        <span class="mt-2 block text-sm font-medium text-gray-900 p-5 ">Replace images</span>
                        <input type="file" name="image" accept="image/*" class="sr-only">
                    </label>
                     <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>

                    
                </div>

               </div>
     </div>

        

            <!-- Right column -->
            <div class="space-y-6">

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category Status</label>
                    <label class="flex items-center">
                        <input type="radio" name="status" value="Active"
                               {{ $selectedCategory->status == 'Active' ? 'checked' : '' }}>
                        <span class="ml-2">Active</span>
                    </label>

                    <label class="flex items-center">
                        <input type="radio" name="status" value="Inactive"
                               {{ $selectedCategory->status == 'Inactive' ? 'checked' : '' }}>
                        <span class="ml-2">Inactive</span>
                    </label>
                </div>

                <!-- SEO -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">SEO Settings</label>
                    <input type="text" name="slug"
                           value="{{ $selectedCategory->slug }}"
                           class="w-full border rounded px-3 py-2 mb-3">

                    <textarea name="meta_description"
                              rows="2"
                              class="w-full border rounded px-3 py-2">{{ $selectedCategory->meta_description }}</textarea>
                </div>

            </div>
       </div>
     


        <!-- Buttons -->
        <div class="flex justify-end space-x-4 border-t pt-6 mt-6">
            <a href="{{ route('admin.categories.index') }}"
               class="px-6 py-2 border rounded-lg">Cancel</a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg">
                Update Category
            </button>
        </div>

    </form>
    @endif

</div>

</section>
 @endsection

@if (isset($selectedCategory))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        showEditCategory();
    });
  </script>
@endif
