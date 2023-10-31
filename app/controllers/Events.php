<?php
    class Events extends Controller{
        public function __construct() {
            $this->eventModel = $this->model('Event');
            $this->userModel = $this->model('User');
        }

        public function index() {
            $requests = $this->eventModel->getRequests();
            $events = $this->eventModel->getEvents();
        
            // Loop through the requests and format the date
            foreach ($requests as $request) {
                $request->EventDate = date('F j, Y', strtotime($request->EventDate));
            }

            // Loop through the events and format the date
            foreach ($events as $event) {
                $event->EventDate = date('F j, Y', strtotime($event->EventDate));
            }
        
            $data = [
                'title' => 'Home',
                'requests' => $requests,
                'events' => $events
            ];

            $this->view('pages/manager/events/events', $data);
        }

        public function calendar() {
            $data = [
                'title' => 'Home'
            ];

            $this->view('pages/manager/events/calendar', $data);
        }

        // View all events
        public function viewEvents() {
            $events = $this->eventModel->getEvents();
            $data = [
                'events' => $events
            ];

            $this->view('pages/manager/events/viewRequests', $data);
        }

        //view all requests
        public function viewRequests() {
            $requests = $this->eventModel->getRequests();
        
            // Loop through the requests and format the date
            foreach ($requests as $request) {
                $request->EventDate = date('F j, Y', strtotime($request->EventDate));
            }
        
            $data = [
                'requests' => $requests
            ];
        
            $this->view('pages/manager/events/calendar', $data);
        }

        // Manage event
        public function manageEvent($id) {
            $event = $this->eventModel->getEventById($id);
            $photographers = $this->userModel->getPhotographers();
            $editors = $this->userModel->getEditors();
            $printingFirms = $this->userModel->getPrintingFirms();

            $data = [
                'event' => $event,
                'photographers' => $photographers,
                'editors' => $editors,
                'printingFirms' => $printingFirms
            ];

            

            $this->view('pages/manager/events/manageEvent', $data);
        }
    }