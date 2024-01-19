<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="body">
        <button type="submit" id="payhere-payment" onClick="paymentGateway()">PayHere Pay</button>
    </div>
    <script>
        var baseURL = "<?php echo URLROOT; ?>";
        var eventID = "<?php echo $data['event']->EventID; ?>";
    </script>   
    <script src="https://www.payhere.lk/lib/payhere.js"></script>
    <script type="text/javascript" src="<?php echo URLROOT;?>/js/customer/payments.js"></script>
    
</body>
</html>