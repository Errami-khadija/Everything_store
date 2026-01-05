@include('components.admin.head')

<body class="bg-gray-50 font-sans">

@include('components.admin.aside')

<main class="lg:ml-64 min-h-full">
    @include('components.admin.header', [
    'pageTitle' => trim($__env->yieldContent('page-title')) ?: 'Dashboard',
    'pageSubtitle' => trim($__env->yieldContent('page-subtitle')) ?: 'Welcome back, Admin!'
])

    @yield('content')
</main>


 <!-- Mobile Overlay -->
  <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden"></div>
</body>
    @vite(['resources/js/dashboard.js'])
</html>
