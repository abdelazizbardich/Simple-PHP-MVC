<?php


// Routes


Route::get('/',function(){
    Route::middleware('auth');
    return Route::controller("home","index");
});