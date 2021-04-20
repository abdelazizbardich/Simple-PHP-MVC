<?php

require_once './_classes/Routes.php';
$notFound = true;


Route::get('/home',function(){
    global $notFound;
    $notFound = false;
    return Route::controller("homeController","index");
});

Route::get('/contact',function(){
    global $notFound;
    $notFound = false;
    return Route::controller("contactController","index");
});

Route::get('/article',function(){
    global $notFound;
    $notFound = false;
    return Route::controller("articleController","index");
});


// if no page found
if($notFound){
    require "./_classes/controller.php";
    $controller = new controller();
    $controller->view("404",array());
}