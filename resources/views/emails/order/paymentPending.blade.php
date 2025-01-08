<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Payment Pending</title>
</head>

<body style="background-color: #f8f9fa; padding: 20px; font-family: Arial, sans-serif;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border: 1px solid #dddddd; border-radius: 5px;">
        <h1 style="color: #ffc107; font-size: 24px;">Order Payment Pending</h1>
        <p style="font-size: 16px;">Dear {{ $order->user->name ?? 'Customer' }},</p>
        <p style="font-size: 16px;">Your order <strong>#{{ $order->order_number }}</strong> is currently pending payment. Once we receive your payment, we will process and ship your order promptly.</p>
        <p style="font-size: 16px;">If you have any questions or need assistance, please feel free to contact our support team.</p>
        <p style="font-size: 16px;">Thank you for choosing us!</p>

        <div style="margin-top: 20px;">
            <p style="color: #6c757d; font-size: 14px;">If you have any questions, feel free to <a href="tel:+959951056859" style="color: #007bff; text-decoration: none;">+959951056859</a> (Viber, Telegram, Discord).</p>
        </div>
    </div>
</body>

</html>
