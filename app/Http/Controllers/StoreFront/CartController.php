<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;

class CartController extends Controller
{
     public function add(Request $request)
    {
        $id = $request->id;

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        // If product already exists in cart → increase quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->images[0] ?? null,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            "message" => "Added to cart",
            "totalItems" => array_sum(array_column($cart, 'quantity')),
            "totalPrice" => array_sum(array_map(function($item) {
        return $item['price'] * $item['quantity'];
    }, $cart)),
            'cart' => $cart
        ]);
    }

    public function index()
    {
        $cart = session('cart', []);
        return view('shop.shop', compact('cart'));
    }

    public function update(Request $request)
{
    $cart = session()->get('cart', []);
    $id = $request->id;
    $action = $request->action; // plus | minus

    if (isset($cart[$id])) {
        if ($action === 'plus') {
            $cart[$id]['quantity']++;
        }

        if ($action === 'minus') {
            $cart[$id]['quantity']--;
            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }
        }
    }

    session()->put('cart', $cart);

    return response()->json([
        'cart' => $cart,
        'totalItems' => array_sum(array_column($cart, 'quantity')),
        'totalPrice' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
    ]);
}

public function remove(Request $request)
{
    $cart = session()->get('cart', []);
    $id = $request->id;

    if (isset($cart[$id])) {
        unset($cart[$id]);
    }

    session()->put('cart', $cart);

    return response()->json([
        'cart' => $cart,
        'totalItems' => array_sum(array_column($cart, 'quantity')),
        'totalPrice' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
    ]);
}

public function getCartJson()
{
    $cart = session()->get('cart', []);

    return response()->json([
        'cart' => $cart,
        'totalItems' => array_sum(array_column($cart, 'quantity')),
        'totalPrice' => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)),
    ]);
}

public function checkout(Request $request)
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return response()->json(['message' => 'Cart is empty'], 400);
    }

    // 0️⃣ Validate request
    $request->validate([
        'name' => 'required|string',
        'phone' => 'required|string',
        'city' => 'required|string',
        'address' => 'nullable|string',
    ]);

    // 1️⃣ Find or create customer (by phone)
    $customer = \App\Models\Customer::firstOrCreate(
        ['phone' => $request->phone],
        [
            'name' => $request->name,
            'city' => $request->city,
            'address' => $request->address,
        ]
    );

    // 2️⃣ Calculate totals
    $totalItems = array_sum(array_column($cart, 'quantity'));
    $totalAmount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

    // 3️⃣ Create order
    $order = \App\Models\Order::create([
         'customer_id' => $customer->id,
    'customer_name' => $customer->name,     
    'customer_phone' => $customer->phone,
    'customer_address' => $customer->address,    
    'city' => $customer->city,
    'total_amount' => $totalAmount,
    'total_items' => $totalItems,
    'status' => 'pending',
    ]);

    // 4️⃣ Create order items
    foreach ($cart as $item) {
        $order->items()->create([
            'product_id' => $item['id'],
            'product_name' => $item['name'],
            'product_sku' => $item['sku'] ?? null,
            'product_image' => $item['image'] ?? null,
            'quantity' => $item['quantity'],
            'price' => $item['price'],
            'total_price' => $item['price'] * $item['quantity'],
        ]);
    }

    // 5️⃣ Clear cart
    session()->forget('cart');

    return response()->json([
        'message' => 'Order placed successfully',
        'order_id' => $order->id,
        'customer_id' => $customer->id
    ]);
}



}
