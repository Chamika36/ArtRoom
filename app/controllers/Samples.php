<?php
class Samples extends Controller{
    public function __construct() {
        $this->sampleModel = $this->model('Sample');
        $this->userModel = $this->model('User');
        $this->notificationModel = $this->model('Notification');
    }

    public function index() {
        if(isset($_SESSION['user_type_id']) && $_SESSION['user_type_id'] == 3) {
            $samples = $this->sampleModel->getSamplesByPhotographer($_SESSION['user_id']);  
        }else if(!isset($_SESSION['user_type_id']) || $_SESSION['user_type_id'] == 1) {
            $samples = $this->sampleModel->getVisibleSamples();
        }else {
            $samples = $this->sampleModel->getSamples();
        }
        $customers = $this->userModel->getCustomers();
    
        $data = array(
            'samples' => $samples,
            'customers' => $customers
        );

        if(isset($_SESSION['user_type_id'])){
            if($_SESSION['user_type_id'] == 2) { 
                // If user is a manager (user_type_id 2)
                $this->view('pages/manager/samples/samples', $data);
            } 
            else if($_SESSION['user_type_id'] == 3) {
                // If user is a partner (user_type_id 3)
                $this->view('pages/partner/samples', $data);
            } else {
                $this->view('pages/customer/samples/samples', $data);
            }
        } else {
            $this->view('pages/customer/samples/samples', $data);
        }
        
        
    }
    


  
    public function add($isPartner) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // File upload for cover image
            $cover_image = $_FILES['image'];
            $cover_image_new_name = ''; // Initialize cover image name
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
                    $image_folder = 'images/samples/' . $_POST['name'];
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
        
