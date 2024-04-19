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
                $cover_image_new_name = ''; // Initialize cover image name
                $cover_image_destination = ''; // Initialize cover image destination
                $upload_err_cover = false;

                // Check for cover image upload error
                if ($cover_image['error'] === 0) {
                    // Generate a unique name for the cover image
                    $cover_image_new_name = uniqid('', true) . '_' . $cover_image['name'];
                    // Set the path where the cover image will be stored
                    $cover_image_destination = 'images/samples/' . $_POST['name'] . '/' . $cover_image_new_name;

                    // Create the folder if it doesn't exist
                    if (!is_dir('images/samples/' . $_POST['name'])) {
                        mkdir('images/samples/' . $_POST['name'], 0777, true);
                    }

                    // Move the uploaded cover image to the destination folder
                    if (!move_uploaded_file($cover_image['tmp_name'], $cover_image_destination)) {
                        // Error uploading cover image
                        $upload_err_cover = true;
                    }
                } else {
                    // Error uploading cover image
                    $upload_err_cover = true;
                }

                // Proceed if no cover image upload error
                if (!$upload_err_cover) {
                    // Create the path of the folder containing sample images
                    $sample_image_folder_path = 'images/samples/' . $_POST['name'];

                    // Init data
                    $data = array(
                        'name' => trim($_POST['name']),
                        'imagePath' => $sample_image_folder_path, // Save the path of the sample image folder
                        'coverImagePath' => $cover_image_new_name, // Save the name of the cover image file
                        'description' => trim($_POST['description']),
                        'customer' => trim($_POST['customer']),
                        'date' => trim($_POST['date']),
                        'name_err' => '',
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
                    if (empty($data['name_err']) && empty($data['description_err']) && empty($data['customer_err']) && empty($data['date_err'])) {
                        // Validated
                        if ($this->sampleModel->addSample($data)) {
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
                    // Error uploading cover image
                    $data['images_err'] = 'Error uploading cover image';
                    $this->view('pages/manager/samples/addsample', $data);
                }
            } else {
                $customers = $this->userModel->getCustomers();

                $data = array(
                    'name' => '',
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
    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Handle file uploads for cover image
            $cover_image = $_FILES['image'];
            $cover_image_new_name = ''; // Initialize cover image name
            $cover_image_destination = ''; // Initialize cover image destination
            $upload_err_cover = false;
    
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
    
            // Proceed with updating the sample data
            $data = array(
                'id' => $id,
                'name' => trim($_POST['name']), 
                'imagePath' => $cover_image_destination, // Update with the new cover image path
                'coverImagePath' => $cover_image_new_name, // Update with the new cover image name
                'description' => trim($_POST['description']),
                'date' => trim($_POST['date'])
                // Add other fields if necessary
            );
    
            // Validate data if needed
    
            // Update the sample
            if($this->sampleModel->updateSample($data)) {
                flash('sample_message', 'Sample Updated');
                redirect('samples');
            } else {
                die('Something went wrong');
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