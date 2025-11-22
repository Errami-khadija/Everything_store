 <!-- Customers Section -->
   <section id="customersSection" class="p-6 fade-in hidden"><!-- Customers List View -->
    <div id="customersListView" class="bg-white rounded-xl shadow-sm">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <h3 class="text-lg font-semibold text-gray-800">Customers Management</h3>
       <div class="flex space-x-3"><select id="customerStatusFilter" class="border border-gray-300 rounded-lg px-3 py-2 text-sm"> <option value="">All Customers</option> <option value="active">Active</option> <option value="blocked">Blocked</option> <option value="new">New (Last 30 days)</option> </select> <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors"> Export Customers </button>
       </div>
      </div>
     </div>
     <div class="overflow-x-auto">
      <table class="w-full">
       <thead class="bg-gray-50">
        <tr>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Spent</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Join Date</th>
         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
       </thead>
       <tbody class="bg-white divide-y divide-gray-200">
        <tr id="customer-john">
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
           <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
            JD
           </div>
           <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">
             John Doe
            </div>
            <div class="text-sm text-gray-500">
             Premium Customer
            </div>
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="text-sm text-gray-900">
           john@example.com
          </div>
          <div class="text-sm text-gray-500">
           +1 (555) 123-4567
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">5 orders</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$567.50</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Dec 1, 2023</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewCustomer('john')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="blockCustomer('john')" class="text-red-600 hover:text-red-900">Block</button></td>
        </tr>
        <tr id="customer-jane">
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
           <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-semibold">
            JS
           </div>
           <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">
             Jane Smith
            </div>
            <div class="text-sm text-gray-500">
             Regular Customer
            </div>
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="text-sm text-gray-900">
           jane@example.com
          </div>
          <div class="text-sm text-gray-500">
           +1 (555) 987-6543
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3 orders</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$234.75</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jan 5, 2024</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewCustomer('jane')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="blockCustomer('jane')" class="text-red-600 hover:text-red-900">Block</button></td>
        </tr>
        <tr id="customer-mike">
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
           <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
            MJ
           </div>
           <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">
             Mike Johnson
            </div>
            <div class="text-sm text-gray-500">
             New Customer
            </div>
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="text-sm text-gray-900">
           mike@example.com
          </div>
          <div class="text-sm text-gray-500">
           +1 (555) 456-7890
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1 order</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$89.99</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jan 18, 2024</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewCustomer('mike')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="blockCustomer('mike')" class="text-red-600 hover:text-red-900">Block</button></td>
        </tr>
        <tr id="customer-sarah" class="opacity-60">
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
           <div class="w-10 h-10 bg-gray-500 rounded-full flex items-center justify-center text-white font-semibold">
            SW
           </div>
           <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">
             Sarah Wilson
            </div>
            <div class="text-sm text-gray-500">
             Blocked Customer
            </div>
           </div>
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap">
          <div class="text-sm text-gray-900">
           sarah@example.com
          </div>
          <div class="text-sm text-gray-500">
           +1 (555) 321-0987
          </div></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2 orders</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$156.25</td>
         <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Blocked</span></td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Nov 15, 2023</td>
         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><button onclick="viewCustomer('sarah')" class="text-blue-600 hover:text-blue-900 mr-3">View</button> <button onclick="unblockCustomer('sarah')" class="text-green-600 hover:text-green-900">Unblock</button></td>
        </tr>
       </tbody>
      </table>
     </div>
    </div><!-- Customer Details View -->
    <div id="customerDetailsView" class="bg-white rounded-xl shadow-sm hidden">
     <div class="p-6 border-b border-gray-200">
      <div class="flex items-center justify-between">
       <div>
        <h3 class="text-lg font-semibold text-gray-800">Customer Details</h3>
        <p class="text-sm text-gray-600 mt-1">Customer ID: <span id="customerDetailId">CUST-001</span></p>
       </div><button onclick="showCustomersList()" class="text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      </div>
     </div>
     <div class="p-6">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8"><!-- Customer Information -->
       <div class="lg:col-span-2 space-y-6"><!-- Personal Information -->
        <div class="bg-gray-50 rounded-lg p-6">
         <div class="flex items-center justify-between mb-4">
          <h4 class="text-lg font-semibold text-gray-800">Personal Information</h4>
          <div id="customerStatusBadge" class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
           Active
          </div>
         </div>
         <div class="flex items-center mb-6">
          <div id="customerAvatar" class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-semibold mr-4">
           JD
          </div>
          <div>
           <h5 id="customerName" class="text-xl font-semibold text-gray-900">John Doe</h5>
           <p id="customerType" class="text-gray-600">Premium Customer</p>
          </div>
         </div>
         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
           <p id="customerEmail" class="text-gray-900">john@example.com</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
           <p id="customerPhone" class="text-gray-900">+1 (555) 123-4567</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Join Date</label>
           <p id="customerJoinDate" class="text-gray-900">December 1, 2023</p>
          </div>
          <div><label class="block text-sm font-medium text-gray-700 mb-1">Last Order</label>
           <p id="customerLastOrder" class="text-gray-900">January 15, 2024</p>
          </div>
         </div>
        </div><!-- Delivery Addresses -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Delivery Addresses</h4>
         <div class="space-y-4">
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2"><span class="font-medium text-gray-900">Home Address</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Primary</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>123 Main Street, Apt 4B</p>
            <p>New York, NY 10001</p>
            <p>United States</p>
           </div>
          </div>
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2"><span class="font-medium text-gray-900">Office Address</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Secondary</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>456 Business Ave, Suite 200</p>
            <p>New York, NY 10002</p>
            <p>United States</p>
           </div>
          </div>
         </div>
        </div><!-- Order History -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Recent Orders</h4>
         <div class="space-y-4">
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2">
            <div><span class="font-medium text-gray-900">#ORD-001</span> <span class="text-sm text-gray-500 ml-2">January 15, 2024</span>
            </div><span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>3 items • $125.00 (COD)</p>
            <p>Smartphone XYZ, Cotton T-Shirt (x2)</p>
           </div>
          </div>
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2">
            <div><span class="font-medium text-gray-900">#ORD-045</span> <span class="text-sm text-gray-500 ml-2">December 28, 2023</span>
            </div><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>2 items • $189.50 (COD)</p>
            <p>Programming Book, Wireless Headphones</p>
           </div>
          </div>
          <div class="bg-white rounded-lg p-4 border border-gray-200">
           <div class="flex items-center justify-between mb-2">
            <div><span class="font-medium text-gray-900">#ORD-032</span> <span class="text-sm text-gray-500 ml-2">December 10, 2023</span>
            </div><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
           </div>
           <div class="text-sm text-gray-600">
            <p>1 item • $253.00 (COD)</p>
            <p>Gaming Keyboard</p>
           </div>
          </div>
         </div><button class="w-full mt-4 text-blue-600 hover:text-blue-800 text-sm font-medium">View All Orders</button>
        </div>
       </div><!-- Customer Stats & Actions -->
       <div class="space-y-6"><!-- Customer Statistics -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Statistics</h4>
         <div class="space-y-4">
          <div class="flex justify-between items-center"><span class="text-gray-600">Total Orders:</span> <span id="customerTotalOrders" class="font-semibold text-gray-900">5</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Total Spent:</span> <span id="customerTotalSpent" class="font-semibold text-gray-900">$567.50</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Average Order:</span> <span id="customerAvgOrder" class="font-semibold text-gray-900">$113.50</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Pending Orders:</span> <span id="customerPendingOrders" class="font-semibold text-gray-900">1</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Completed Orders:</span> <span id="customerCompletedOrders" class="font-semibold text-gray-900">4</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Cancelled Orders:</span> <span id="customerCancelledOrders" class="font-semibold text-gray-900">0</span>
          </div>
         </div>
        </div><!-- Customer Actions -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Actions</h4>
         <div class="space-y-3"><button onclick="sendCustomerEmail()" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors"> 📧 Send Email </button> <button onclick="sendCustomerSMS()" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors"> 📱 Send SMS </button> <button onclick="viewCustomerOrders()" class="w-full bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition-colors"> 📋 View All Orders </button> <button id="blockUnblockBtn" onclick="toggleCustomerBlock()" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors"> 🚫 Block Customer </button>
         </div>
        </div><!-- Customer Notes -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Customer Notes</h4><!-- Current Saved Notes Display -->
         <div id="currentCustomerNotes" class="mb-4 p-3 bg-white border border-gray-200 rounded-lg">
          <div class="flex items-center justify-between mb-2"><span class="text-sm font-medium text-gray-700">Current Notes:</span> <span class="text-xs text-gray-500">Last updated: Jan 10, 2024</span>
          </div>
          <p class="text-gray-900 text-sm">Premium customer with excellent payment history. Prefers COD delivery. Usually orders electronics and books.</p>
         </div><!-- Edit Notes Section -->
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Update Notes:</label> <textarea id="customerNotesInput" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Add notes about this customer...">Premium customer with excellent payment history. Prefers COD delivery. Usually orders electronics and books.</textarea> <button onclick="saveCustomerNotes()" class="w-full mt-3 bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors"> Save Notes </button>
         </div>
        </div><!-- Customer Preferences -->
        <div class="bg-gray-50 rounded-lg p-6">
         <h4 class="text-lg font-semibold text-gray-800 mb-4">Preferences</h4>
         <div class="space-y-3">
          <div class="flex justify-between items-center"><span class="text-gray-600">Preferred Payment:</span> <span class="font-semibold text-gray-900">Cash on Delivery</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Email Notifications:</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Enabled</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">SMS Notifications:</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Enabled</span>
          </div>
          <div class="flex justify-between items-center"><span class="text-gray-600">Marketing Emails:</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Disabled</span>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </section>