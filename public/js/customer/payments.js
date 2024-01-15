function paymentGateway() {
    var xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            // alert(xHttp.responseText);
            console.log(xHttp.responseText);
            var obj = JSON.parse(xHttp.responseText);

            // Payment completed. It can be a successful failure.
            payhere.onCompleted = function onCompleted(orderId) {
                console.log("Payment completed. OrderID:" + orderId);
                // Note: validate the payment and show success or failure page to the customer
            };

            // Payment window closed
            payhere.onDismissed = function onDismissed() {
                // Note: Prompt user to pay again or show an error page
                console.log("Payment dismissed");
            };

            // Error occurred
            payhere.onError = function onError(error) {
                // Note: show an error page
                console.log("Error:"  + error);
            };

            // Put the payment variables here
            var payment = {
                "sandbox": true,
                "merchant_id": "1225181",    // Replace your Merchant ID
                "return_url": 'http://localhost/ArtRoom/payments/',     // Important
                "cancel_url": 'http://localhost/ArtRoom/payments/',     // Important
                "notify_url": "http://sample.com/notify",
                "order_id": obj['order_id'],
                "items": "Door bell wireles",
                "amount": obj['amount'],
                "currency": obj['currency'],
                "hash": obj['hash'], // *Replace with generated hash retrieved from backend
                "first_name": "Saman",
                "last_name": "Perera",
                "email": "samanp@gmail.com",
                "phone": "0771234567",
                "address": "No.1, Galle Road",
                "city": "Colombo",
                "country": "Sri Lanka",
                "delivery_address": "No. 46, Galle road, Kalutara South",
                "delivery_city": "Kalutara",
                "delivery_country": "Sri Lanka",
                "custom_1": "",
                "custom_2": ""
            };

            // Show the payhere.js popup, when "PayHere Pay" is clicked
            document.getElementById('payhere-payment').onclick = function (e) {
                payhere.startPayment(payment);
            };
        }
    }
    xHttp.open("POST", baseURL + '/payments/pay', true);
    xHttp.send();
}