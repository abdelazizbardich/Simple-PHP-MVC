<?php

require "./_classes/controller.php";
require "./models/product.model.php";

class contactController extends controller{
    public function index(){
        // $home = new product();
        // print_r($home->get());
        $data = array();
        return $this->view("contact",$data);
    }
}