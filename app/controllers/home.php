<?php


class Home extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
    }

   public function index() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home2', $data);
    }

    public function dash() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/manager/dashboard', $data);
    }
}


?>