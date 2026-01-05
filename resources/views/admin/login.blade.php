<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ $settings->store_name ?? 'Everything Store' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('/admin/login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 font-medium" for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="admin@example.com"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label class="block mb-1 font-medium" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition duration-300 font-semibold">
                Login
            </button>
        </form>

        <p class="text-center text-gray-500 text-sm mt-4">&copy; 2025 {{ $settings->store_name ?? 'Everything Store' }} Store</p>
    </div>

</body>
</html>
