<?php
    class Statistics extends Controller {
        public function __construct() {
            $this->EventModel = $this->model('Event');
        }

        public function index() {
            $events = $this->EventModel->getAllEvents();
            $data = [
                'events' => $events
            ];
            $this->view('pages/manager/statistics/main', $data);
        }
    }