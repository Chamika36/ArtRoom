<?php

class Partners extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->eventModel = $this->model('Event');
        $this->packageModel = $this->model('Package');
        $this->sampleModel = $this->model('Sample');
        $this->partnerModel = $this->model('Partner');
        $this->notificationModel = $this->model('Notification');
    }

    // view index
    public function index() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/partner/home', $data);
    }

    public function index2() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/partner/eventdetails', $data);
    }
    // View event by ech Partner
    public function viewPartnerEvents($id) {
        $events = $this->eventModel->getEventsByPartner($id);

        foreach ($events as $event) {
            $user_type_id = $_SESSION['user_type_id'];
            $action = '';

            switch($user_type_id) {
                case 3:
                    $action = $this->partnerModel->getPhotographerAction($event->EventID); 
                    break;
                case 4:
                    $action = $this->partnerModel->getEditorAction($event->EventID);
                    break;
                case 5:
                    $action = $this->partnerModel->getPrintingFirmAction($event->EventID);
                    break;
                default:
                    $action = '';
                    break;
            }

            $event->UserTYpe = $user_type_id;
            $event->Action = $action->Action;
        }

        $data = [
            'events' => $events,
        ];
    
        $this->view('pages/partner/events', $data);
    }


    // photographer action handler
    public function updatePartnerAction($user_type_id, $event_id, $action , $comment) {
        $notification_data = [
            'user_id' => '16',
            'type' => 'action',
            'content' => 'Your event has been updated',
            'link' => 'events/loadEvent/'.$event_id,
            'event_id' => $event_id
        ];

        $event = $this->eventModel->getEventById($event_id);
        
        switch ($user_type_id) {
            case 3:
                $this->partnerModel->updatePhotographerAction($event_id, $action , $comment);
                break;
            case 4:
                $this->partnerModel->updateEditorAction($event_id, $action, $comment);
                break;
            case 5:
                $this->partnerModel->updatePrintingFirmAction($event_id, $action, $comment);
                break;
        }
        
        $this->notificationModel->createNotification($notification_data);
        redirect('partners/viewEvent/'.$event_id);
    }

    public function samples(){
        $samples = $this->sampleModel->getSamples();
        $data = [
            'samples' => $samples
        ];
        $this->view('pages/partner/samples', $data);
    } 

    public function viewEvent($id){
        $event = $this->eventModel->getEventById($id);
        $package = $this->packageModel->getPackageById($event->PackageID);
        switch($_SESSION['user_type_id']) {
            case 3:
                $action = $this->partnerModel->getPhotographerAction($event->EventID); 
                break;
            case 4:
                $action = $this->partnerModel->getEditorAction($event->EventID);
                break;
            case 5:
                $action = $this->partnerModel->getPrintingFirmAction($event->EventID);
                break;
            default:
                $action = '';
                break;
        }

        $data = [
            'event' => $event,
            'package' => $package,
            'action' => $action->Action
        ];

        $this->view('pages/partner/eventdetails', $data);
    }

    public function profile($id){
        $partner = $this->userModel->getUserById($id);
        $data = [
            'partner' => $partner
        ];
        $this->view('pages/partner/profile', $data);
        
    }
    public function editPartner($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Init data
            $data = [
                'id' => $id,
                'FirstName' => trim($_POST['FirstName']), 
                'LastName' => trim($_POST['LastName']),
                'ContactNumber' => trim($_POST['ContactNumber']),
                'Address' => $_POST['Address'],
                'Email' => trim($_POST['Email']),
                'Bio' => $_POST['Bio'],

                
            ];

            // Validate Name
        //     if(empty($data['name'])) {
        //         $data['name_err'] = 'Please enter name';
        //     }

        //     // Validate Price
        //     if(empty($data['price'])) {
        //         $data['price_err'] = 'Please enter price';
        //     }

        //     // Validate Description
        //     if(empty($data['description'])) {
        //         $data['description_err'] = 'Please enter description';
        //     }

        //     // Make sure no errors
        //     if(empty($data['name_err']) && empty($data['price_err']) && empty($data['description_err'])) {
        //         // Validated
        //         if($this->packageModel->editPackage($data)) {
        //             flash('package_edited', 'Package Edited');
        //             redirect('packages');
        //         } else {
        //             die('Something went wrong');
        //         }
        //     } else {
        //         // Load view with errors
        //         $this->view('pages/manager/packages/editpackage', $data);
        //     }

        } else {
            $package = $this->userModel->getUserById($id);

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
        $this->view('pages/partner/editprofile', $data);
        }
    }

    // file upload to google drive
    public function uploadImagesbyPhotographer($eventID) {
        $event = $this->eventModel->getEventById($eventID);
        $link = 'https://drive.google.com/drive/folders/1SK44Gnhk4HHCzr4b7FnmMlybWBTOJ8d6?usp=sharing';

        $notification_data_customer = [
            'user_id' => $event->CustomerID,
            'type' => 'file',
            'content' => 'Photographer has uploaded your images. Select the photos wanted to print and Move to "Customer Selected" folder',
            'link' => $link,
            'event_id' => $eventID
        ];

        $notification_data_editor = [
            'user_id' => $event->EditorID,
            'type' => 'file',
            'content' => 'Photographer has uploaded images. Click to edit',
            'link' => $link,
            'event_id' => $eventID
        ];

        $this->notificationModel->createNotification($notification_data_customer);
        $this->notificationModel->createNotification($notification_data_editor);
        header('Location: ' . $link);
    }

    public function viewImagesbyEditor($eventID){
        $link = 'https://drive.google.com/drive/folders/1SK44Gnhk4HHCzr4b7FnmMlybWBTOJ8d6?usp=sharing';
        header('Location: ' . $link);
    }

    // file upload to google drive
    public function uploadImagesbyEditor($eventID) {
        $event = $this->eventModel->getEventById($eventID);
        $link = 'https://drive.google.com/drive/folders/1SK44Gnhk4HHCzr4b7FnmMlybWBTOJ8d6?usp=sharing';

        $notification_data_printing = [
            'user_id' => $event->PrintingFirmID,
            'type' => 'file',
            'content' => 'Editor has uploaded images. Click to print',
            'link' => $link,
            'event_id' => $eventID
        ];

        $this->notificationModel->createNotification($notification_data_printing);
        header('Location: ' . $link);
    }

    public function viewImagesbyPrinting($eventID){
        $link = 'https://drive.google.com/drive/folders/1SK44Gnhk4HHCzr4b7FnmMlybWBTOJ8d6?usp=sharing';
        header('Location: ' . $link);
    }

}