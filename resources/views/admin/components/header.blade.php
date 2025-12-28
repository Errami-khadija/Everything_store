<!-- Header -->
   <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
    <div class="flex items-center justify-between">
     <div>
      <h2 id="pageTitle" class="text-2xl font-semibold text-gray-800"> {{ $pageTitle }}</h2>
      <p id="welcomeMessage" class="text-gray-600 mt-1"> {{ $pageSubtitle }}</p>
     </div>
     <div class="flex items-center space-x-4">
      <div class="relative">
      <button id="notificationBtn" onclick="toggleNotifications()" class="relative p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4 19h6v-2H4v2zM4 15h8v-2H4v2zM4 11h10V9H4v2z" />
        </svg>
        @if($unreadCount > 0)
<span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
  {{ $unreadCount }}
</span>
@endif
        </button> 
        <!-- Notifications Dropdown -->
       <div id="notificationsDropdown" class="absolute right-0 top-full mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-200 z-50 hidden">
        <div class="p-4 border-b border-gray-200">
         <div class="flex items-center justify-between">
          <h3 class="text-lg font-semibold text-gray-800">Notifications</h3>
          <form method="POST" action="{{ route('admin.notifications.read') }}">
 @csrf
 <button class="text-sm text-blue-600 hover:text-blue-800">
   Mark all as read
 </button>
</form>

         </div>
        </div>
        <div class="max-h-96 overflow-y-auto">
       @forelse($notifications ?? collect() as $notification)

<div class="p-4 border-b hover:bg-gray-50 cursor-pointer
     {{ $notification->read_at ? 'opacity-60' : '' }}"
     onclick="window.location='{{ $notification->data['url'] ?? '#' }}'">

  <p class="text-sm font-medium text-gray-900">
    {{ $notification->data['title'] }}
  </p>

  <p class="text-sm text-gray-600">
    {{ $notification->data['message'] }}
  </p>

  <p class="text-xs text-gray-500 mt-1">
    {{ $notification->created_at->diffForHumans() }}
  </p>
</div>
@empty
<p class="p-4 text-sm text-gray-500">No notifications</p>
@endforelse

   
        </div>
        <div class="p-4 border-t border-gray-200">
        <button onclick="viewAllNotifications()" class="w-full text-center text-sm text-blue-600 hover:text-blue-800 font-medium"> View All Notifications </button>
        </div>
       </div>
      </div>
      <div class="flex items-center space-x-3">
       <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
        A
       </div><span class="text-gray-700 font-medium">Admin</span>
      </div>
     </div>
    </div>
   </header>