<?php


// Routes


Route::get('/',function(){
    return Route::view("welcome");
});

Route::get('/sendmail',function(){
    // calling the controller
    return Route::controller("home","sendMail");
});