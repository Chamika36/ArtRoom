<?php
    class Payments extends Controller{
        public function __construct(){
            // echo "Payments controller loaded";
            // $this->paymentModel = $this->model('Payment');
        }

        public function index(){
            $this->view('pages/customer/payments/paymentGateway');
        }

        public function pay(){
            $amount = 30000;
            $merchant_id = '1225181'; // Replace your Merchant ID
            $order_id = uniqid();
            $currency = 'LKR';
            $merchant_secret = 'Mjg2OTkzNTAyNzM1NTY1NTQwNzMzNjk1NDY1ODUxMzMwNzcwMDU3'; 

            $hash = strtoupper(
                md5(
                    $merchant_id . 
                    $order_id . 
                    number_format($amount, 2, '.', '') . 
                    $currency .  
                    strtoupper(md5($merchant_secret)) 
                ) 
            );

            $array = [];

            $array['amount'] = $amount;
            $array['merchant_id'] = $merchant_id;
            $array['order_id'] = $order_id;
            $array['currency'] = $currency;
            $array['hash'] = $hash;

            $json = json_encode($array);

            echo $json;
        }

    }