<?php
class Samples extends Controller{
    public function __construct() {
        $this->sampleModel = $this->model('Sample');
    }

    public function index() {
        $samples = $this->sampleModel->getSamples();
        $data = [
            'samples' => $samples
        ];
        $this->view('pages/manager/samples/samples', $data);
    }

    public function add(){
        $data = [
            'name' => '',
            'imagePath' => '',
            'description' => '',
            'customer' => '',
            'date' => '',
            'name_err' => '',
            'imagePath_err' => '',
            'description_err' => '',
            'customer_err' => '',
            'date_err' => ''
        ];

        
    }


}