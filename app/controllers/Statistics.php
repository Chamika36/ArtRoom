<?php
    class Statistics extends Controller {
        public function __construct() {
            $this->EventModel = $this->model('Event');
            $this->PackageModel = $this->model('Package');
            $this->FeedbackModel = $this->model('Feedback');
        }

        public function index() {
            $events = $this->EventModel->getAllEvents();
            $feedbacks = $this->FeedbackModel->getFeedbacks();

            foreach ($events as $event) {
                $PackageName = $this->PackageModel->getPackageByID($event->PackageID)->Name;
                $event->PackageName = $PackageName;
            }
            $data = [
                'events' => $events,
                'feedbacks' => $feedbacks
            ];
            $this->view('pages/manager/statistics/main', $data);
        }
    }