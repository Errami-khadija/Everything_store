<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f3f3f3; }
        .text-right { text-align: right; }
    </style>
</head>
<body>

    <h2>Order #{{ $order->id }}</h2>

    <p>
        <strong>Customer:</strong> {{ $order->customer_name }} <br>
        <strong>Phone:</strong> {{ $order->customer_phone }} <br>
        <strong>Status:</strong> {{ ucfirst($order->status) }}
    </p>

    <hr>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    ${{ number_format($item->price * $item->quantity, 2) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <p class="text-right">Subtotal: <strong>${{ number_format($subtotal, 2) }}</strong></p>
    <p class="text-right">Delivery: <strong>${{ number_format($deliveryFee, 2) }}</strong></p>
    <p class="text-right">Total: <strong>${{ number_format($total, 2) }}</strong></p>

</body>
</html>