                if($upload_err) {
                    $data['images_err'] = 'Error uploading files';
                    $this->view('pages/manager/samples/addsample', $data);
                } else {
                    // Init data
                    $data = array(
                        'name' => trim($_POST['name']), 
                        'imagePath' => $image_folder, // Pass the path of the uploaded cover image
                        'coverImagePath' => $cover_image_destination, // Pass the name of the cover image file
                        'images' => $images_arr,
                        'description' => trim($_POST['description']),
                        'customer' => trim($_POST['customer']),
                        'date' => trim($_POST['date']),
                        'name_err' => '',
                        'images_err' => '',
                        'description_err' => '',
                        'customer_err' => '',
                        'date_err' => ''
                    );

                    if($isPartner == 1) {
                        $data['photographer'] = $_SESSION['user_id'];
                    } else {
                        $data['photographer'] = trim($_POST['photographer']);
                    }
        
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
                        $sample_id = $this->sampleModel->addSample($data);
                        if ($sample_id) {
                            $notification_customer = [
                                'user_id' => $data['customer'],
                                'type' => 'sample',
                                'content' => 'Your images added to the sample gallery. View and confirm public visibility',
                                'link' => 'samples/viewSample/'.$sample_id,
                                'event_id' => 55
                            ];
                            $this->notificationModel->createNotification($notification_customer);
                            flash('sample_message', 'Sample Added');
                            if($isPartner == 1) {
                                redirect('samples/getSamplesByPhotographer');
                            } else {
                                redirect('samples');
                            }
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // Load view with errors
                        if($isPartner == 1) {
                            $this->view('pages/partner/addsample', $data);
                        } else {
                            $this->view('pages/manager/samples/addsample', $data);
                        }
                    }
                }
            } else {
                // Error uploading cover image
                $data['images_err'] = 'Error uploading cover image';
                if($isPartner == 1) {
                    $this->view('pages/partner/addsample', $data);
                } else {
                    $this->view('pages/manager/samples/addsample', $data);
                }
            }
        } else {
            $customers = $this->userModel->getCustomers();
            $photographers = $this->userModel->getPhotographers();

            $data = array(
                'name' => '',
                'description' => '',
                'photographers' => $photographers,
                'customers' => $customers,
                'photographer' => '',
                'customer' => '',
                'date' => '',
                'name_err' => '',
                'images_err' => '',
                'description_err' => '',
                'customer_err' => '',
                'date_err' => ''
            );

            if($isPartner == 1) {
                $this->view('pages/partner/addsample', $data);
            } else {
                $this->view('pages/manager/samples/addsample', $data);
            }
        }
    }

    public function delete($id){
        $folderPath = $this->sampleModel->getSampleById($id)->ImagePath; 
        if($this->sampleModel->deleteSample($id)) {
            // Delete the folder
            if (is_dir($folderPath)) {
                $this->deleteFolder($folderPath);
            }
    
            flash('sample_message', 'Sample Removed');
            redirect('samples');
        } else {
            die('Something went wrong');
        }
    }
    
    private function deleteFolder($folderPath) {
        if (is_dir($folderPath)) {
            $files = scandir($folderPath);
            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    $filePath = $folderPath . '/' . $file;
                    if (is_dir($filePath)) {
                        $this->deleteFolder($filePath);
                    } else {
                        unlink($filePath);
                    }
                }
            }
            rmdir($folderPath);
        }
    }
    

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Handle file uploads for cover image
            $cover_image = $_FILES['images'];
            $cover_image_new_name = ''; // Initialize cover image name
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
                // Proceed with updating the sample data
                $data = array(
                    'id' => $id,
                    'name' => trim($_POST['name']),
                    'coverImagePath' => $cover_image_destination, // Update with the new cover image path
                    'description' => trim($_POST['description']),
                    'date' => trim($_POST['date']),
                    'photographer' => trim($_POST['photographer']),
                    'customer' => trim($_POST['customer'])
                    // Add other fields if necessary
                );
    
                // Validate data if needed
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

                if(empty($data['images'])) {
                    $data['imagePath_err'] = 'Please upload images';
                }

                // Make sure no errors
                if (empty($data['name_err']) && empty($data['description_err']) && empty($data['customer_err']) && empty($data['date_err'])) {
                    // Update the sample
                    if ($this->sampleModel->updateSample($data)) {
                        flash('sample_message', 'Sample Updated');
                        redirect('samples');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Error uploading cover image
                $data['images_err'] = 'Error uploading cover image';
                $this->view('pages/manager/samples/editsample', $data);
            }
        } else {
            // Get existing sample from model
            $sample = $this->sampleModel->getSampleById($id);
    
            $customers = $this->userModel->getCustomers();
            $photographers = $this->userModel->getPhotographers();
    
            $data = array(
                'id' => $id,
                'name' => $sample->SampleName,
                'description' => $sample->Description,
                'date' => $sample->Date,
                'photographer' => $sample->PhotographerID,
                'customer' => $sample->CustomerID,
                'photographers' => $photographers,
                'customers' => $customers,
                'name_err' => '',
                'imagePath_err' => '',
                'description_err' => '',
                'customer_err' => '',
                'date_err' => ''
            );
    
            $this->view('pages/manager/samples/editsample', $data);
        }
    }
    

    public function viewSample($id) {
        $sample = $this->sampleModel->getSampleById($id);
        $folder = $sample->ImagePath . '/';
        $images = glob($folder . "*.jpg");

    
        $data = array(
            'sample' => $sample,
            'folder' => $folder,
            'images' => $images,
            'samples' => $sample
        );


        if(isset($_SESSION['user_id'])) {
            if($_SESSION['user_type_id'] == 2) {
                $this->view('pages/manager/samples/viewsample', $data);
            } else if ($_SESSION['user_type_id'] == 3) {
                $this->view('pages/partner/viewsample', $data);
            } else {
                $this->view('pages/customer/samples/viewsample', $data);
            }
        } else {
            $this->view('pages/customer/samples/viewsample', $data);

        }
    }

    public function makePublic($sample_id) {
        if($this->sampleModel->updateVisibility($sample_id , 1)) {
            flash('sample_message', 'Sample visibility updated');
            redirect('samples/viewSample/'.$sample_id);
        } else {
            die('Something went wrong');
        }

    }

    public function getSamplesByPhotographer(){
        $samples = $this->sampleModel->getSamplesByPhotographer($_SESSION['user_id']);
        $data = array(
            'samples' => $samples
        );
        $this->view('pages/partner/samples', $data);
    }
}