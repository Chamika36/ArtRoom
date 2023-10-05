<?php
    class User extends Controller{
        public function __construct() {
        }

        public function register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init data
                $data = [
                    'firstName' => trim($_POST['firstName']), 
                    'lastName' => trim($_POST['lastName']),
                    'contactNumber' => trim($_POST['contactNumber']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'userType' => $_POST['userType'],
                    'specialization' => $_POST['specialization'],
                    'name_err' => '',
                    'email_err' => '',
                    'contact_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Name
                if(empty($data['firstName'])) {
                    $data['name_err'] = 'Please enter name';
                }

                if(empty($data['lastName'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate Contact Number
                if(empty($data['contactNumber'])) {
                    $data['contact_err'] = 'Please enter contact number';
                }

                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Validate Confirm Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['contact_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->userModel->register($data)) {
                        flash('register_success', 'You are registered and can log in');
                        redirect('home/login');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('home/register', $data);
                }


            } else {
                // Init data
                $data = [
                    'firstName' => '', 
                    'lastName' => '',
                    'contactNumber' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'userType' => '',
                    'specialization' => '',
                    'name_err' => '',
                    'contact_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Load view
                $this->view('user/register', $data);
            }
        }

        public function login() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // Check for user/email
                if($this->userModel->findUserByEmail($data['email'])) {
                    // User found
                } else {
                    // User not found
                    $data['email_err'] = 'No user found';
                }

                // Make sure errors are empty


            } else {
                // Init data
                $data = [
                    'email' => '',
                    'password' => '', 
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Load view
                $this->view('user/login', $data);
            }
        }
    }