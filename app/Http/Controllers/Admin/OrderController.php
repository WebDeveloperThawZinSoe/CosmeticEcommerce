<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Mail\OrderConfirmed;
use App\Mail\OrderCancelled;
use App\Mail\OrderPaymentPending;
use App\Models\Product;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Card;
use Illuminate\Support\Facades\Cache;
use DB;

class OrderController extends Controller
{
    // Display all orders
    public function index()
    {
        $orders = Order::with('user')->orderBy("id","desc")->get(); // Eager load related user
        return view('admin.order.index', compact('orders'));
    }

    // Edit order status
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.edit', compact('order'));
    }

    // Update order status
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $oldStatus = $order->status;
    

        // Reduce Stock
        if($request->status == 2){
            foreach ($order->orderDetails as $detail) {
                $varaint_product_id = $detail->product_variant_id;
                $product_id = $detail->productVaraints->product->id;
                $product = Product::findOrFail($product_id);
                $varaint_product = ProductVariants::findOrFail($varaint_product_id);
                $old_p_stock = $product->stock;
                $old_vp_stock = $varaint_product->stock;
                $qty = $detail->qty;
                $product->update([
                    "stock" =>$old_p_stock - $qty,
                ]);
                $varaint_product->update([
                    "stock" => $old_vp_stock - $qty,
                ]);
                /* Should Check Stock and Order QTY In Here */
                $order->update([
                    'status' => $request->status,
                ]);
            }
        }else{
            $order->update([
                'status' => $request->status,
            ]);
        }
    
        // Send email based on status change
        if ($request->status == 2 && $oldStatus != 2) { // Confirmed
            Mail::to($order->email)->send(new OrderConfirmed($order));
        } elseif ($request->status == 3 && $oldStatus != 3) { // Cancelled
            Mail::to($order->email)->send(new OrderCancelled($order));
        }  elseif ($request->status == 4 && $oldStatus != 4) { // Cancelled
            Mail::to($order->email)->send(new OrderPaymentPending($order));
        } 
    
       return redirect()->route('admin.orders.index')->with('success', 'Order status updated and notification sent successfully.');
    }

    // Show order details (modal)
    // public function show($id)
    // {
    //     $order = Order::with('orderDetails.product')->findOrFail($id); // Eager load order details with product
    //     return response()->json($order);
    // }



    public function show($id)
    {
        $order = Order::with(['user', 'orderDetails.productVaraints.product', 'paymentMethod'])->findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    //getCustomerDetails
    public function getCustomerDetails($id)
    {
        $user = User::with('orders')->findOrFail($id);
        $user->orders_count = $user->orders->count(); // Add orders count
    
        return response()->json($user);
    }

    // //orderCreateAdmin
    // public function orderCreateAdmin() {
    //     $users = User::where("role", "2")->orderBy("id", "desc")->get();
        
    //     // Consider caching products if they do not change frequently
    //     $products = Cache::remember('active_products', 60, function () {
    //         return ProductVariants::where("stock", "!=", 0)->where("status", "1")->get();
    //     });
    
    //     return view("admin.order.create", compact("users", "products"));
    // }
    
    // // Optimize showUserCart method
    // public function showUserCart(Request $request) {
    //     $userId = $request->input('user_id');
    //     $cartItems = Card::where('user_id', $userId)
    //         ->with('product_variant.product') // Eager load related product data
    //         ->get();

    //     $totalPrice = 0;
    //     foreach ($cartItems as $item) {
    //         $originalPrice = $item->product_variant->price;
    //         $discountType = $item->product_variant->discount_type;
    //         $discountAmount = $item->product_variant->discount_amount;

    //         // Calculate final price based on discount
    //         $finalPrice = match($discountType) {
    //             1 => $originalPrice - $discountAmount, // Fixed discount
    //             2 => $originalPrice * (1 - $discountAmount / 100), // Percentage discount
    //             default => $originalPrice,
    //         };

    //         // Calculate subtotal for each cart item
    //         $subtotal = $finalPrice * $item->qty;
    //         $totalPrice += $subtotal;

    //         // Attach prices and subtotal to each item
    //         $item->original_price = $originalPrice;
    //         $item->discounted_price = $finalPrice;
    //         $item->subtotal = $subtotal;
    //     }

    //     // Retrieve users and products only if necessary
    //     $users = User::all();
    //     // Corrected cache retrieval for products
    //     $products = Cache::remember('active_products', 60, function () {
    //         return ProductVariants::where("stock", ">=", 1)->where("status", "1")->get();
    //     });

    //     return view('admin.order.create', compact('cartItems', 'users', 'userId', 'totalPrice', 'products'));
    // }

    // public function updateData(Request $request, $id)
    // {
    //     $card = Card::find($id);

    //     if ($card) {
    //         $action = $request->input('action');
    //         if ($action === 'add') {
    //             $card->qty += 1;
    //         } elseif ($action === 'sub' && $card->qty > 1) {
    //             $card->qty -= 1;
    //         }
    //         $card->save();
    //     }

    //     // Recalculate total price and reload cart items
    //     $userId = $request->input('user_id');
    //     $cartItems = Card::where('user_id', $userId)->with('product_variant.product')->get();

    //     $totalPrice = 0;
    //     foreach ($cartItems as $item) {
    //         $finalPrice = $item->product_variant->discount_type === 1
    //             ? $item->product_variant->price - $item->product_variant->discount_amount
    //             : $item->product_variant->price * (1 - $item->product_variant->discount_amount / 100);

    //         $subtotal = $finalPrice * $item->qty;
    //         $totalPrice += $subtotal;

    //         $item->original_price = $item->product_variant->price;
    //         $item->discounted_price = $finalPrice;
    //         $item->subtotal = $subtotal;
    //     }

    //     $cartHtml = view('partials.cart_items', compact('cartItems', 'userId'))->render();

    //     return response()->json([
    //         'cartHtml' => $cartHtml,
    //         'totalPrice' => number_format($totalPrice, 2)
    //     ]);
    // }

    // public function orderCreateAdmin() {
    //     $users = User::where("role", "2")->orderBy("id", "desc")->get();
    
    //     return view("admin.order.create", compact("users"));
    // }
    
    // public function showUserCart(Request $request) {
        
    //     $userId = $request->input('user_id');
    //     $cartItems = Card::where('user_id', $userId)->with('product_variant.product')->get();
       
    
      
    //     $products = Cache::remember('active_products', 60, function () {
    //         return ProductVariants::where("stock", ">", 0)->where("status", "1")->get();
    //     });
    //     $UserData = User::where("id",$userId)->first();
    //     return view('admin.order.create_data', compact('userId',  'products','UserData','cartItems'));
    // }
    
    // public function updateData1(Request $request, $id) {
    //     $products = Cache::remember('active_products', 60, function () {
    //         return ProductVariants::where("stock", ">", 0)->where("status", "1")->get();
    //     });
    
    //     $card = Card::find($id);
    //     if ($card) {
    //         $action = $request->input('action');
    //         if ($action === 'add') {
    //             $card->qty += 1;
    //         } elseif ($action === 'sub' && $card->qty > 1) {
    //             $card->qty -= 1;
    //         }
    //         $card->save();
    //     }
    
    //     $userId = $request->input('user_id');
    //     $cartItems = Card::where('user_id', $userId)->with('product_variant.product')->get();
    //     $UserData = User::where("id",$userId)->first();
    //     // return view('admin.order.create_data', compact('userId',"products",'UserData','cartItems'));
    //     return redirect()->back();
        
    // }

    // public function updateData(Request $request, $id) {
    //     $card = Card::find($id);
    
    //     if ($card) {
    //         $action = $request->input('action');
    //         if ($action === 'increase') {
    //             $card->qty += 1;
    //         } elseif ($action === 'decrease' && $card->qty > 1) {
    //             $card->qty -= 1;
    //         }
    //         $card->save();
    
    //         // Return the updated quantity in JSON format
    //         return response()->json(['new_qty' => $card->qty]);
    //     }
    
    //     return response()->json(['error' => 'Item not found'], 404);
    // }
    

    // public function removeData(Request $request, $id) {
    //     $card = Card::find($id);
    //     if ($card) {
    //         $card->delete();
    //     }
    
    //     return response()->json(['success' => true]);
    // }

    public function orderCreateAdmin()
    {
        $users = User::where("role", "2")->orderBy("id", "desc")->get();
        return view("admin.order.create", compact("users"));
    }

    public function showUserCart(Request $request)
    {
        $userId = $request->input('user_id');
        $cartItems = Card::where('user_id', $userId)->with('product_variant.product')->get();
        $products = Cache::remember('active_products', 60, function () {
            return ProductVariants::where("stock", ">", 0)->where("status", "1")->get();
        });
        $UserData = User::find($userId);
        return view('admin.order.create_data', compact('userId', 'products', 'UserData', 'cartItems'));
    }

    public function updateData(Request $request, $id)
    {
        $card = Card::find($id);

        if ($card) {
            $action = $request->input('action');
            if ($action === 'increase') {
                $card->qty += 1;
            } elseif ($action === 'decrease' && $card->qty > 1) {
                $card->qty -= 1;
            }
            $card->save();
            return response()->json(['new_qty' => $card->qty]);
        }

        return response()->json(['error' => 'Item not found'], 404);
    }

    public function removeData(Request $request, $id)
    {
        $card = Card::find($id);
        if ($card) {
            $card->delete();
        }

        return response()->json(['success' => true]);
    }


    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_variant_id' => 'required|exists:product_variants,id',
            'qty' => 'required|integer|min:1',
        ]);
    
        $cartItem = Card::where('user_id', $validated['user_id'])
            ->where('product_variant_id', $validated['product_variant_id'])
            ->first();
    
        // Check if the cart item already exists
        if ($cartItem) {
            // If exists, update the quantity
            $cartItem->increment('qty', $validated['qty']);
        } else {
            // If not exists, create a new cart item
            $cartItem = Card::create([
                'user_id' => $validated['user_id'],
                'product_variant_id' => $validated['product_variant_id'],
                'qty' => $validated['qty'],
            ]);
        }
    
        $cartItem->load('product_variant.product');
    
        // Calculate final price
        $finalPrice = $cartItem->product_variant->discount_type === 1
            ? $cartItem->product_variant->price - $cartItem->product_variant->discount_amount
            : ($cartItem->product_variant->discount_type === 2
                ? $cartItem->product_variant->price * (1 - $cartItem->product_variant->discount_amount / 100)
                : $cartItem->product_variant->price);
    
        return response()->json([
            'success' => true,
            'cartItem' => [
                'id' => $cartItem->id,
                'qty' => $cartItem->qty,
                'subtotal' => $cartItem->qty * $finalPrice,
                'price' => $finalPrice,
                'product_name' => $cartItem->product_variant->product->name,
                'attribute_name' => $cartItem->product_variant->attribute_name,
                'attribute_value' => $cartItem->product_variant->attribute_value,
                'image' => asset($cartItem->product_variant->image),
            ],
        ]);
    }
    

    public function OrderCheckOut(Request $request){
  
        $userId = $request->user_id;
        $user_id = $request->user_id;
        $cartItems = Card::where("user_id", $user_id)->with('product_variant')->get();

        // Calculate total price
        $total = $cartItems->sum(function ($cartItem) {
            // * $cartItem->qty
            $price = $cartItem->product_variant->price;
            $discount_amount = $cartItem->product_variant->discount_amount;
            if($cartItem->product_variant->discount_type == 0){
                return $price *  $cartItem->qty; 
            }elseif($cartItem->product_variant->discount_type == 1){
                return ($price - $discount_amount) *  $cartItem->qty; 
            }elseif($cartItem->product_variant->discount_type == 2){
                return ($price - ( $price * ($discount_amount / 100)) ) *  $cartItem->qty; 
            }
        });
    
        $user = User::where("id",$userId)->first();
    
        
        // Now create the order, ensuring the user ID is assigned correctly
        $order = Order::create([
            "name" => $user->name,
            "phone" => $user->phone,
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'region' => "Yangon",
            'address' => "Shop",
            'user_id' => $user_id, 
            'payment_method' => 0,
            'email' =>  $user->email,
            'total_price' => $total,
            'note' => "CheckOut By Admin",
            "status" => 2
        ]);
    
        // Create order details for each cart item
        foreach ($cartItems as $cartItem) {
            OrderDetail::create([
                'order_number' => $order->order_number,
                'order_id' => $order->id,
                'product_variant_id' => $cartItem->product_variant_id,
                'qty' => $cartItem->qty,
                'price' => $cartItem->product_variant->price,
                'discount_type' =>  $cartItem->product_variant->discount_type,
                'discount_amount' => $cartItem->product_variant->discount_amount,
            ]);
        }

        Card::where("user_id",$user_id)->delete();
        return redirect("/admin/orders")->with("success","CheckOut Success");
    
    }
    
public function deleteOrder(Request $request)
{
    // Validate the request to ensure the 'id' is present
    $request->validate([
        'id' => 'required|integer|exists:orders,id',
    ]);

    // Retrieve the order using the provided ID
    $order = Order::find($request->id);

    if ($order) {
        // Attempt to delete the order
        $order->delete();

        // Redirect back with a success message
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }

    // If the order was not found, redirect back with an error message
    return redirect()->route('admin.orders.index')->with('error', 'Order not found or already deleted.');
}

}