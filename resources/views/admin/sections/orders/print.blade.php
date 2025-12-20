<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order #{{ $order->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @media print {
            button { display: none; }
        }
    </style>
</head>
<body class="bg-white p-8">

    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">Order #{{ $order->id }}</h1>
            <button onclick="window.print()" class="bg-green-600 text-white px-4 py-2 rounded">
                🖨️ Print
            </button>
        </div>

        <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
        <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

        <hr class="my-6">

        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Product</th>
                    <th class="border p-2">Price</th>
                    <th class="border p-2">Qty</th>
                    <th class="border p-2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td class="border p-2">{{ $item->product_name }}</td>
                    <td class="border p-2">${{ $item->price }}</td>
                    <td class="border p-2">{{ $item->quantity }}</td>
                    <td class="border p-2">
                        ${{ $item->price * $item->quantity }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6 text-right space-y-1">
            <p>Subtotal: <strong>${{ number_format($subtotal, 2) }}</strong></p>
            <p>Delivery: <strong>${{ number_format($deliveryFee, 2) }}</strong></p>
            <p class="text-lg">Total:
                <strong>${{ number_format($total, 2) }}</strong>
            </p>
        </div>
    </div>

    <script>
        window.onload = () => window.print();
    </script>
</body>
</html>
