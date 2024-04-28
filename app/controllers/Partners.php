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
                if($action == 'Declined') {
                    $notification_data_customer = [
                        'user_id' => $event->CustomerID,
                        'type' => 'action',
                        'content' => 'Photographer has declined the event. Reselect a photographer or cancel the event',
                        'link' => 'events/viewEvent/'.$event_id,
                        'event_id' => $event_id
                    ];
                    $this->notificationModel->createNotification($notification_data_customer);
                }
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
        $samples = $this->sampleModel->getSamplesByPhotographer($id);
        $data = [
            'partner' => $partner,
            'samples' => $samples
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
                'FirstName' => $_POST['FirstName'],
                'LastName' => $_POST['LastName'],
                'Bio' => $_POST['Bio']
            ];

            if($this->partnerModel->editPartner($data)) {
                flash('partner_edited', 'Partner Edited');
                redirect('partners/profile/'.$id);
            } else {
                die('Something went wrong');
            }
        } else {
            $partner = $this->userModel->getUserById($id);

            $data = [
                'id' => $id,
                'FirstName' => $partner->FirstName,
                'LastName' => $partner->LastName,
                'Bio' => $partner->Bio,
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
    
    public function editbio($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Init data
            $data = [
                'id' => $id,
                'Bio' => $_POST['Bio'],
            ];

            if($this->partnerModel->editBio($data)) {
                flash('bio_edited', 'Bio Edited');
                redirect('partners/profile/'.$id);
            } else {
                die('Something went wrong');
            }
        } else {
            $partner = $this->userModel->getUserById($id);

            $data = [
                'id' => $id,
                'Bio' => $partner->Bio,
            ];
            $this->view('pages/partner/editbio', $data);
        }
    }

    public function uploadProfilePicture() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check if the request contains a file
            if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
                // Get the uploaded file
                $file = $_FILES['profilePicture'];
    
                // Check if the file is an image
                $mime = mime_content_type($file['tmp_name']);
                if (strpos($mime, 'image/') !== false) {
                    // Read the file content
                    $imageData = file_get_contents($file['tmp_name']);
    
                    // Update the user's profile picture in the database
                    $userId = $_SESSION['user_id']; // Assuming you have the user ID in the session
                    $success = $this->partnerModel->updateProfilePicture($userId, $imageData);
    
                    if ($success) {
                        // Redirect or return a success message
                        redirect('partners/profile/' . $userId);
                        return "Profile picture uploaded successfully";
                        flash('profile_picture_uploaded', 'Profile picture uploaded successfully');
                    } else {
                        flash('upload_error', 'Error uploading profile picture');
                        redirect('partners/profile/' . $userId);
                    }
                } else {
                    flash('invalid_file_type', 'Invalid file type. Please upload an image');
                    redirect('partners/profile/' . $userId);
                }
            } else {
                flash('no_file_uploaded', 'No file uploaded');
                redirect('partners/profile/' . $userId);
            }
        }
    }
    
    
}