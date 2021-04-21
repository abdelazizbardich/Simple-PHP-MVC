<?php

class Route {

    public static function get($param,$function){
        global $notFound;
        $notFound = false;
        if(!isset($_GET['url'])){return false;}
        if($_GET['url'] == $param){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $function();
            }else{
                echo "Post Method not supported";
            }
        }
    }
    public static function post($param,$function){
        global $notFound;
        $notFound = false;
        if(!isset($_GET['url'])){return false;}
        if($_GET['url'] == $param){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $function();
            }else{
                echo "Get Method not supported";
            }
        }
    }
    // Load Controllers
    public static function controller($controller,$function){
        require('./controllers/'.$controller.'.controller.php');
        $controller = $controller."Controller";
        $controller = new $controller();
        $controller->$function();
    }

    public static function middleware(string $name){
        require_once "./middlewares/$name.middleware.php";
    }
}
