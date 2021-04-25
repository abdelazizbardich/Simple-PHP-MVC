<?php


// Routes
Route::get('/{id}/{name}/{age}',function($id,$name,$age){
    return Route::controller("home","index");
});