<?php

class Route {

    public static $params;
    public static $routeFound = false;
    public static function get($param,$function){
        if(!isset($_GET['url'])){$_GET['url'] = "/";}
        $checkRoute = CompareUrl($_GET['url'],$param,"GET");
        if($checkRoute['state'] == 1 && self::$routeFound == false){
            global $notFound;
            $notFound = false;
            self::$routeFound = true;
            self::$params = $checkRoute['params'];
            $function(...$checkRoute['params']);
        }
    }
    public static function post($param,$function){
        if(!isset($_GET['url'])){$_GET['url'] = "/";}
        $checkRoute = CompareUrl($_GET['url'],$param,"POST");
        if($checkRoute['state'] == 1 && self::$routeFound == false){
            global $notFound;
            $notFound = false;
            self::$routeFound = true;
            self::$params = $checkRoute['params'];
            $function(...$checkRoute['params']);
        }
    }
    // Load Controllers
    public static function controller($controller,$function){
        require('./controllers/'.$controller.'.controller.php');
        $controller = $controller."Controller";
        $controller = new $controller();
        $controller->$function(...self::$params);
    }

    public static function middleware(string $name){
        require_once "./middlewares/$name.middleware.php";
    }
    public static function view($view,$data = array()){
        $request = $_GET;
        extract($data);
        $view = str_replace('.','/',$view);
        return require "./views/".$view.".view.php";
    }
}
