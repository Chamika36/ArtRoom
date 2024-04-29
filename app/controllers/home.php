<?php

class Home extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->eventModel = $this->model('Event');
        $this->packageModel = $this->model('Package');
        $this->notificationModel = $this->model('Notification');
        $this->feedbackModel = $this->model('Feedback');
        $this->sampleModel = $this->model('Sample');
        $this->rescheduleModel = $this->model('Reschedule');
    }

   public function index() {
        $packages = $this->packageModel->getPackages();
        // $sample = $this->sampleModel->getSamples();
        $sample = $this->sampleModel->getTopSamples();
        $feedbacks = $this->feedbackModel->getTopFeedbacks();
        foreach($feedbacks as $feedback) {
            $user = $this->userModel->getUserById($feedback->CustomerID);
            $feedback->Name = $user->FirstName . ' ' . $user->LastName;
        }
        $data = [
            'title' => 'Home',
            'packages' => $packages,
            'samples' => $sample,
            'feedbacks' => $feedbacks
        ];
        if(isset($_SESSION['user_type_id'])) {
            switch($_SESSION['user_type_id']) {
                case 1:
                    redirect('home/customer');
                    break;
                case 2:
                    redirect('home/manager');
                    break;
                case 3: case 4: case 5:
                    redirect('home/partner');
                    break;
                case 6:
                    redirect('home/manager');
                    break;
                default:
                    $this->view('pages/customer/home', $data);
                    break;
            }
        }else{
            $this->view('pages/customer/home', $data);
        }
    }

    // switch($_SESSION['user_type_id']) {
    //     case 1:
    //         redirect('home/index');
    //         break;
    //     case 2: 
    //         redirect('home/manager');
    //         break;
    //     case 3: case 4: case 5:
    //         redirect('home/partner');
    //         break;
    //     case 6:
    //         redirect('home/manager');
    //         break;
    //     default:
    //         redirect('home/index');
    //         break;
    // }

    public function aboutUs() {
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home2', $data);
    }

    public function services(){
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/customer/home3', $data);
    }

    public function customer() {
        $packages = $this->packageModel->getPackages();
        if(isset($_SESSION['user_id'])){
            $notifications = $this->notificationModel->getNotificationsByUserId($_SESSION['user_id']);
            $unreadNotificationCount = $this->notificationModel->getUnreadNotificationCountByUserId($_SESSION['user_id']);
        }
        $feedbacks = $this->feedbackModel->getTopFeedbacks();
        foreach($feedbacks as $feedback) {
            $user = $this->userModel->getUserById($feedback->CustomerID);
            $feedback->Name = $user->FirstName . ' ' . $user->LastName;
        }
        // $sample = $this->sampleModel->getSamples();
         $sample = $this->sampleModel->getTopSamples();

        $data = [
            'title' => 'Home',
            'packages' => $packages,
            'notifications' => $notifications,
            'unreadNotificationCount' => 0,
            'feedbacks' => $feedbacks,
            'samples' => $sample
        ];

        if(isset($_SESSION['user_id'])){
            $data['unreadNotificationCount'] = $unreadNotificationCount;
        }

        $this->view('pages/customer/home', $data);
    }

    public function manager() {
        $eventCount = $this->eventModel->getEventCount();
        $requestCount = $this->eventModel->getRequestCount();
        $rescheduleCount = $this->rescheduleModel->getRescheduleCount();
        $photographerCount = $this->userModel->getUserCountByUserType(3);
        $editorCount = $this->userModel->getUserCountByUserType(4);
        $printingFirmCount = $this->userModel->getUserCountByUserType(5);
        $events = $this->eventModel->getLastFiveEvents();
        $notifications = $this->notificationModel->getNotificationByManager();
        $unreadNotificationCount = $this->notificationModel->getNotificationCountByManager();

        foreach ($events as $request) {
            $request->Package = $this->packageModel->getPackageById($request->PackageID)->Name;
        }


        $data = [
            'title' => 'Home',
            'eventCount' => $eventCount,
            'requestCount' => $requestCount,
            'rescheduleCount' => $rescheduleCount,
            'photographerCount' => $photographerCount,
            'editorCount' => $editorCount,
            'printingFirmCount' => $printingFirmCount,
            'events' => $events,
            'notifications' => $notifications,
            'unreadNotificationCount' => $unreadNotificationCount
        ];
        $this->view('pages/manager/dashboard', $data);
    }

    public function partner(){
        $eventCount = $this->eventModel->getEventCountByPartner($_SESSION['user_id']);
        $requestCount = $this->eventModel->getRequestCountByPartner($_SESSION['user_id']);
        $rescheduleCount = $this->rescheduleModel->getRescheduleCountByPartner($_SESSION['user_id']);
        $events = $this->eventModel->getLastFiveEventsByPartner($_SESSION['user_id']);
        $packages = $this->packageModel->getPackages();
        $notifications = $this->notificationModel->getNotificationsByUserId($_SESSION['user_id']);
        $unreadNotificationCount = $this->notificationModel->getUnreadNotificationCountByUserId($_SESSION['user_id']);

        $data = [
            'title' => 'Home',
            'eventCount' => $eventCount,
            'requestCount' => $requestCount,
            'rescheduleCount' => $rescheduleCount,
            'events' => $events,
            'packages' => $packages,
            'notifications' => $notifications,
            'unreadNotificationCount' => $unreadNotificationCount
        ];
        $this->view('pages/partner/home', $data);
    }

    // error page
    public function error() {
        $data = [
            'title' => 'Error'
        ];
        $this->view('errors/404.view', $data);
    }
}

?>