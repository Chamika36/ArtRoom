<?php

class Home extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
    }

   public function index() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home', $data);
    }

    public function index2() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home2', $data);
    }

    public function index3() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home3', $data);
    }

    public function index4() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/announcements', $data);
    }

    public function manager() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/manager/dashboard', $data);
    }
}

?>