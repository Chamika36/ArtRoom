<?php
    class Test extends Controller {

        public function __construct() {

        }
    
       public function index() {
            $data = [
                'title' => 'Home'
            ];
            $this->view('pages/customer/home', $data);
        }
    }