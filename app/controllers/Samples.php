<?php
class Samples extends Controller{
    public function __construct() {
        $this->sampleModel = $this->model('Sample');
        $this->userModel = $this->model('User');
    }

    public function index() {
        $samples = $this->sampleModel->getSamples();
        $customers = $this->userModel->getCustomers();

        $data = array(
            'samples' => $samples,
            'customers' => $customers
        );
        
        if($_SESSION['user_type_id'] == 2) {
            $this->view('pages/manager/samples/samples', $data);
        } else {
            $this->view('pages/customer/samples/samples', $data);
        }
    }


    // public function add(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Sanitize POST data
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
    //         // Init data
    //         $data = [
    //             'name' => trim($_POST['name']), 
    //             'imagePath' => trim($_POST['imagePath']),
    //             'description' => trim($_POST['description']),
    //             'customer' => trim($_POST['customer']),
    //             'date' => trim($_POST['date']),
    //             'name_err' => '',
    //             'imagePath_err' => '',
    //             'description_err' => '',
    //             'customer_err' => '',
    //             'date_err' => ''
    //         ];

    //         // Validate Name
    //         if(empty($data['name'])) {
    //             $data['name_err'] = 'Please enter name';
    //         }

    //         // Validate Image Path
    //         if(empty($data['imagePath'])) {
    //             $data['imagePath_err'] = 'Please enter image path';
    //         }

    //         // Validate Description
    //         if(empty($data['description'])) {
    //             $data['description_err'] = 'Please enter description';
    //         }

    //         // Validate Date
    //         if(empty($data['date'])) {
    //             $data['date_err'] = 'Please enter date';
    //         }

    //         // Make sure no errors
    //         if(empty($data['name_err']) && empty($data['imagePath_err']) && empty($data['description_err']) && empty($data['customer_err']) && empty($data['date_err'])) {
    //             // Validated
    //             if($this->sampleModel->addSample($data)) {
    //                 flash('sample_message', 'Sample Added');
    //                 redirect('samples');
    //             } else {
    //                 die('Something went wrong');
    //             }
    //         } else {
    //             // Load view with errors
    //             $this->view('pages/manager/samples/addsample', $data);
    //         }

    //     } else {

    //         $customers = $this->userModel->getCustomers();

    //         $data = [
    //             'name' => '',
    //             'imagePath' => '',
    //             'description' => '',
    //             'customers' => $customers,
    //             'customer' => '',
    //             'date' => '',
    //             'name_err' => '',
    //             'imagePath_err' => '',
    //             'description_err' => '',
    //             'customer_err' => '',
    //             'date_err' => ''
    //         ];
    
    //         $this->view('pages/manager/samples/addsample', $data);
    //     }
    // }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // File upload
            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_err = $_FILES['image']['error'];
    
            // Check for file upload error
            if($image_err === 0){
                // Generate a unique name for the image
                $image_new_name = uniqid('', true) . '_' . $image_name;
                // Set the path where the image will be stored
                $image_destination = 'images/samples/' . $image_new_name;
    
                // Move the uploaded file to the destination folder
                if(move_uploaded_file($image_tmp_name, $image_destination)){
                    // Init data
                    $data = array(
                        'name' => trim($_POST['name']), 
                        'imagePath' => $image_new_name,
                        'description' => trim($_POST['description']),
                        'customer' => trim($_POST['customer']),
                        'date' => trim($_POST['date']),
                        'name_err' => '',
                        'imagePath_err' => '',
                        'description_err' => '',
                        'customer_err' => '',
                        'date_err' => ''
                    );
    
                    // Validate Name, Description, Date, and Customer here...
    
                    // Make sure no errors
                    if(empty($data['name_err']) && empty($data['description_err']) && empty($data['customer_err']) && empty($data['date_err'])) {
                        // Validated
                        if($this->sampleModel->addSample($data)) {
                            flash('sample_message', 'Sample Added');
                            redirect('samples');
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // Load view with errors
                        $this->view('pages/manager/samples/addsample', $data);
                    }
                } else {
                    // Error uploading file
                    $data['image_err'] = 'Error uploading file';
                    $this->view('pages/manager/samples/addsample', $data);
                }
            } else {
                // No file uploaded
                $data['image_err'] = 'Please upload an image';
                $this->view('pages/manager/samples/addsample', $data);
            }
        } else {
            $customers = $this->userModel->getCustomers();
    
            $data = array(
                'name' => '',
                'imagePath' => '',
                'description' => '',
                'customers' => $customers,
                'customer' => '',
                'date' => '',
                'name_err' => '',
                'imagePath_err' => '',
                'description_err' => '',
                'customer_err' => '',
                'date_err' => ''
            );
    
            $this->view('pages/manager/samples/addsample', $data);
        }
    }
    
    

    // Delete Sample
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get existing sample from model
            $sample = $this->sampleModel->getSampleById($id);

            // Check for owner
            if($sample->CustomerID != $_SESSION['user_id']) {
                redirect('samples');
            }

            if($this->sampleModel->deleteSample($id)) {
                flash('sample_message', 'Sample Removed');
                redirect('samples');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('samples');
        }
    }

    // edit sample
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Init data
            $data = array(
                'id' => $id,
                'name' => trim($_POST['name']), 
                'imagePath' => trim($_POST['imagePath']),
                'description' => trim($_POST['description']),
                'date' => trim($_POST['date']),
                'name_err' => '',
                'imagePath_err' => '',
                'description_err' => '',
                'customer_err' => '',
                'date_err' => ''
            );

            // Validate Name
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Image Path
            if(empty($data['imagePath'])) {
                $data['imagePath_err'] = 'Please enter image path';
            }

            // Validate Description
            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }

            // Validate Date
            if(empty($data['date'])) {
                $data['date_err'] = 'Please enter date';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['imagePath_err']) && empty($data['description_err']) && empty($data['customer_err']) && empty($data['date_err'])) {
                // Validated
                if($this->sampleModel->updateSample($data)) {
                    flash('sample_message', 'Sample Updated');
                    redirect('samples');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pages/manager/samples/editsample', $data);
            }

        } else {
            // Get existing sample from model
            $sample = $this->sampleModel->getSampleById($id);

            $data = array(
                'id' => $id,
                'name' => $sample->SampleName,
                'imagePath' => $sample->ImagePath,
                'description' => $sample->Description,
                'date' => $sample->Date,
                'name_err' => '',
                'imagePath_err' => '',
                'description_err' => '',
                'customer_err' => '',
                'date_err' => ''
            );
            $this->view('pages/manager/samples/editsample', $data);
        }
    }

}