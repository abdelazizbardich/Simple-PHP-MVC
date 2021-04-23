<?php

Route::get('/home',function(){
    Route::middleware('auth');
    return Route::controller("home","index");
});