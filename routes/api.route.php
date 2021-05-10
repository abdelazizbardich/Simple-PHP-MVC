<?php

// Routes

    // apis
        // Artilce
            // add
                Route::post('/api/article/add',function(){
                    Route::middleware('auth');
                    // calling the controller
                    return Route::controller("article","add");
                });
            // edit
                Route::post('/api/article/update/{id}',function($id){
                    Route::middleware('auth');
                    // calling the controller
                    return Route::controller("article","update");
                });
            // Delete
                Route::get('/api/article/delete/{id}',function($id){
                    Route::middleware('auth');
                    // calling the controller
                    return Route::controller("article","delete");
                });
            // find
                Route::get('/api/article/find/{id}',function($id){
                    Route::middleware('auth');
                    // calling the controller
                    return Route::controller("article","find");
                });
            // find
                Route::get('/api/article/get',function(){
                    Route::middleware('auth');
                    // calling the controller
                    return Route::controller("article","get");
                });

        // admin
            // login
                Route::post('/api/admin/login',function(){
                    // Route::middleware('auth');
                    // calling the controller
                    return Route::controller("admin","login");
                });
            // verify email
                Route::get('/api/admin/verify/{email}', function ($email) {

                    return Route::controller("admin","verifyEmail");
                });
            // Reset password
                Route::post('/api/admin/reset/{token}', function ($token) {

                    return Route::controller("admin","resetPassword");
                });
        // statistics
                Route::get('/api/statistics/get',function(){
                    Route::middleware('auth');
                    // calling the controller
                    return Route::controller("statistics","get");
                });

        