<?php
    class Users extends Controller{
        public function __construct() {
            $this->userModel = $this->model('User');
            $this->sampleModel = $this->model('Sample');
        }

        public function index() {
            $users = $this->userModel->getUsers();
            $data = [
                'users' => $users
            ];
            $this->view('pages/manager/users/users', $data);
        }

        public function register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                session_start();
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

                     // verify email otp
                     $otp = rand(100000, 999999);
                     $to = $data['email'];
                     $subject = "Email Verification";
                     $message = "Your OTP is: ".$otp;
                     $headers = "From:ArtRoom@gmail.com";
                     $_SESSION['otp'] = $otp;
                     $_SESSION['email'] = $data['email'];

                     // Store entered user data in session
                    $_SESSION['user_data'] = $data;

                    // Register User
                    if(mail($to, $subject, $message, $headers)) {
                         // Redirect to verify page
                        redirect('users/verify');
                        
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

        public function verify() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'otp' => trim($_POST['otp']),
                    'otp_err' => '',
                ];

                // Validate OTP
                if(empty($data['otp'])) {
                    $data['otp_err'] = 'Please enter OTP';
                } elseif($data['otp'] != $_SESSION['otp']) {
                    $data['otp_err'] = 'Invalid OTP';
                }

                // Make sure errors are empty
                if(empty($data['otp_err'])) {
                    // Validated
                    // Register User
                    if($this->userModel->register($_SESSION['user_data'])) {
                        // Unset session variables
                        unset($_SESSION['otp']);
                        unset($_SESSION['email']);
                        unset($_SESSION['user_data']);
                        session_destroy();
                        flash('register_success', 'You are registered and can log in');
                        redirect('users/login');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('user/verify', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'otp' => '',
                    'otp_err' => '',
                ];

                $this->view('user/verify', $data);
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
            $_SESSION['first_name'] = $user->FirstName;
            
            switch($_SESSION['user_type_id']) {
                case 1:
                    redirect('home/index');
                    break;
                case 2: 
                    redirect('home/manager');
                    break;
                case 3: case 4: case 5:
                    redirect('home/partner');
                    break;
                case 6:
                    redirect('home/manager');
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
            redirect('home/index');
        }

        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            } else {
                return false;
            }
        }

        public function forgotPassword() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'email_err' => '',
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                // Make sure errors are empty
                if(empty($data['email_err'])) {
                    // Validated
                    // Check and set logged in user
                    if($this->userModel->findUserByEmail($data['email'])) {
                        // User found
                        // Generate OTP
                        $otp = rand(100000, 999999);
                        $to = $data['email'];
                        $subject = "Password Reset";
                        $message = "Your OTP is: ".$otp;
                        $headers = "From:ArtRoom";
                        $_SESSION['otp'] = $otp;
                        $_SESSION['email'] = $data['email'];
                        if(mail($to, $subject, $message, $headers)){
                            // Redirect to reset password page
                            redirect('users/resetPassword');
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // User not found
                        $data['email_err'] = 'No user found';
                        $this->view('user/forgotpassword', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('user/forgotpassword', $data);
                }
            } else {
                // Init data
                $data = [
                    'email' => '',
                    'email_err' => '',
                ];

                // Load view
                $this->view('user/forgotpassword', $data);
            }
        }

        public function resetPassword() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'otp' => trim($_POST['otp']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'otp_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Validate OTP
                if(empty($data['otp'])) {
                    $data['otp_err'] = 'Please enter OTP';
                } elseif($data['otp'] != $_SESSION['otp']) {
                    $data['otp_err'] = 'Invalid OTP';
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
                if(empty($data['otp_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated
                    // Reset Password
                    if($this->userModel->resetPassword($data)) {
                        // Unset session variables
                        unset($_SESSION['otp']);
                        unset($_SESSION['email']);
                        session_destroy();
                        flash('password_reset', 'Password reset successful');
                        redirect('users/login');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('user/resetpassword', $data);
                }
            } else {
                // Init data
                $data = [
                    'otp' => '',
                    'password' => '',
                    'confirmPassword' => '',
                    'otp_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                $this->view('user/resetpassword', $data);
            }
        }


        // Edit user
        public function edit($id){
            $user = $this->userModel->getUserById($id);
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init data
                $data = [
                    'id' => $id,
                    'firstName' => trim($_POST['firstName']), 
                    'lastName' => trim($_POST['lastName']),
                    'contactNumber' => trim($_POST['contactNumber']),
                    'email' => trim($_POST['email']),
                    // 'password' => trim($_POST['password']),
                    // 'confirmPassword' => trim($_POST['confirmPassword']),
                    'userType' => $_POST['userType'],
                    'specialization' => $_POST['specialization'],
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'contact_err' => '',
                    // 'password_err' => '',
                    // 'confirm_password_err' => '',
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email
                    if($data['email']==$user->Email){
                        $data['email_err'] = '';
                    }
                    elseif($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Contact Number
                if(empty($data['contactNumber'])) {
                    $data['contact_err'] = 'Please enter phone number';
                } else {
                    // Check email
                    if($data['contactNumber']==$user->ContactNumber){
                        $data['contact_err'] = '';
                    }
                    elseif($this->userModel->findUserByContactNumber($data['contactNumber'])) {
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

                // // Validate Password
                // if(empty($data['password'])) {
                //     $data['password_err'] = 'Please enter password';
                // } elseif(strlen($data['password']) < 6) {
                //     $data['password_err'] = 'Password must be at least 6 characters';
                // }

                // // Validate Confirm Password
                // if(empty($data['confirmPassword'])) {
                //     $data['confirm_password_err'] = 'Please confirm password';
                // } else {
                //     if($data['password'] != $data['confirmPassword']) {
                //         $data['confirm_password_err'] = 'Passwords do not match';
                //     }
                // }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['contact_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated

                    // Hash Password
                    // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->userModel->editUser($data)) {
                        echo 'Success';
                        flash('register_success', 'You are registered and can log in');
                        switch($data['user_type_id']) {
                            case 1:
                                redirect('users/getCustomers'); break;
                            case 3:
                                redirect('users/getPhotographers'); break;
                            case 4:
                                redirect('users/getEditors'); break;
                            case 5:
                                redirect('users/getPrintingFirms'); break;
                            default:
                                redirect('users/'); break;
                        }
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('pages/manager/users/edituser', $data);
                }


            } else {
                // Init data
                $data = [
                    'id' => $id,
                    'firstName' => $user->FirstName, 
                    'lastName' => $user->LastName,
                    'contactNumber' => $user->ContactNumber,
                    'email' => $user->Email,
                    // 'password' => '',
                    // 'confirmPassword' => '',
                    'userType' => $user->UserTypeID,
                    'specialization' => $user->Specialization,
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'contact_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                $this->view('pages/manager/users/edituser', $data);
            }
        }

        // Delete user
        public function delete($id){
            if($this->userModel->deleteUser($id)) {
                flash('user_deleted', 'User Removed');
                redirect('users');
            } else {
                die('Something went wrong');
            }
        }


        // Get all users
        public function getUsers() {
            $users = $this->userModel->getUsers();
            $data = [
                'users' => $users
            ];
            $this->view('pages/manager/users/users', $data);
        }

        // Get user by id
        public function getUserById($id) {
            $user = $this->userModel->getUserById($id);
            $data = [
                'user' => $user
            ];
            $this->view('pages/manager/users/viewuser', $data);
        }

        // Get only customers
        public function getCustomers() {
            $customers = $this->userModel->getCustomers();
            $data = [
                'customers' => $customers
            ];
            $this->view('pages/manager/users/customers', $data);
        }

        // Get only photographers
        public function getPhotographers() {
            $photographers = $this->userModel->getPhotographers();
            $data = [
                'photographers' => $photographers
            ];
            $this->view('pages/manager/users/photographers', $data);
        }

        // Get only printing firms
        public function getPrintingFirms() {
            $printingFirms = $this->userModel->getPrintingFirms();
            $data = [
                'printingFirms' => $printingFirms
            ];
            $this->view('pages/manager/users/printingfirms', $data);
        }

        // Get only editors
        public function getEditors() {
            $editors = $this->userModel->getEditors();
            $data = [
                'editors' => $editors
            ];
            $this->view('pages/manager/users/editors', $data);
        }

        public function editProfile($id) {
            $user = $this->userModel->getUserById($id);
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
    
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                // Init data
                $data = [
                    'id' => $id,
                    'firstName' => trim($_POST['firstName']), 
                    'lastName' => trim($_POST['lastName']),
                    'contactNumber' => trim($_POST['contactNumber']),
                    'email' => trim($_POST['email']),
                    'oldPassword' => trim($_POST['oldPassword']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'specialization' => $_POST['specialization'],
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'contact_err' => '',
                    'password_err' => '',
                    'old_password_err' => '',
                    'confirm_password_err' => '',
                ];
    
                // Validate Email, Contact Number, Name, and Old Password (similar to your existing logic)
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email
                    if($data['email']==$user->Email){
                        $data['email_err'] = '';
                    }
                    elseif($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }
    
                // Validate Password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }
    
                // Validate Confirm Password
                if (empty($data['confirmPassword'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }
    
                // Check for any errors
                if (empty($data['email_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['contact_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // No errors, proceed with updating user profile
    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
                    // Update User Profile
                    if ($this->userModel->editProfile($data)) {
                        echo 'Success';
                        $this->createUserSession($user);
                        // redirect('users/profile');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('user/editProfile', $data);
                }
            } else {
                // Display edit profile form
                $data = [
                    'id' => $id,
                    'firstName' => $user->FirstName, 
                    'lastName' => $user->LastName,
                    'contactNumber' => $user->ContactNumber,
                    'email' => $user->Email,
                    'oldPassword' => '',
                    'password' => '',
                    'confirmPassword' => '',
                    'specialization' => '',
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'contact_err' => '',
                    'email_err' => '',
                    'old_password_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];
    
                $this->view('user/editProfile', $data);
            }
        }

        //view protographers
        public function viewPhotographers() {
            $photographers = $this->userModel->viewPhotographers();
            $data = [
                'photographers' => $photographers
            ];
            $this->view('pages/customer/photographers', $data);
        }

        //view protographer
        public function viewPhotographer($id) {
            $partner = $this->userModel->getUserById($id);
            $samples = $this->sampleModel->getSamplesByPhotographer($id);
            $data = [
                'partner' => $partner,
                'samples' => $samples
            ];
            $this->view('pages/customer/viewPhotographer', $data);
        }
    }