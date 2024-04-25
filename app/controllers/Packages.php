<?php
class Packages extends Controller {
    public function __construct() {
        $this->packageModel = $this->model('Package');
    }

    public function index() {
        $packages = $this->packageModel->getPackages();
        $data = [
            'packages' => $packages
        ];
        if($_SESSION['user_type_id'] == 2) {
            $this->view('pages/manager/packages/packages', $data);
        } else {
            $this->view('pages/customer/packages/packages', $data);
        }
    }

    // public function customerView(){
    //     $packages = $this->packageModel->getPackages();
    //     $data = [
    //         'packages' => $packages
    //     ];
    //     $this->view('pages/customer/packages/packages', $data);
    // }

    public function add() {
        $data = [
            'name' => '',
            'price' => '',
            'description' => '',
            'servicesIncluded' => '',
            'name_err' => '',
            'price_err' => '',
            'description_err' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Init data
            $data = [
                'name' => trim($_POST['name']), 
                'price' => trim($_POST['price']),
                'description' => trim($_POST['description']),
                'servicesIncluded' => $_POST['servicesIncluded'],
                'name_err' => '',
                'price_err' => '',
                'description_err' => ''
            ];

            // Validate Name
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Price
            if(empty($data['price'])) {
                $data['price_err'] = 'Please enter price';
            }

            // Validate Description
            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['price_err']) && empty($data['description_err'])) {
                // Validated
                if($this->packageModel->addPackage($data)) {
                    flash('package_message', 'Package Added');
                    redirect('packages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pages/manager/packages/addpackage', $data);
            }

        } else {
            $this->view('pages/manager/packages/addpackage', $data);
        }
    }

    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Init data
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']), 
                'price' => trim($_POST['price']),
                'description' => trim($_POST['description']),
                'servicesIncluded' => $_POST['servicesIncluded'],
                'name_err' => '',
                'price_err' => '',
                'description_err' => ''
            ];

            // Validate Name
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Price
            if(empty($data['price'])) {
                $data['price_err'] = 'Please enter price';
            }

            // Validate Description
            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['price_err']) && empty($data['description_err'])) {
                // Validated
                if($this->packageModel->editPackage($data)) {
                    flash('package_edited', 'Package Edited');
                    redirect('packages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pages/manager/packages/editpackage', $data);
            }

        } else {
            $package = $this->packageModel->getPackageById($id);

            $data = [
                'id' => $id,
                'name' => $package->Name,
                'price' => $package->Price,
                'description' => $package->Description,
                'servicesIncluded' => $package->ServicesIncluded,
                'name_err' => '',
                'price_err' => '',
                'description_err' => ''
            ];
            $this->view('pages/manager/packages/editpackage', $data);
        }
    }

    public function delete($id){
        try {
            if($this->packageModel->deletePackage($id)) {
                flash('package_deleted', 'Package Removed');
                redirect('packages');
            } else {
                die('Something went wrong');
                return false;
            }
        } catch (PDOException $e) {
            // Handle the database error
            $errorMessage = "Error: " . $e->getMessage();
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '{$errorMessage}'
                    }).then(() => {
                        window.location.href = '" . URLROOT . "/packages';
                    });
                  </script>";
            exit;
        }
    }
    
    

    // get package by id
    public function getPackageById($id) {
        $package = $this->packageModel->getPackageById($id);
        $data = [
            'package' => $package
        ];
        $this->view('pages/customer/packages/package', $data);
    }


}

