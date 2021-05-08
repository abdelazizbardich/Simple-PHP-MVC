<?php

class homeController extends controller{
    
    public function index(){
        return $this->view("welcome");
    }
}