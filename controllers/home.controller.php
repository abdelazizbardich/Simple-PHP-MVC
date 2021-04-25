<?php

require "./_classes/controller.php";
require "./models/home.model.php";

class homeController extends controller{
    public function index(){
        return $this->view("welcome");
    }
}