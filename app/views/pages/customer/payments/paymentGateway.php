<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .message {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        #payhere-payment {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="message">Welcome! You are about to make a payment for the event.</p>
        <button type="submit" id="payhere-payment" onClick="paymentGateway()">Proceed to Payment</button>
    </div>

    <script>
        var baseURL = "<?php echo URLROOT; ?>";
        var eventID = "<?php echo $data['event']->EventID; ?>";
    </script>   
    <script src="https://www.payhere.lk/lib/payhere.js"></script>
    <script type="text/javascript" src="<?php echo URLROOT;?>/js/customer/payments.js"></script>
</body>
</html>