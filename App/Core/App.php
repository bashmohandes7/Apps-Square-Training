<?php

namespace  Apps\Square\Core;

class App
{
    private $controller;
    private $method;
    private $params = [];

    public function __construct()
    {
        $this->url();
        $this->render();
    }

    // Route Handling
    private function url()
    {
        if (!empty($_SERVER['QUERY_STRING'])) {
            $url = explode('/', $_SERVER['QUERY_STRING']);
            // Controller
            $this->controller = isset($url[0]) ? ucwords($url[0]) . 'Controller' : 'UserController';
            // Methods that's inside Controller
            $this->method = isset($url[1]) ? $url[1] : 'index'; // Method that is inside controller
            unset($url[0], $url[1]);
            // Method Parameters
            $this->params = array_values($url); // array_values -> to starting an array from zero base
        } else {
            $this->controller = 'HomeController';
            $this->method = 'index';
        }
    }
    // check if controller is exists get it 
    private function render()
    {
        // Apps\Square\Controllers\\
        $controller = "Apps\Square\Controllers\\" . $this->controller;
        if (class_exists($controller)) {
            $controller  = new $controller;
            if (method_exists($controller, $this->method)) {
                call_user_func_array([$controller, $this->method], $this->params);
            } else {
                echo "Method is not exists";
            }
        } else {
            echo "Class is not exists";
        }
    }
}
