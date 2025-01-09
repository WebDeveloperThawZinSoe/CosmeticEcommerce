<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Card;
use App\Models\CuponCode;
use App\Models\CuponUseLog;
use App\Mail\OrderConfirmation;
use Stripe\Stripe;
use Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    // public function store(Request $request)
    // {
    //     // Validate the form input
    //     $rules = [
    //         'name' => 'required|string|max:255',
    //         'phone' => 'required|string|max:20',
    //         'email' => 'required|email|max:255',
    //         'region' => 'required|string',
    //         'address' => 'required|string|max:500',
    //         'payment_method' => 'required|string',
    //         'note' => 'nullable|string|max:1000',
    //         'payment_account_name' => 'nullable|string|max:255',
    //         'payment_slip' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
    //     ];
    //     $validatedData = $request->validate($rules);

    //     $user_id = Auth::check() ? Auth::user()->id : null;
    //     $sessionId = session()->getId();
       
    //     $cartItems = $user_id
    //         ? Card::where("user_id", $user_id)->with('product_variant')->get()
    //         : Card::where("session_id", $sessionId)->with('product_variant')->get();

    //     if ($cartItems->isEmpty()) {
    //         return redirect()->back()->with('error', 'Your cart is empty.');
    //     }

    //     $total = $cartItems->sum(function ($cartItem) {
    //         $price = $cartItem->product_variant->price;
    //         $discount_amount = $cartItem->product_variant->discount_amount;
    //         switch ($cartItem->product_variant->discount_type) {
    //             case 0:
    //                 return $price * $cartItem->qty;
    //             case 1:
    //                 return ($price - $discount_amount) * $cartItem->qty;
    //             case 2:
    //                 return ($price - ($price * ($discount_amount / 100))) * $cartItem->qty;
    //             default:
    //                 return $price * $cartItem->qty;
    //         }
    //     });

    //     $payment_slip_name = null;
    //     if ($request->hasFile('payment_slip')) {
    //         $paymentSlip = $request->file('payment_slip');
    //         $payment_slip_name = time() . '_' . uniqid() . '.' . $paymentSlip->getClientOriginalExtension();
    //         $paymentSlip->move(public_path('payment_slips'), $payment_slip_name);
    //     }

    //     // Final Price Check With Cupon Code
    //     $cupon_code_id = $request->cupon_code_id ?? null;
    //     if($cupon_code_id != null){
    //         $cupon_code_info = CuponCode::find($cupon_code_id)->first();
    //         $cupon_type = $cupon_code_info->type;
    //         $cupon_amount = $cupon_code_info->amount;
    //         $original_price = $total;
    //         if($cupon_type == 1){
    //             $total = $original_price - $cupon_amount;
    //         }elseif($cupon_type == 2){
    //             $total = $original_price - ($original_price * ($cupon_amount / 100));
    //         }

    //     }

     
    //     DB::beginTransaction();

    //     try {
    //         $order = Order::create([
    //             'name' => $request->name,
    //             'phone' => $request->phone,
    //             'order_number' => 'ORD-' . strtoupper(uniqid()),
    //             'region' => $request->region,
    //             'address' => $request->address,
    //             'user_id' => $user_id,
    //             'payment_method' => $request->payment_method,
    //             'payment_slip' => $payment_slip_name,
    //             'payment_account_name' => $request->payment_account_name,
    //             'email' => $request->email,
    //             'total_price' => $total,
    //             'note' => $request->note,
    //             'payment_status' => 0, // Default payment status
    //             "cupon_code_id" => $cupon_code_id
    //         ]);

    //         if ($request->payment_method == "stripe") {
    //             Stripe::setApiKey(config('services.stripe.secret'));
    //             try {
    //                 $charge = \Stripe\Charge::create([
    //                     'amount' => $total * 100,
    //                     'currency' => 'usd',
    //                     'description' => $order->order_number,
    //                     'source' => $request->stripeToken,
    //                 ]);
    //                 $order->update(['payment_status' => $charge->status === 'succeeded' ? $charge->status : 0]);
    //             } catch (ApiErrorException $e) {
    //                 throw new \Exception('Stripe Payment Failed: ' . $e->getMessage());
    //             }
    //         }

    //         foreach ($cartItems as $cartItem) {
    //             OrderDetail::create([
    //                 'order_number' => $order->order_number,
    //                 'order_id' => $order->id,
    //                 'product_variant_id' => $cartItem->product_variant_id,
    //                 'qty' => $cartItem->qty,
    //                 'price' => $cartItem->product_variant->price,
    //                 'discount_type' => $cartItem->product_variant->discount_type,
    //                 'discount_amount' => $cartItem->product_variant->discount_amount,
    //             ]);
    //         }

    //         // if($cupon_code_id != null){
    //         //     $cupon_code_info = CuponCode::find($cupon_code_id)->first();
    //         //     $user_id = Auth::user()->id ?? "Guest Account";
    //         //     CuponUseLog::create([
    //         //         "cupon_id" => $cupon_code_id,
    //         //         "cupon_code" => $cupon_code_info->cupon_code,
    //         //         "name" => $cupon_code_info->name,
    //         //         "type" => $cupon_code_info->type,
    //         //         "amount" => $cupon_code_info->amount,
    //         //         "user_id" => $user_id,
    //         //         "order_id" => $order->id
    //         //     ]);
    //         // }

    //         Mail::to($request->email)->send(new OrderConfirmation([
    //             'order' => $order,
    //             'cartItems' => $cartItems,
    //         ]));

    //         $user_id
    //             ? Card::where("user_id", $user_id)->delete()
    //             : Card::where("session_id", $sessionId)->delete();

    //         DB::commit();
    //         return redirect('/checkout')->with('success', 'Order placed successfully!');
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return redirect()->back()->with('error', 'Order failed: ' . $e->getMessage());
    //     }
    // }

    // Chat GPT Code
    public function store(Request $request)
    {
        // Validate the form input
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'region' => 'required|string',
            'address' => 'required|string|max:500',
            'payment_method' => 'required|string',
            'note' => 'nullable|string|max:1000',
            'payment_account_name' => 'nullable|string|max:255',
            'payment_slip' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ];
        $validatedData = $request->validate($rules);

        // Get user or session ID
        $user_id = Auth::check() ? Auth::user()->id : null;
        $sessionId = session()->getId();

        // Retrieve cart items
        $cartItems = $user_id
            ? Card::where("user_id", $user_id)->with('product_variant')->get()
            : Card::where("session_id", $sessionId)->with('product_variant')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate total price
        $total = $cartItems->sum(function ($cartItem) {
            $price = $cartItem->product_variant->price;
            $discount_amount = $cartItem->product_variant->discount_amount;

            switch ($cartItem->product_variant->discount_type) {
                case 0:
                    return $price * $cartItem->qty;
                case 1:
                    return ($price - $discount_amount) * $cartItem->qty;
                case 2:
                    return ($price - ($price * ($discount_amount / 100))) * $cartItem->qty;
                default:
                    return $price * $cartItem->qty;
            }
        });

        // Handle payment slip upload
        $payment_slip_name = null;
        if ($request->hasFile('payment_slip')) {
            $paymentSlip = $request->file('payment_slip');
            $payment_slip_name = time() . '_' . uniqid() . '.' . $paymentSlip->getClientOriginalExtension();
        
            // Move the uploaded file to the public/payment_slips directory
            $paymentSlip->move(public_path('payment_slips'), $payment_slip_name);
        }
        
        // Apply coupon discount
        $cupon_code_id = $request->cupon_code_id ?? null;
        if ($cupon_code_id) {
            $cupon_code_info = CuponCode::find($cupon_code_id);

            if ($cupon_code_info) {
                $cupon_type = $cupon_code_info->type;
                $cupon_amount = $cupon_code_info->amount;
                $original_price = $total;

                if ($cupon_type == 1) {
                    $total = max(0, $original_price - $cupon_amount);
                } elseif ($cupon_type == 2) {
                    $total = max(0, $original_price - ($original_price * ($cupon_amount / 100)));
                }
            }
        }

        DB::beginTransaction();

        try {
            // Create order
            $order = Order::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'region' => $request->region,
                'address' => $request->address,
                'user_id' => $user_id,
                'payment_method' => $request->payment_method,
                'payment_slip' => $payment_slip_name,
                'payment_account_name' => $request->payment_account_name,
                'email' => $request->email,
                'total_price' => $total,
                'note' => $request->note,
                'payment_status' => 0,
                'cupon_code_id' => $cupon_code_id,
                "country" => $request->country
            ]);

            // Process Stripe payment if selected
            if ($request->payment_method === "stripe") {
                if (!$request->has('stripeToken')) {
                    throw new \Exception('Stripe token is missing.');
                }

                Stripe::setApiKey(config('services.stripe.secret'));
                $charge = \Stripe\Charge::create([
                    'amount' => $total * 100,
                    'currency' => 'usd',
                    'description' => $order->order_number,
                    'source' => $request->stripeToken,
                ]);

                $order->update(['payment_status' => $charge->status === 'succeeded' ? $charge->status : 0]);
            }

            // Create order details
            foreach ($cartItems as $cartItem) {
                OrderDetail::create([
                    'order_number' => $order->order_number,
                    'order_id' => $order->id,
                    'product_variant_id' => $cartItem->product_variant_id,
                    'qty' => $cartItem->qty,
                    'price' => $cartItem->product_variant->price,
                    'discount_type' => $cartItem->product_variant->discount_type,
                    'discount_amount' => $cartItem->product_variant->discount_amount,
                ]);
            }

            // Log coupon usage if applicable
            if ($cupon_code_id && $cupon_code_info) {
                CuponUseLog::create([
                    "cupon_id" => $cupon_code_id,
                    "cupon_code" => $cupon_code_info->cupon_code,
                    "name" => $cupon_code_info->name,
                    "type" => $cupon_code_info->type,
                    "amount" => $cupon_code_info->amount,
                    "user_id" => $user_id ?? 0,
                    "order_id" => $order->id,
                ]);
            }

            // Send order confirmation email
            Mail::to($request->email)->send(new OrderConfirmation([
                'order' => $order,
                'cartItems' => $cartItems,
            ]));

            // Clear cart items
            Card::where($user_id ? "user_id" : "session_id", $user_id ?? $sessionId)->delete();

            DB::commit();
            return redirect('/')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Order failed: ' . $e->getMessage());
        }
    }

}
