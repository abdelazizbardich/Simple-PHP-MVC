<?php

class controller{

    
    public function view($view,$data = array()){
        $request = $_GET;
        extract($data);
        $view = str_replace('.','/',$view);
        return require "./views/".$view.".view.php";
    }
}