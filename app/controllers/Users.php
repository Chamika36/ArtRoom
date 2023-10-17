<?php
    class Users extends Controller{
        public function __construct() {
            $this->userModel = $this->model('User');
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
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'userType' => $_POST['userType'],
                    'specialization' => $_POST['specialization'],
                    'first_name_err' => '',
                    'last_name_err' => '',
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

                // Validate Contact Number
                if(empty($data['contactNumber'])) {
                    $data['contact_err'] = 'Please enter phone number';
                } else {
                    // Check email
                    if($this->userModel->findUserByContactNumber($data['contactNumber'])) {
                        $data['contact_err'] = 'Contact number is already taken';
                    }
                }

                // Validate Name
                if(empty($data['firstName'])) {
                    $data['first_name_err'] = 'Please enter name';
                }

                if(empty($data['lastName'])) {
                    $data['last_name_err'] = 'Please enter name';
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
                if(empty($data['confirmPassword'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirmPassword']) {
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
                        echo 'Success';
                        flash('register_success', 'You are registered and can log in');
                        redirect('users/login');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('user/register', $data);
                }


            } else {
                // Init data
                $data = [
                    'firstName' => '', 
                    'lastName' => '',
                    'contactNumber' => '',
                    'email' => '',
                    'password' => '',
                    'confirmPassword' => '',
                    'userType' => '',
                    'specialization' => '',
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'contact_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

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
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser) {
                        // Create Session
                        echo 'Success';
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password incorrect';

                        $this->view('user/login', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('user/login', $data);
                }


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

        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->UserID;
            $_SESSION['user_email'] = $user->Email;
            $_SESSION['user_type_id'] = $user->UserTypeID;
            $_SESSION['user_name'] = $user->FirstName . ' ' . $user->LastName;
            
            switch($_SESSION['user_type_id']) {
                case 1:
                    redirect('home/index');
                    break;
                case 2: 
                    redirect('home/dash');
                    break;
                default:
                    redirect('home/index');
                    break;
            }
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_type_id']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            } else {
                return false;
            }
        }
    }