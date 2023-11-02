<?php

class Partners extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->eventModel = $this->model('Event');
        $this->packageModel = $this->model('Package'); 
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
}