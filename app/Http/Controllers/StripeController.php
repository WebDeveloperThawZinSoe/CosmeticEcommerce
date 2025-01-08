<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    public function handlePayment(Request $request)
    {
        $request->validate([
            'card_name' => 'required',
            'card_number' => 'required|numeric',
            'cvv' => 'required|numeric',
            'expire_month' => 'required|numeric',
            'expire_year' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        try {
            // Set Stripe API key
            Stripe::setApiKey(config('services.stripe.secret'));

            // Create a payment charge
            $charge = \Stripe\Charge::create([
                'amount' => $request->total_price * 100, // Amount in cents
                'currency' => 'usd',
                'description' => 'Order Payment',
                'source' => $request->stripeToken, // Token generated on frontend
            ]);

            // Save order in database
            DB::transaction(function () use ($request, $charge) {
                // Create order
                $order = Order::create([
                    'order_number' => uniqid('ORD-'),
                    'user_id' => auth()->id(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'region' => $request->region,
                    'address' => $request->address,
                    'payment_method' => 'stripe',
                    'total_price' => $request->total_price,
                    'payment_status' => 1, // Payment completed
                    'note' => $request->note,
                ]);

                // Add order details
                foreach ($request->cart_items as $item) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'order_number' => $order->order_number,
                        'product_variant_id' => $item['product_variant_id'],
                        'price' => $item['price'],
                        'qty' => $item['qty'],
                        'discount_type' => $item['discount_type'],
                        'discount_amount' => $item['discount_amount'],
                    ]);
                }
            });

            return redirect()->route('order.success')->with('success', 'Payment Successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function paymentPage()
    {
        return view('stripe.payment'); // Create this Blade template
    }
}
