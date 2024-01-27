<?php

class Partners extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->eventModel = $this->model('Event');
        $this->packageModel = $this->model('Package');
        $this->sampleModel = $this->model('Sample');
        $this->partnerModel = $this->model('Partner');
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

        $data = [
            'events' => $events
        ];
    
        $this->view('pages/partner/events', $data);
    }

    // photographer action handler
    public function updatePartnerAction($user_type_id, $event_id, $action , $comment) {
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
        $this->viewPartnerEvents($_SESSION['user_id']);
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
        $data = [
            'event' => $event,
            'package' => $package
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

}