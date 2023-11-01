<?php
    class Events extends Controller{
        public function __construct() {
            $this->eventModel = $this->model('Event');
            $this->userModel = $this->model('User');
            $this->packageModel = $this->model('Package');
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

        // Event count
        public function eventCount() {
            $eventCount = $this->eventModel->getEventCount();
            return $eventCount;
        }

        // Request count
        public function requestCount() {
            $requestCount = $this->eventModel->getRequestCount();
            return $requestCount;
        }

        // Manage event
        public function manageEvent($id) {                      
            $event = $this->eventModel->getEventById($id);
            $package = $this->packageModel->getPackageById($event->PackageID);
            $photographers = $this->userModel->getPhotographers();
            $requestedPhotographer = $this->userModel->getUserById($event->PhotographerID);
            $editors = $this->userModel->getEditors();
            $printingFirms = $this->userModel->getPrintingFirms();

            $data = [
                'event' => $event,
                'package' => $package,
                'photographers' => $photographers,
                'requestedPhotographer' => $requestedPhotographer,
                'editors' => $editors,
                'printingFirms' => $printingFirms
            ];           

            $this->view('pages/manager/events/manageEvent', $data);
        }


        public function allocate($id) {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init data
                $data = [
                    'eventID' => $id,
                    'photographer' => trim($_POST['photographer']),
                    'editor' => trim($_POST['editor']),
                    'printingFirm' => trim($_POST['printingFirm']),
                    'photographer_err' => '',
                    'editor_err' => '',
                    'printingFirm_err' => ''
                ];

                // Validate photographer
                if(empty($data['photographer'])) {
                    $data['photographer_err'] = 'Please select photographer';
                }

                // Validate editor
                if(empty($data['editor'])) {
                    $data['editor_err'] = 'Please select editor';
                }

                // Validate printing firm
                if(empty($data['printingFirm'])) {
                    $data['printingFirm_err'] = 'Please select printing firm';
                }

                // Make sure errors are empty
                if(empty($data['printingFirm_err']) && empty($data['editor_err']) && empty($data['photographer_err']) ) {
                    if($this->eventModel->allocatePartners($data)) {
                        flash('event_message', 'Event allocated');
                        redirect('events');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('pages/manager/events/events', $data);
                }


            } else {
                // Init data
                $data = [
                    'eventID' => $id,
                    'photographer' => '',
                    'editor' => '',
                    'printingFirm' => '',
                    'photographer_err' => '',
                    'editor_err' => '',
                    'printingFirm_err' => ''
                ];

                // Load view
                $this->view('pages/manager/events/events', $data);
            }
        }
    }