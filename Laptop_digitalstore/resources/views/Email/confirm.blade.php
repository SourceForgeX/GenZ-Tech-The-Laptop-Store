<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">

    <!-- Outer Container -->
    <div style="background-color: #f4f4f4; padding: 20px; text-align: center;">

        <!-- Email Box -->
        <div
            style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.15); overflow: hidden;">

            <!-- Header -->
            <div style="background-color: #007BFF; color: #ffffff; padding: 20px; font-size: 24px; font-weight: bold;">
                Order Confirmation
            </div>

            <!-- Body -->
            <div style="color: #333333; font-size: 16px; line-height: 1.6; padding: 20px;">
                <p>Dear {{$customer->customer->customername}}</p>
                <p>We're thrilled to confirm your order for a laptop! Here are your order details:</p>

                <ul style="text-align: left; padding-left: 20px;">
                    <li><strong>Laptop Name:</strong> {{$customer->laptop->laptopname}}</li>
                    <li><strong>Color:</strong> {{$customer->laptop->color}}</li>
                    <li><strong>Quantity:</strong> {{$customer->quantity}}</li>
                    <li><strong>Total Amount:</strong> ₹{{$customer->totalamount}}</li>
                    <li><strong>Delivery Address:</strong> {{$customers->housename}}, {{$customers->landmark}}</li>
                </ul>

                <p>Your order is now confirmed, and we aim to deliver your laptop within the next 5 days.</p>

                <p style="text-align: center;">
                    <a href="#" style="display: inline-block; background-color: #007BFF; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-size: 16px;">Track
                        Your Order</a>
                </p>

                <p>Thank you for choosing us. If you have any questions, feel free to contact our support team.</p>
            </div>

            <!-- Footer -->
            <div style="background-color: #f4f4f4; color: #777777; font-size: 14px; text-align: center; padding: 10px;">
                <p>Need help? <a href="#" style="color: #007BFF; text-decoration: none;">Contact Support</a></p>
                <p>&copy; 2024 Laptop Digital Store. All rights reserved.</p>
            </div>

        </div>
    </div>

</body>

</html>
