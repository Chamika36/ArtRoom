<?php

class Home extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->eventModel = $this->model('Event');
    }

   public function index() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home', $data);
    }

    public function aboutUs() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home2', $data);
    }

    public function services(){
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home3', $data);
    }

    public function manager() {
        $eventCount = $this->eventModel->getEventCount();
        $requestCount = $this->eventModel->getRequestCount();

        $data = [
            'title' => 'Home',
            'eventCount' => $eventCount,
            'requestCount' => $requestCount
        ];
        $this->view('pages/manager/dashboard', $data);
    }

    public function partner(){
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/partner/requests', $data);
    }

    // error page
    public function error() {
        $data = [
            'title' => 'Error'
        ];
        $this->view('errors/404.view', $data);
    }
}

?>