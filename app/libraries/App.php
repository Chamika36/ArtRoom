<?php

class App{

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        //print_r($this->getUrl());

        $url = $this->getUrl();

    // Check if the URL is not null and has at least one element
    if ($url !== null && count($url) > 0) {
        // Look in controllers for the first value
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            // If exists, set as controller
            $this->controller = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }
    }

        // Require the controller
        require_once '../app/controllers/' . $this->controller . '.php';

        // Instantiate controller class
        $this->controller = new $this->controller;

        // Check for second part of url
        if(isset($url[1])){
            // Check to see if method exists in controller
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }

        // Check for third part of url
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}

?>