<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserOrderController extends Controller
{
    // Display the list of orders for the authenticated user
    public function orderIndex()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy("id","desc")->get();
        return view('customer.order', compact('orders'));
    }

    // Display the details of a specific order
    public function orderDetail($id)
    {
        $order = Order::with('orderDetails.productVaraints', 'user', 'customerType')->findOrFail($id);
        return view('customer.order_detail', compact('order'));
    }
}
