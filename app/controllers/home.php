<?php


class Home extends Controller {
    public function index() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home', $data);
    }

    public function dash() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/manager/dashboard', $data);
    }
}


?>