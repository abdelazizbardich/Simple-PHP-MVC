<?php

require_once './_classes/Routes.php';
$notFound = true;


Route::get('/home',function(){
    Route::middleware('auth');
    return Route::controller("home","index");
});



// if no page found
if($notFound){
    require "./_classes/controller.php";
    $controller = new controller();
    $controller->view("404",array());
}