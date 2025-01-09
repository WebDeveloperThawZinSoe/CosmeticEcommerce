<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>

<body style="background-color: #f8f9fa; padding: 20px; font-family: Arial, sans-serif;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border: 1px solid #dddddd; border-radius: 5px;">
        <div style="text-align: center;">
            <h1 style="color: #28a745; font-size: 24px;">Thank you for your order!</h1>
            <p style="font-size: 16px;">We appreciate your business! Below are your order details.</p>
        </div>

        <div style="margin-top: 20px;">
            <h4 style="color: #007bff; font-size: 20px;">Order Summary</h4>
            <hr style="border: 0; border-top: 1px solid #dddddd;">
            <p><strong>Order Number:</strong> {{ $orderDetails['order']->order_number }}</p>
            <p><strong>Total Price (Amount to Pay):</strong> {{ $orderDetails['order']->total_price }} </p>
        </div>

        <div style="margin-top: 20px;">
            <h4 style="color: #007bff; font-size: 20px;">Order Details</h4>
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr>
                        <th style="text-align: left; padding: 8px; border: 1px solid #dddddd; background-color: #f2f2f2;">Product Name</th>
                        <th style="text-align: left; padding: 8px; border: 1px solid #dddddd; background-color: #f2f2f2;">Quantity</th>
                        <th style="text-align: left; padding: 8px; border: 1px solid #dddddd; background-color: #f2f2f2;">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetails['cartItems'] as $cartItem)
                    <tr>
                        <td style="padding: 8px; border: 1px solid #dddddd;">{{ $cartItem->product_variant->product->name }}</td>
                        <td style="padding: 8px; border: 1px solid #dddddd;">{{ $cartItem->qty }}</td>
                        <td style="padding: 8px; border: 1px solid #dddddd;">
                            <?php 
                             $price = $cartItem->product_variant->price;
                             $discount_amount = $cartItem->product_variant->discount_amount;
                            if($cartItem->product_variant->discount_type == 0){
                                echo $price *  $cartItem->qty; 
                            }elseif($cartItem->product_variant->discount_type == 1){
                                echo "<del> $price </del> "  . ($price - $discount_amount) *  $cartItem->qty; 
                            }elseif($cartItem->product_variant->discount_type == 2){
                                echo "<del> $price </del> "  . ($price - ( $price * ($discount_amount / 100)) ) *  $cartItem->qty; 
                            }
                            ?>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px;">
            <p style="color: #6c757d; font-size: 14px;">If you have any questions, feel free to <a href="tel:09403077739" style="color: #007bff; text-decoration: none;">09403077739</a> (Viber, Telegram, Discord).</p>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <p style="font-size: 12px; color: #6c757d;">&copy; {{ date('Y') }} Crossfits. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
