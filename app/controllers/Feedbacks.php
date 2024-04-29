<?php 
    class Feedbacks extends Controller{
        public function __construct() {
            $this->feedbackModel = $this->model('feedback');
            $this->userModel = $this->model('user');
        }

        public function index() {
            $this->view('pages/customer/Feedback');
        }

        public function submitFeedback() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'feedback' => trim($_POST['feedback']),
                    'rating' => trim($_POST['rating']),
                    'user_id' => $_SESSION['user_id'],
                    'feedback_err' => '',
                    'rating_err' => ''
                ];

                if(empty($data['feedback'])) {
                    $data['feedback_err'] = 'Please enter your feedback';
                }

                if(empty($data['rating'])) {
                    $data['rating_err'] = 'Please rate us';
                }

                if(empty($data['feedback_err']) && empty($data['rating_err']) {
                    if($this->feedbackModel->submitFeedback($data)) {
                        redirect('home/index');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('pages/customer/feedbacks/feedback', $data);
                }
            }else{
                $data = [
                    'feedback' => '',
                    'rating' => '',
                    'user_id' => $_SESSION['user_id'],
                    'feedback_err' => '',
                    'rating_err' => ''
                ];
                $this->view('pages/customer/feedbacks/feedback' , $data);
            }
        }

        public function viewFeedbacks() {
            $feedbacks = $this->feedbackModel->getFeedbacks();
            foreach($feedbacks as $feedback) {
                $user = $this->userModel->getUserById($feedback->CustomerID);
                $feedback->Name = $user->FirstName . ' ' . $user->LastName;
            }
            $data = [
                'feedbacks' => $feedbacks
            ];
            $this->view('pages/customer/viewFeedbacks/feedback', $data);
        }
    }