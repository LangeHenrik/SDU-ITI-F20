<?php

class Router
{

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    function __construct()
    {
        $url = $this->parseUrl();
        $this->parseParams($url);


        //print_r($this->params);

        if (isset($url[0])) {
            $url[0] = ucfirst($url[0]);
        }


        if (file_exists('../app/controllers/' . ucwords($url[4]) . '.php')) {
            $this->controller = ucfirst($url[4]);
            unset($url[4]);
        }


        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[5])) {
            if (method_exists($this->controller, $url[5])) {
                $this->method = $url[5];

                unset($url[5]);
            }
        }

        //$this->params = $url ? array_values($url) : [];


        require_once 'Restricted.php';
        if (restricted(get_class($this->controller), $this->method)) {
            echo 'Access Denied';
        } else {
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

    }


    public function parseUrl()
    {

        if (isset($_SERVER['REQUEST_URI'])) {
            $url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
            if (substr($url, -1) !== "/") {
                $url = $url . "/";
            }
            $url = explode('/', $url);
            return array_values($url);
        }
        /*$url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        if(substr($url, -1) !== "/") {
            $url = $url . "/";
        }
        $url = explode('/', $url);
        return $url;*/
    }

    public function parseParams($url){
        $arrayLength = count($url)-1;
        for ($i=0;$i<$arrayLength;$i++){
            if(($i>5) && isset($url[$i])){
                array_push($this->params, $url[$i]);
                unset($url[$i]);
            }
        }

    }

}
	

