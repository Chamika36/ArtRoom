function paymentGateway() {
    // Fetch data from the server using Fetch API
    fetch(baseURL + '/payments/pay/' + eventID, {
        method: 'POST',
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(obj => {
        // Process the retrieved data
        console.log(obj);
        var paymentData = {
            'EventID': eventID,
            'Amount': obj['amount']
        };

        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
            console.log("dffwef");

            console.log(paymentData);

            console.log("Payment is completed." );


            fetch('http://localhost/ArtRoom/payments/paymentSuccess/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(paymentData),
            })
            .then(response => response.json())
            .then(data => {
                console.log("Thank you for your payment!", data);
            })
            .catch(error => {
                // Handle errors that occurred during the fetch operation
                console.error('Error sending data to the server:', error);
            });
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
            "return_url": 'http://localhost/ArtRoom/payments/paymentSuccess/',     // Important
            "cancel_url": 'http://localhost/ArtRoom/payments/',     // Important
            "notify_url": "http://localhost/ArtRoom/payments/noti",
            "order_id": obj['order_id'],
            "items": "Door bell wireless",
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

        // Show the payhere.js popup when "PayHere Pay" is clicked
        document.getElementById('payhere-payment').onclick = function (e) {
            payhere.startPayment(payment);
        };
    })
    .catch(error => {
        // Handle errors that occurred during the fetch operation
        console.error('Error fetching data from the server:', error);
    });
}
