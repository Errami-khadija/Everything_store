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
            'cart' => $cart
        ]);
    }

    public function index()
    {
        $cart = session('cart', []);
        return view('shop.shop', compact('cart'));
    }
}
