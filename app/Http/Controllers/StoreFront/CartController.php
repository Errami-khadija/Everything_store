<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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

    // 1. Create order
$totalItems = array_sum(array_column($cart, 'quantity'));
$order = new \App\Models\Order();
$order->customer_name = $request->name;
$order->customer_phone = $request->phone;
$order->customer_address = $request->address;
$order->total_amount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
$order->total_items = $totalItems;
$order->status = 'pending'; // default status
$order->save();

    // 2. Create order items
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
    // 3. Clear cart
    session()->forget('cart');

    return response()->json(['message' => 'Order placed successfully']);
}


}
