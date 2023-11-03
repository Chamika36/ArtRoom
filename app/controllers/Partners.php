<?php

class Partners extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->eventModel = $this->model('Event');
        $this->packageModel = $this->model('Package'); 
        $this->sampleModel = $this->model('Sample');
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

    // Partner accepted event
    public function acceptEvent($id) {
        $this->eventModel->acceptEvent($id);
        
        $this->viewPartnerEvents($_SESSION['user_id']);
    }

    // Partner declined event
    public function declineEvent($id) {
        $this->eventModel->declineEvent($id);
        
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
}