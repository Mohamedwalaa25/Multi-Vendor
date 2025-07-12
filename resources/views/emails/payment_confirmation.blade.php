<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
</head>
<body>
<h1>Payment Confirmation</h1>
<p>Dear {{ $order->user->name }},</p>
<p>Your payment for Order #{{ $order->id }} has been processed successfully.</p>
<p>Order Details:</p>
<ul>
    @foreach ($order->products as $product)
        <li>Product: {{ $product->name }}</li>
    @endforeach

</ul>
<p>Thank you for your purchase!</p>
</body>
</html>
