<?php

require "./_classes/controller.php";
require "./models/home.model.php";

class homeController extends controller{
    public function index(){
        // $home = new home();
        $data = array(
            // "homeData" => $home->get()
        );
        return $this->view("home",$data);
    }
}