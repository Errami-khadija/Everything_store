<!-- Products Section -->
   <section id="productsSection" class="p-6 fade-in hidden"><!-- Products List View -->
    <div id="productsListView" class="bg-white rounded-xl shadow-sm">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Products Management</h3>
       <div class="flex space-x-3"><select class="border border-gray-300 rounded-lg px-3 py-2 text-sm"> <option>All Categories</option> <option>Electronics</option> <option>Clothing</option> <option>Books</option> <option>Home &amp; Garden</option> </select> <button onclick="showAddProduct()" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors"> Add New Product </button>
       </div>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gray-200 h-32 rounded-lg mb-4 flex items-center justify-center">
         📱 Product Image
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Smartphone XYZ</h4>
        <p class="text-gray-600 text-sm mb-2">Electronics • Stock: 25</p>
        <p class="text-lg font-bold text-gray-800 mb-3">$299.99</p>
        <div class="flex space-x-2"><button onclick="editProduct('smartphone')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteProduct('smartphone')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gray-200 h-32 rounded-lg mb-4 flex items-center justify-center">
         👕 Product Image
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Cotton T-Shirt</h4>
        <p class="text-gray-600 text-sm mb-2">Clothing • Stock: 150</p>
        <p class="text-lg font-bold text-gray-800 mb-3">$24.99</p>
        <div class="flex space-x-2"><button onclick="editProduct('tshirt')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteProduct('tshirt')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
       <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
        <div class="bg-gray-200 h-32 rounded-lg mb-4 flex items-center justify-center">
         📚 Product Image
        </div>
        <h4 class="font-semibold text-gray-800 mb-2">Programming Book</h4>
        <p class="text-gray-600 text-sm mb-2">Books • Stock: 8</p>
        <p class="text-lg font-bold text-gray-800 mb-3">$39.99</p>
        <div class="flex space-x-2"><button onclick="editProduct('book')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded text-sm hover:bg-blue-700 transition-colors">Edit</button> <button onclick="deleteProduct('book')" class="flex-1 bg-red-600 text-white py-2 px-3 rounded text-sm hover:bg-red-700 transition-colors">Delete</button>
        </div>
       </div>
      </div>
     </div>
    </div><!-- Add/Edit Product Form -->
    <div id="addProductView" class="bg-white rounded-xl shadow-sm hidden">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Add New Product</h3><button onclick="showProductsList()" class="text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      </div>
     </div>
     <form onsubmit="saveProduct(event)" class="p-6">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8"><!-- Left Column -->
       <div class="space-y-6">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label> <input type="text" id="productName" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter product name">
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Description</label> <textarea id="productDescription" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter product description"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Price *</label> <input type="number" id="productPrice" step="0.01" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0.00">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label> <input type="number" id="productStock" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0">
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Category *</label> <select id="productCategory" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> <option value="">Select Category</option> <option value="electronics">Electronics</option> <option value="clothing">Clothing</option> <option value="books">Books</option> <option value="home-garden">Home &amp; Garden</option> <option value="sports">Sports &amp; Outdoors</option> <option value="beauty">Beauty &amp; Health</option> </select>
        </div>
       </div><!-- Right Column -->
       <div class="space-y-6">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Images</label>
         <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">
          <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewbox="0 0 48 48"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <div class="mt-4"><label class="cursor-pointer"> <span class="mt-2 block text-sm font-medium text-gray-900">Upload product images</span> <input type="file" class="sr-only" multiple accept="image/*"> </label>
           <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 10MB each</p>
          </div>
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Specifications</label>
         <div class="space-y-3">
          <div class="flex space-x-2"><input type="text" placeholder="Specification name" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> <input type="text" placeholder="Value" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> <button type="button" class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg></button>
          </div><button type="button" onclick="addSpecification()" class="text-blue-600 hover:text-blue-800 text-sm font-medium">+ Add Specification</button>
         </div>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Product Status</label>
         <div class="space-y-2"><label class="flex items-center"> <input type="radio" name="productStatus" value="active" checked class="text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Active</span> </label> <label class="flex items-center"> <input type="radio" name="productStatus" value="draft" class="text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Draft</span> </label> <label class="flex items-center"> <input type="radio" name="productStatus" value="inactive" class="text-blue-600 focus:ring-blue-500"> <span class="ml-2 text-sm text-gray-700">Inactive</span> </label>
         </div>
        </div>
       </div>
      </div>
      <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200"><button type="button" onclick="showProductsList()" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"> Cancel </button> <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"> Save Product </button>
      </div>
     </form>
    </div>
   </section>