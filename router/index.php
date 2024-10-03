<?php

class Router {

    private $handled = 0;
    function __construct(){}

    public function get($route, $view)
    {
        if($_SERVER['REQUEST_METHOD'] !== 'GET'){
            return false;
        }
        $uri = $_SERVER['REQUEST_URI'];

        if($uri === $route){
            $this->handled = 1;
            return include_once(controlador .$view.''.CONTROL);
        }
    }

    public function post($route, $view)
    {
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            return false;
        }
        $uri = $_SERVER['REQUEST_URI'];
        if($uri === $route){
            $this->handled = 1;
            include_once(controlador .$view.''.CONTROL);
        }
    }

    public function acceder($route, $view)
    {
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            return false;
        }
        $uri = $_SERVER['REQUEST_URI'];
        if($view == 'Login' && $uri === $route){
            $this->handled = 1;
            include_once(controlador .$view.''.CONTROL);
        }
        
    }

    public function session($route, $view)
    {
        if($_SERVER['REQUEST_METHOD'] !== 'SESSION'){
            return false;
        }
        $uri = $_SERVER['REQUEST_URI'];
        if($uri === $route){
            $this->handled = 1;
            include_once(controlador .$view.''.CONTROL);
        }
    }

    public function views($route, $view, $opcion = null)
    {
        if($_SERVER['REQUEST_METHOD'] !== 'GET' && $opcion!= 'view'){
            return false;
        }
        $uri = $_SERVER['REQUEST_URI'];
        if($uri === $route){
            $this->handled = 1;
            $HEAD = 'views/componentes/';
            include_once(views .$view.'Vista.php');
        }
    }

    public function error($route, $view, $opcion = null)
    {
        if($_SERVER['REQUEST_METHOD'] !== 'GET' && $opcion!= 'error'){
            return false;
        }
        $uri = $_SERVER['REQUEST_URI'];
        if($uri === $route){
            $this->handled = 1;
            include_once(views .$view.'.php');
        }
    }

    function __destruct()
    {
        if($this->handled==0){
            return include_once(views .'404.php');
        }
    }


}