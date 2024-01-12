<?php

class Home extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->eventModel = $this->model('Event');
        $this->packageModel = $this->model('Package');
    }

   public function index() {
        $data = [
            'title' => 'Home'
        ];
        if(isset($_SESSION['user_type_id'])) {
            switch($_SESSION['user_type_id']) {
                case 1:
                    $this->view('pages/customer/home', $data);
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

    public function manager() {
        $eventCount = $this->eventModel->getEventCount();
        $requestCount = $this->eventModel->getRequestCount();
        $events = $this->eventModel->getAllEvents();

        foreach ($events as $request) {
            $request->Package = $this->packageModel->getPackageById($request->PackageID)->Name;
        }


        $data = [
            'title' => 'Home',
            'eventCount' => $eventCount,
            'requestCount' => $requestCount,
            'events' => $events
        ];
        $this->view('pages/manager/dashboard', $data);
    }

    public function partner(){
        $data = [
            'title' => 'Home'
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