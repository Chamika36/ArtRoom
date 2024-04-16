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
    


    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // File upload for cover image
            $cover_image = $_FILES['image'];
            $cover_image_arr = array();
            $upload_err_cover = false;
    
            // Check for cover image upload error
            if($cover_image['error'] === 0){
                // Generate a unique name for the cover image
                $cover_image_new_name = uniqid('', true) . '_' . $cover_image['name'];
                // Set the path where the cover image will be stored
                $cover_image_destination = 'images/samples/' . $_POST['name'] . '/' . $cover_image_new_name;
    
                // Create the folder if it doesn't exist
                if (!is_dir('images/samples/' . $_POST['name'])) {
                    mkdir('images/samples/' . $_POST['name'], 0777, true);
                }
    
                // Move the uploaded cover image to the destination folder
                if(!move_uploaded_file($cover_image['tmp_name'], $cover_image_destination)){
                    // Error uploading cover image
                    $upload_err_cover = true;
                }
            } else {
                // Error uploading cover image
                $upload_err_cover = true;
            }
    
            // File upload for sample images
            $images = $_FILES['images'];
            $images_arr = array();
            $upload_err = false;
    
            // Loop through each image file
            foreach ($images['tmp_name'] as $key => $image_tmp_name) {
                $image_name = $images['name'][$key];
                $image_err = $images['error'][$key];
    
                // Check for file upload error
                if($image_err === 0){
                    // Generate a unique name for the image
                    $image_new_name = uniqid('', true) . '_' . $image_name;
                    // Set the path where the image will be stored
                    $image_destination = 'images/samples/' . $_POST['name'] . '/' . $image_new_name;
    
                    // Move the uploaded file to the destination folder
                    if(!move_uploaded_file($image_tmp_name, $image_destination)){
                        // Error uploading file
                        $upload_err = true;
                        break;
                    }
                    $images_arr[] = $image_new_name;
                } else {
                    // Error uploading file
                    $upload_err = true;
                    break;
                }
            }
    
            if($upload_err || $upload_err_cover) {
                $data['images_err'] = 'Error uploading files';
                $this->view('pages/manager/samples/addsample', $data);
            } else {
                // Init data
                $data = array(
                    'name' => trim($_POST['name']), 
                    'images' => $images_arr,
                    'imagePath' => $cover_image_destination, // Add the cover image path
                    'cover_image' => $cover_image_new_name,
                    'description' => trim($_POST['description']),
                    'customer' => trim($_POST['customer']),
                    'date' => trim($_POST['date']),
                    'name_err' => '',
                    'images_err' => '',
                    'description_err' => '',
                    'customer_err' => '',
                    'date_err' => ''
                );
    
                // Validate Name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
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
            }
        } else {
            $customers = $this->userModel->getCustomers();
    
            $data = array(
                'name' => '',
                'images' => '',
                'description' => '',
                'customers' => $customers,
                'customer' => '',
                'date' => '',
                'name_err' => '',
                'images_err' => '',
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