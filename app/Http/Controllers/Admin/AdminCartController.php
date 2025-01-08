<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Product;
use App\Models\CartItem;

class AdminCartController extends Controller
{
    // Display the cart
    public function index(Request $request)
    {
        $userId = $request->get('user_id', null);
        $cartItems = CartItem::with('product')->where('user_id', $userId)->get();
        $totalPrice = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        // Fetch available products
        $products = Product::all();

        return view('admin.order.index', compact('cartItems', 'totalPrice', 'userId', 'products'));
    }

    // Add product to the cart
    public function add(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_variant_id' => 'required|exists:products,id',
        ]);

        $cart = Cart::firstOrCreate([
            'user_id' => $request->user_id,
        ]);

        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_variant_id,
            'quantity' => 1, // Default quantity is 1
            'price' => Product::find($request->product_variant_id)->price,
        ]);

        return redirect()->route('admin.orders.cart.user', ['user_id' => $request->user_id]);
    }

    // Update cart quantities
    public function update(Request $request)
    {
        $request->validate([
            'quantity' => 'array|required',
            'quantity.*' => 'integer|min:1',
        ]);

        foreach ($request->quantity as $cartItemId => $quantity) {
            $cartItem = CartItem::find($cartItemId);
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }

        return redirect()->route('admin.orders.cart.user', ['user_id' => $request->user_id]);
    }

    // Reset the cart (clear all items)
    public function reset(Request $request)
    {
        CartItem::where('user_id', $request->user_id)->delete();
        return redirect()->route('admin.orders.cart.user');
    }
}
