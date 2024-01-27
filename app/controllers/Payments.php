<?php
    class Payments extends Controller{
        public function __construct(){
            // echo "Payments controller loaded";
            $this->paymentModel = $this->model('Payment');
            $this->eventModel = $this->model('Event');
        }

        public function index(){
            $this->view('pages/customer/payments/paymentGateway');
        }

        public function makePayment($id){
            $data = [
                'event' => $this->eventModel->getEventById($id)
            ];
            $this->view('pages/customer/payments/paymentGateway', $data);
        }

        public function pay($id){
            $event = $this->eventModel->getEventById($id);
            if($event->Status == 'Accepted'){
                $amount = $event->TotalBudget / 10;
            } else if($event->Status == 'Advanced'){
                $amount = ($event->TotalBudget - ($event->TotalBudget / 10))/10;
            } else if($event->Status == 'FullPaid'){
                $amount = 0;
            }
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

        public function paymentSuccess(){
            // Extract data from the request body (assuming it's a JSON payload)
            $requestData = json_decode(file_get_contents('php://input'), true);
        
            // Verify that the request data is not empty
            if (!empty($requestData)) {
                // Extract necessary data from the request
                $EventID = $requestData['EventID'];
                $Amount = $requestData['Amount'];
                $Event = $this->eventModel->getEventById($EventID);
                if($Event->Status == 'Accepted'){
                    $Status = 'Advanced';
                    $this->eventModel->updateEventStatus($EventID, 'Advanced');
                } else  if($Event->Status == 'Advanced'){
                    $Status = 'FullPaid';
                    $this->eventModel->updateEventStatus($EventID, 'FullPaid');
                }
        
                $data = [
                    'EventID' => $EventID,
                    'Amount' => $Amount,
                    'CustomerID' => $this->eventModel->getEventById($EventID)->CustomerID,
                    'Status' =>  $Status
                ];
        
                if($this->paymentModel->paymentSuccess($data)){
                    // Send a success response back to the client
                    echo json_encode(['status' => 'success']);
                } else {
                    // Send an error response back to the client
                    echo json_encode(['status' => 'error', 'message' => 'Something went wrong']);
                }
            } else {
                // Handle empty or invalid request data
                echo json_encode(['status' => 'error', 'message' => 'Invalid request data']);
            }
        }
    }

