<?php

class Route {

    public static function get($param,$function){
        if($_GET['url'] == $param){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $function();
            }else{
                echo "Post Method not supported";
            }
        }
    }
    public static function post($param,$function){
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
        require('./controllers/'.$controller.'.php');
        $controller = new $controller();
        $controller->$function();
    }
}
