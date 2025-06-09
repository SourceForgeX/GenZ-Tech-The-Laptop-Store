<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">

    <!-- Outer Container -->
    <div style="background-color: #f4f4f4; padding: 20px; text-align: center;">

        <!-- Email Box -->
        <div
            style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.15); overflow: hidden;">

            <!-- Header -->
            <div style="background-color: #007BFF; color: #ffffff; padding: 20px; font-size: 24px; font-weight: bold;">
                Welcome to Our Service!
            </div>

            <!-- Body -->
            <div style="color: #333333; font-size: 16px; line-height: 1.6; padding: 20px;">
                <p>Dear {{$customers->customername}},</p>
                <p>Thank you for registering with us! Here's what you can look forward to:</p>
                <ul style="text-align: left; padding-left: 20px;">
                    <li>Exclusive access to the latest laptop deals and offers</li>
                    <li>Personalized recommendations based on your preferences</li>
                    <li>24/7 support to assist with your shopping and technical needs</li>
                </ul>
                <p>Start exploring our wide range of laptops now and find the perfect fit for your needs!</p>

                <p style="text-align: center;">
                    <a href="#"
                        style="display: inline-block; background-color: #007BFF; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-size: 16px;">Get
                        Started</a>
                </p>
                <p>Thank you for choosing us!</p>
            </div>

            <!-- Footer -->
            <div style="background-color: #f4f4f4; color: #777777; font-size: 14px; text-align: center; padding: 10px;">
                <!-- <p>&copy; 2024 Your Company. All rights reserved.</p> -->
                <p><a href="#" style="color: #007BFF; text-decoration: none;">Unsubscribe</a></p>
            </div>

        </div>
    </div>

</body>

</html>