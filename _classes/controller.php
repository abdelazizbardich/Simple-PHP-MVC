<?php

class controller{

    
    public function view($view,$data = array()){
        $request = $_GET;
        extract($data);
        return require "./views/".$view.".view.php";
    }
}