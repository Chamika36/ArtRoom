<?php
    class Events extends Controller{
        public function __construct() {
            $this->eventModel = $this->model('Event');
            $this->userModel = $this->model('User');
            $this->packageModel = $this->model('Package');
            $this->partnerModel = $this->model('Partner');
        }
                
        public function index() {
            $events = $this->eventModel->getAllEvents();
            $requests = $this->eventModel->getAllEvents();
            // Loop through the requests and format the date
            foreach ($requests as $request) {
                $request->EventDate = date('F j, Y', strtotime($request->EventDate));
                $request->Package = $this->packageModel->getPackageById($request->PackageID)->Name;
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

        // check login
        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            } else {
                return false;
            }
        }




        // event request
        public function request() {

            if (!$this->isLoggedIn()) {
                // If not logged in, display a message and redirect to the login page
                flash('event_message', 'Please log in to place a request');
                redirect('users/login');
                return;
            }

            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init data
                $data = [
                    'date' => trim($_POST['date']),
                    'startTime' => trim($_POST['startTime']),
                    'endTime' => trim($_POST['endTime']),
                    'customer' => $_POST['customer'],
                    'location' => trim($_POST['location']),
                    'requestedPhotographer' => trim($_POST['requestedPhotographer']),
                    'package' => trim($_POST['package']),
                    'additionalRequests' => trim($_POST['additionalRequests']),
                    'status' => 'Pencil',
                    'eventDate_err' => '',
                    'location_err' => '',
                    'photographer_err' => '',
                    'package_err' => '',
                    'additionalRequest_err' => ''
                ];

                // Validate event date
                if(empty($data['date'])) {
                    $data['eventDate_err'] = 'Please enter event date';
                }

                // Validate location
                if(empty($data['location'])) {
                    $data['location_err'] = 'Please enter location';
                }

                // Validate photographer
                if(empty($data['photographer'])) {
                    $data['photographer_err'] = 'Please select photographer';
                }

                // Validate package
                if(empty($data['package'])) {
                    $data['package_err'] = 'Please select package';
                }

                // Validate additional request
                if(empty($data['additionalRequest'])) {
                    $data['additionalRequest_err'] = 'Please enter additional request';
                }

                // Validate budget

                // Make sure errors are empty
                if(empty($data['eventDate_err']) && empty($data['location_err'])) {
                    if($this->eventModel->requestEvent($data)) {
                        $data['location_err'] = 'Not executed';
                        flash('event_message', 'Event requested');
                        redirect('events/viewCustomerEvents/' . $_SESSION['user_id'] . '');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('pages/customer/requestPage', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'date' => '',
                    'startTime' => '',
                    'endTime' => '',
                    'customer' => '',
                    'location' => '',
                    'requestedPhotographer' => '',
                    'photographers' => $this->userModel->getPhotographers(),
                    'package' => '',
                    'packages' => $this->packageModel->getPackages(),
                    'additionalRequests' => '',
                    'eventDate_err' => '',
                    'location_err' => '',
                    'photographer_err' => '',
                    'package_err' => '',
                    'additionalRequest_err' => ''
                ];

                // Load view
                $this->view('pages/customer/requestPage', $data);
            }
        }

        public function getAvailablePhotographers() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedDate'])) {
                $selectedDate = $_POST['selectedDate'];
        
                // Call UserModel method to fetch available photographers
                $availablePhotographers = $this->partnerModel->getAvailablePartners(3,$selectedDate);
        
                // Generate HTML options for the select dropdown
                $options = '<option value="">Select a photographer</option>';
                foreach ($availablePhotographers as $photographer) {
                    $options .= '<option value="' . $photographer->UserID . '">' . $photographer->FirstName . ' ' . $photographer->LastName . '</option>';
                }
        
                // Return HTML options
                echo $options;
            }
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

        // View event by id
        public function viewEvent($id) {
            $event = $this->eventModel->getEventById($id);
            $package = $this->packageModel->getPackageById($event->PackageID);
            $photographer = $this->userModel->getUserById($event->PhotographerID);
            $editor = $this->userModel->getUserById($event->EditorID);
            $printingFirm = $this->userModel->getUserById($event->PrintingFirmID);
            $photographerAction = $this->partnermodel->getPhotographerAction($id);
            $editorAction = $this->partnermodel->getEditorAction($id);
            $printingFirmAction = $this->partnermodel->getPrintingFirmAction($id);

            $data = [
                'event' => $event,
                'package' => $package,
                'photographer' => $photographer,
                'editor' => $editor,
                'printingFirm' => $printingFirm,
                'photographerAction' => $photographerAction,
                'editorAction' => $editorAction,
                'printingFirmAction' => $printingFirmAction
            ];

            $this->view('pages/customer/requestStatus', $data);
        }

        // View event by id
        public function viewEventbyManager($id) {
            $event = $this->eventModel->getEventById($id);
            $package = $this->packageModel->getPackageById($event->PackageID);
            $photographer = $this->userModel->getUserById($event->PhotographerID);
            $editor = $this->userModel->getUserById($event->EditorID);
            $printingFirm = $this->userModel->getUserById($event->PrintingFirmID);
            $requestedPhotographer = $this->userModel->getUserById($event->RequestedPhotographer);
            $photographerAction = $this->partnerModel->getPhotographerAction($id);
            $editorAction = $this->partnerModel->getEditorAction($id);
            $printingFirmAction = $this->partnerModel->getPrintingFirmAction($id);

            $data = [
                'event' => $event,
                'package' => $package,
                'photographer' => $photographer,
                'editor' => $editor,
                'printingFirm' => $printingFirm,
                'requestedPhotographer' => $requestedPhotographer,
                'photographerAction' => $photographerAction,
                'editorAction' => $editorAction,
                'printingFirmAction' => $printingFirmAction
            ];

            $this->view('pages/manager/events/viewEvent', $data);
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

        // View requests by each customer
        public function viewCustomerRequests($id) {
            $requests = $this->eventModel->getRequestsByCustomer($id);
        
            // Loop through the requests and format the date
            foreach ($requests as $request) {
                $request->EventDate = date('F j, Y', strtotime($request->EventDate));
            }
        
            $data = [
                'requests' => $requests
            ];
        
            $this->view('pages/customer/events', $data);
        }

        // View events by each customer
        public function viewCustomerEvents($id) {
            $events = $this->eventModel->getEventsByCustomer($id);
            $data = [
                'events' => $events
            ];
        
            $this->view('pages/customer/events', $data);
        }

        // Delete requests
        public function deleteRequest($id) {
            if($this->eventModel->deleteRequest($id)) {
                flash('event_message', 'Request removed');
                redirect('events/request');
            } else {
                die('Something went wrong');
            }
        }

        // Reschedule requests
        public function rescheduleRequest($id) {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init data
                $data = [
                    'id' => $id,
                    'date' => trim($_POST['date']),
                    'startTime' => trim($_POST['startTime']),
                    'endTime' => trim($_POST['endTime']),
                    'location' => trim($_POST['location']),
                ];

                // Validate event date
                if(empty($data['date'])) {
                    $data['eventDate_err'] = 'Please enter event date';
                }

                //  Make sure errors are empty
                if(empty($data['eventDate_err'])) {
                    if($this->eventModel->rescheduleEvent($data)) {
                        flash('event_message', 'Request rescheduled');
                        redirect('events/viewCustomerEvents/' . $_SESSION['user_id'] . '');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('pages/customer/rescheduleRequest', $data);
                }
            } else {
                // Init data
                $event = $this->eventModel->getEventById($id);
                $data = [
                    'id' => $id,
                    'date' => $event->EventDate,
                    'startTime' => $event->StartTime,
                    'endTime' => $event->EndTime,
                    'location' => $event->Location,
                    'eventDate_err' => ''
                ];

                // Load view
                $this->view('pages/customer/rescheduleRequest', $data);
            }
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
            //$photographers = $this->userModel->getPhotographers();
            $photographers = $this->partnerModel->getAvailablePartners(3,$event->EventDate);
            $requestedPhotographer = $this->userModel->getUserById($event->RequestedPhotographer);
            $editors = $this->partnerModel->getAvailablePartners(4,$event->EventDate);
            $printingFirms = $this->partnerModel->getAvailablePartners(5,$event->EventDate);
            $events = $this->partnerModel->getEvents($event->EventDate);

            if($event->PhotographerID != NULL && $event->EditorID != NULL && $event->PrintingFirmID != NULL) {
                redirect('events/viewEventbyManager/' . $id . '');
            }

            $data = [
                'event' => $event,
                'package' => $package,
                'photographers' => $photographers,
                'requestedPhotographer' => $requestedPhotographer,
                'editors' => $editors,
                'printingFirms' => $printingFirms,
                'events' => $events
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
                    if(
                        $this->eventModel->allocatePartners($data) &&
                        $this->eventModel->photographerAction($data) &&
                        $this->eventModel->editorAction($data) &&
                        $this->eventModel->printingFirmAction($data)
                        ) {
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

        // View event by ech Partner
        public function viewPartnerEvents($id) {
            $events = $this->eventModel->getEventsByPartner($id);
            $data = [
                'events' => $events
            ];
        
            $this->view('pages/partner/events', $data);
        }
    }