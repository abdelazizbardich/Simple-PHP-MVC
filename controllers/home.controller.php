<?php

class homeController extends controller{
    public function index(){
        return $this->view("welcome");
    }

    public function sendMail(){
        if(mail::send([
            "to" => "abdelazizbardich@gmail.com",
            "name"=> "abdelaziz",
            "subject" => "test",
            "template" => "admin",
            "data" => [
                "message" => "welcome to your mail"
            ]
        ])){
            echo "true";
        }else{
            echo "false";
        }
    }
}