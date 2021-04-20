<?php

require "./_classes/controller.php";
require "./models/product.model.php";

class articleController extends controller{
    public function index(){
        // $home = new product();
        // print_r($home->get());
        $data = array();
        return $this->view("single",$data);
    }
}