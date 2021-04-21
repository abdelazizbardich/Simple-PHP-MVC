<?php

require "./_classes/controller.php";
require "./models/home.model.php";

class homeController extends controller{
    public function index(){
        $home = new home();

        $home->update(1,array(
            "name" => "aziz"
        ));
        return $this->view("home");
    }
}