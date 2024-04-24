<?php
    class Events extends Controller{
        public function __construct() {
            $this->eventModel = $this->model('Event');
            $this->userModel = $this->model('User');
            $this->packageModel = $this->model('Package');
            $this->partnerModel = $this->model('Partner');
            $this->notificationModel = $this->model('Notification');
        }
                
        public function index() {
            $events = $this->eventModel->getAllEvents();
            $ongoing = $this->eventModel->getOngoingEvents();
            $requests = $this->eventModel->getOnlyRequests();
            // Loop through the requests and format the date
            foreach ($requests as $request) {
                $request->EventDate = date('F j, Y', strtotime($request->EventDate));
                // $request->Package = $this->packageModel->getPackageById($request->PackageID)->Name;
            }

            // Loop through the events and format the date
            foreach ($events as $event) {
                $event->EventDate = date('F j, Y', strtotime($event->EventDate));
                // $event->Package = $this->packageModel->getPackageById($request->PackageID)->Name;
            }

            $data = [
                'title' => 'Home',
                'ongoing' => $ongoing,
                'requests' => $requests,
                'events' => $events,
                'type' => 'all'
            ];

            $this->view('pages/manager/events/events', $data);
        }

        public function loadEvent($id) {
            $events = $this->eventModel->getAllEvents();
            $ongoing = $this->eventModel->getOngoingEvents();
            $requests = $this->eventModel->getOnlyRequests();
            // Loop through the requests and format the date
            foreach ($requests as $request) {
                $request->EventDate = date('F j, Y', strtotime($request->EventDate));
                // $request->Package = $this->packageModel->getPackageById($request->PackageID)->Name;
            }

            // Loop through the events and format the date
            foreach ($events as $event) {
                $event->EventDate = date('F j, Y', strtotime($event->EventDate));
                // $event->Package = $this->packageModel->getPackageById($request->PackageID)->Name;
            }

            $data = [
                'title' => 'Home',
                'eventID' => $id,
                'ongoing' => $ongoing,
                'requests' => $requests,
                'events' => $events,
                'type' => 'all'
            ];

            $this->view('pages/manager/events/events', $data);
        }


        public function calendar($type) {
            $events = $this->eventModel->getAllEvents();
            $ongoing = $this->eventModel->getOngoingEvents();
            $requests = $this->eventModel->getOnlyRequests();
            // Loop through the requests and format the date
            foreach ($requests as $request) {
                $request->EventDate = date('F j, Y', strtotime($request->EventDate));
                // $request->Package = $this->packageModel->getPackageById($request->PackageID)->Name;
            }

            // Loop through the events and format the date
            foreach ($events as $event) {
                $event->EventDate = date('F j, Y', strtotime($event->EventDate));
                // $event->Package = $this->packageModel->getPackageById($request->PackageID)->Name;
            }

            $data = [
                'title' => 'Home',
                'ongoing' => $ongoing,
                'requests' => $requests,
                'events' => $events,
                'type' => $type
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


        public function pay(){
            echo "pay method called";
            return "pay method called";
        }

        // event request
        public function request($packageID) {
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
                    'longitude' => trim($_POST['longitude']),
                    'latitude' => trim($_POST['latitude']),
                    'requestedPhotographer' => trim($_POST['requestedPhotographer']),
                    'package' => trim($_POST['package']),
                    'selectedExtras' => trim($_POST["selectedExtras"]),
                    'totalBudget' => trim($_POST["totalBudget"]),
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

                // Make sure errors are empty
                // Make sure errors are empty
                if(empty($data['eventDate_err']) && empty($data['location_err'])) {
                    if($this->eventModel->requestEvent($data)) {
                        // Get the last inserted ID
                        $eventID = $this->eventModel->getLastInsertedId();
                        
                        // Notification data
                        $notification_data = [
                            'user_id' => '16',
                            'type' => 'request',
                            'content' => 'You have a new event request',
                            'link' => 'events/loadEvent/' . $eventID . '',
                            'event_id' => $eventID
                        ];

                        if($this->notificationModel->createNotification($notification_data)) {
                            flash('event_message', 'Event requested');
                            redirect('events/viewCustomerEvents/' . $_SESSION['user_id'] . '');
                        } else {
                            die('Something went wrong');
                        }
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
                    'longitude' => '',
                    'latitude' => '',
                    'requestedPhotographer' => '',
                    'photographers' => $this->userModel->getPhotographers(),
                    'package' => '',
                    'packages' => $this->packageModel->getPackages(),
                    'selectedExtras' => '',
                    'totalBudget' => '',
                    'additionalRequests' => '',
                    'eventDate_err' => '',
                    'location_err' => '',
                    'photographer_err' => '',
                    'package_err' => '',
                    'additionalRequest_err' => ''
                ];

                if($packageID != 0) {
                    $data['package'] = $this->packageModel->getPackageById($packageID);
                }

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


        public function calendars() {
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
            $photographerAction = $this->partnerModel->getPhotographerAction($id);
            $editorAction = $this->partnerModel->getEditorAction($id);
            $printingFirmAction = $this->partnerModel->getPrintingFirmAction($id);

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
            $customer = $this->userModel->getUserById($event->CustomerID);
            $photographer = $this->userModel->getUserById($event->PhotographerID);
            $editor = $this->userModel->getUserById($event->EditorID);
            $printingFirm = $this->userModel->getUserById($event->PrintingFirmID);
            $requestedPhotographer = $this->userModel->getUserById($event->RequestedPhotographer);
            $photographerAction = $this->partnerModel->getPhotographerAction($id);
            $editorAction = $this->partnerModel->getEditorAction($id);
            $printingFirmAction = $this->partnerModel->getPrintingFirmAction($id);
            $photographers = $this->partnerModel->getAvailablePartners(3,$event->EventDate);
            $editors = $this->partnerModel->getAvailablePartners(4,$event->EventDate);
            $printingFirms = $this->partnerModel->getAvailablePartners(5,$event->EventDate);

            $data = [
                'event' => $event,
                'package' => $package,
                'customer' => $customer,
                'photographer' => $photographer,
                'editor' => $editor,
                'printingFirm' => $printingFirm,
                'photographers' => $photographers,
                'editors' => $editors,
                'printingFirms' => $printingFirms,
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
            foreach ($events as $event) {
                $event->PackageName = $this->packageModel->getPackageById($event->PackageID)->Name;
            }
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

        // update event status
        public function updateEventStatus($id, $status) {
            if($this->eventModel->updateEventStatus($id, $status)) {
                // Notification data
                $notification_data = [
                    'user_id' => $this->eventModel->getEventById($id)->CustomerID,
                    'type' => 'status',
                    'content' => 'Your event status has been updated to ' . $status,
                    'link' => 'events/viewEvent/' . $id . '',
                    'event_id' => $id
                ];

                if($status == 'Completed'){
                    $notification_data['content'] = 'Your event has been completed. Collect your photos.';
                }

                $this->notificationModel->createNotification($notification_data);

                // Notification data to partners
                if($status == 'Completed'){
                    $notification_data['content'] = 'Your event has been completed.';
                }
                $notification_data['link'] = 'partners/viewEvent/' . $id . '';

                $notification_data['user_id'] = $this->eventModel->getEventById($id)->PhotographerID;
                $this->notificationModel->createNotification($notification_data);

                $notification_data['user_id'] = $this->eventModel->getEventById($id)->EditorID;
                $this->notificationModel->createNotification($notification_data);

                $notification_data['user_id'] = $this->eventModel->getEventById($id)->PrintingFirmID;
                $this->notificationModel->createNotification($notification_data);

                flash('event_message', 'Event status updated');
                redirect('events');
            } else {
                die('Something went wrong');
            }
        }

        // // Reschedule requests
        // public function rescheduleRequest($id) {
        //     // Check for POST
        //     if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         // Process form
        //         // Sanitize POST data
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
        //         // Init data
        //         $data = [
        //             'id' => $id,
        //             'date' => trim($_POST['date']),
        //             'startTime' => trim($_POST['startTime']),
        //             'endTime' => trim($_POST['endTime']),
        //             'location' => trim($_POST['location']),
        //         ];

        //         // Validate event date
        //         if(empty($data['date'])) {
        //             $data['eventDate_err'] = 'Please enter event date';
        //         }

        //         //  Make sure errors are empty
        //         if(empty($data['eventDate_err'])) {
        //             if($this->eventModel->rescheduleEvent($data)) {
        //                 flash('event_message', 'Request rescheduled');
        //                 redirect('events/viewCustomerEvents/' . $_SESSION['user_id'] . '');
        //             } else {
        //                 die('Something went wrong');
        //             }
        //         } else {
        //             // Load view with errors
        //             $this->view('pages/customer/rescheduleRequest', $data);
        //         }
        //     } else {
        //         // Init data
        //         $event = $this->eventModel->getEventById($id);
        //         $data = [
        //             'id' => $id,
        //             'date' => $event->EventDate,
        //             'startTime' => $event->StartTime,
        //             'endTime' => $event->EndTime,
        //             'location' => $event->Location,
        //             'eventDate_err' => ''
        //         ];

        //         // Load view
        //         $this->view('pages/customer/rescheduleRequest', $data);
        //     }
        // }

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
            $customer = $this->userModel->getUserById($event->CustomerID);
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
                'customer' => $customer,
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
                        $this->eventModel->printingFirmAction($data) &&
                        $this->sendAllocateNotification($data['photographer'] , $id) &&
                        $this->sendAllocateNotification($data['editor'] , $id) &&
                        $this->sendAllocateNotification($data['printingFirm'] , $id)
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

        // Reallocate partners
        public function reallocate($eventId){
            // Assuming you are using POST method
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $json_data = file_get_contents("php://input");

                $data = json_decode($json_data);
                if ($data === null) {
                    http_response_code(400); // Bad Request
                    echo json_encode(['error' => 'Invalid JSON data']);
                    return;
                }

                $partnerType = $data->partnerType;
                $selectedPartner = $data->selectedPartner;
                $data = [
                    'eventID' => $eventId
                ];

                $success = $this->eventModel->reallocatePartner($eventId, $partnerType, $selectedPartner);
                // update partner actions
                if($partnerType == 3) {
                    $data['photographer'] = $selectedPartner;
                    $this->eventModel->photographerAction($data);

                    $notification_data_customer = [
                        'user_id' => $this->eventModel->getEventById($eventID)->CustomerID,
                        'type' => 'allocate',
                        'content' => 'A new photographer has been allocated.',
                        'link' => 'events/viewEvent/' . $eventID . '',
                        'event_id' => $eventID
                    ];
                    $this->notificationModel->createNotification($notification_data_customer);

                } else if($partnerType == 4) {
                    $data['editor'] = $selectedPartner;
                    $this->eventModel->editorAction($data);
                } else if($partnerType == 5) {
                    $data['printingFirm'] = $selectedPartner;
                    $this->eventModel->printingFirmAction($data);
                }

                if ($success) {
                    $this->sendAllocateNotification($selectedPartner, $eventId);
                    $response = ['success' => true, 'message' => 'Reallocated successfully'];
                } else {
                    $response = ['success' => false, 'message' => 'Failed to reallocate'];
                }

                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid request method']);
            }
        }

        // Send notification on allocation to partner
        public function sendAllocateNotification($partnerId, $eventID) {
            $notification_data = [
                'user_id' => $partnerId,
                'type' => 'allocate',
                'content' => 'You have been allocated to an event',
                'link' => 'events/viewPartnerEvents/' . $partnerId .'',
                'event_id' => $eventID
            ];

            if($this->notificationModel->createNotification($notification_data)) {
                return true;
            } else {
                return false;
            }
        }

        // Send quota and accept event
        public function sendQuota($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $event = $this->eventModel->getEventById($id);

                // Init data
                $data = [
                    'eventID' => $id,
                    'additionalCharges' => trim($_POST['additionalCharges']),
                    'revisedBudget' => $_POST['revisedBudget'],
                ];

                $notification_data = [
                    'user_id' => $event->CustomerID,
                    'type' => 'quota',
                    'content' => 'Your request has been confirmed.',
                    'link' => 'events/viewEvent/' . $id . '',
                    'event_id' => $id
                ];

                error_log(print_r($data, true));

                // Make sure errors are empty
                if($this->eventModel->sendQuota($data)) {
                    $this->notificationModel->createNotification($notification_data);
                    flash('event_message', 'Quota sent');
                    redirect('events/loadEvent/' . $id . '');
                } else {
                    die('Something went wrong');
                }
            }
        }

        // View requests by each partner
        public function viewPartnerRequests($id) {
            $requests = $this->eventModel->getRequestsByPartner($id);

            foreach ($requests as $request) {
                $user_type_id = $_SESSION['user_type_id'];
                $action = '';

                switch($user_type_id) {
                    case 3:
                        $action = $this->partnerModel->getPhotographerAction($request->EventID); 
                        break;
                    case 4:
                        $action = $this->partnerModel->getEditorAction($request->EventID);
                        break;
                    case 5:
                        $action = $this->partnerModel->getPrintingFirmAction($request->EventID);
                        break;
                    default:
                        $action = "Error";
                        break;
                }

                $request->UserTYpe = $user_type_id;
                $request->Action = $action->Action;
            }

            $data = [
                'events' => $requests,
            ];
        
            $this->view('pages/partner/events', $data);
        }

        // View event by ech Partner
        public function viewPartnerEvents($id) {
            $events = $this->eventModel->getEventsByPartner($id);

            foreach ($events as $event) {
                $user_type_id = $_SESSION['user_type_id'];
                $action = '';

                switch($user_type_id) {
                    case 3:
                        $action = $this->partnerModel->getPhotographerAction($event->EventID); 
                        break;
                    case 4:
                        $action = $this->partnerModel->getEditorAction($event->EventID);
                        break;
                    case 5:
                        $action = $this->partnerModel->getPrintingFirmAction($event->EventID);
                        break;
                    default:
                        $action = "Error";
                        break;
                }

                $event->UserType = $user_type_id;
                $event->Action = $action->Action;
            }

            $data = [
                'events' => $events,
            ];
        
            $this->view('pages/partner/events', $data);
        }

    
    }