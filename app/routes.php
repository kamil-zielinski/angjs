<?php

Route::get('/', function()
{
    return View::make('index'); // will return app/views/index.php
});

// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array('prefix' => 'api'), function() {

    Route::resource('comments', 'CommentController',
        array('only' => array('index', 'store', 'destroy')));
});

// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
    return View::make('index');
});