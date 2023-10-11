<?php
class Packages extends Controller {
    public function __construct() {
        $this->packageModel = $this->model('Package');
    }

    public function index() {
        $packages = $this->packageModel->getPackages();
        $data = [
            'packages' => $packages
        ];
        $this->view('pages/manager/packages', $data);
    }

}

