<?php
    class Events extends Controller{
        public function __construct() {
        }

        public function index() {
            $data = [
                'title' => 'Home'
            ];

            $this->view('pages/manager/events/events', $data);
        }
    }