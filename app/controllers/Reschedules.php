<?php

class Reschedules extends Controller{
    public function __construct(){
        $this->eventModel = $this->model('Event');
        $this->userModel = $this->model('User');
        $this->rescheduleModel = $this->model('Reschedule');
        $this->notificationModel = $this->model('Notification');
        $this->packageModel = $this->model('Package');
        $this->partnerModel = $this->model('Partner');
    }

    public function index(){
        $reschedules = $this->rescheduleModel->getReschedules();
        $data = [
            'reschedules' => $reschedules
        ];
        $this->view('pages/manager/reschedules/reschedules', $data);
    }

    public function reschedulesForPartner($id){
        $reschedules = $this->rescheduleModel->getReschedulesForPartner($id);
        $data = [
            'reschedules' => $reschedules
        ];
        $this->view('pages/partner/reschedules', $data);
    }


    public function reschedule($id) {
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
                'reason' => trim($_POST['reason']),
            ];

            $notificaton = [
                'user_id' => 16,
                'type' => 'reschedule',
                'content' => 'You have a reschdule request',
                'link' => 'reschedules/',
                'event_id' => $id
            ];

            // Validate event date
            if(empty($data['date'])) {
                $data['eventDate_err'] = 'Please enter event date';
            }

            //  Make sure errors are empty
            if(empty($data['eventDate_err'])) {
                if($this->rescheduleModel->reschedule($data)
                    && $this->notificationModel->createNotification($notificaton)) {
                    flash('event_message', 'Request reschedule');
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
                'reason' => '',
                'eventDate_err' => ''
            ];

            // Load view
            $this->view('pages/customer/rescheduleRequest', $data);
        }


    }

    public function manage($id){
        $reschedule = $this->rescheduleModel->getRescheduleById($id);
        $event = $this->eventModel->getEventById($reschedule->EventID);
        $package = $this->packageModel->getPackageById($event->PackageID);
        $customer = $this->userModel->getUserById($event->CustomerID);
        $photographer = $this->userModel->getUserById($event->PhotographerID);
        $editor = $this->userModel->getUserById($event->EditorID);
        $printingFirm = $this->userModel->getUserById($event->PrintingFirmID);
        $photographers = $this->partnerModel->getAvailablePartners(3, $reschedule->NewEventDate);

        $data = [
            'reschedule' => $reschedule,
            'event' => $event,
            'package' => $package,
            'customer' => $customer,
            'photographer' => $photographer,
            'editor' => $editor,
            'printingFirm' => $printingFirm,
            'photographers' => $photographers
        ];

        $this->view('pages/manager/reschedules/manage', $data);
    }

    public function photographerconfirm($id){
        $reschedule = $this->rescheduleModel->getRescheduleById($id);
        $eventID = $reschedule->EventID;
        $event = $this->eventModel->getEventById($eventID);
        $notificaton = [
            'user_id' => 16,
            'type' => 'reschedule',
            'content' => 'Photographer accepted reschdule request',
            'link' => 'events/viewEvent/' . $event->EventID,
            'event_id' => $eventID
        ];

        $this->rescheduleModel->updateStatus($id, 'PhotographerApproved');
        $this->rescheduleModel->confirmReschedule($eventID , $reschedule);
        $this->notificationModel->createNotification($notificaton);
    }

    public function photographerdecline($id){
        $reschedule = $this->rescheduleModel->getRescheduleById($id);
        $eventID = $reschedule->EventID;
        $event = $this->eventModel->getEventById($eventID);
        $notificaton = [
            'user_id' => 16,
            'type' => 'reschedule',
            'content' => 'Photographer declined reschdule request',
            'link' => 'events/viewEvent/' . $event->EventID,
            'event_id' => $eventID
        ];

        $this->rescheduleModel->updateStatus($id, 'PhotographerDeclined');
        $this->notificationModel->createNotification($notificaton);
    }

    public function confirm($id){
        $reschedule = $this->rescheduleModel->getRescheduleById($id);
        $eventID = $reschedule->EventID;
        $event = $this->eventModel->getEventById($eventID);
        $notificaton = [
            'user_id' => $event->CustomerID,
            'type' => 'reschedule',
            'content' => 'Your reschdule request has been approved',
            'link' => 'events/viewCustomerEvents/' . $event->CustomerID,
            'event_id' => $eventID
        ];

        $this->rescheduleModel->updateStatus($id, 'Approved');
        $this->rescheduleModel->confirmReschedule($eventID , $reschedule);
        $this->notificationModel->createNotification($notificaton);
    }

    public function cancel($id){
        $this->rescheduleModel->updateStatus($id, 'Rejected');
    }

}

?>