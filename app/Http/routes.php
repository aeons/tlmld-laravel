<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'as'        => 'admin::',
    'namespace' => 'Admin',
    'prefix'    => 'a'
], function () {
    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'AdminController@dashboard'
    ]);

    Route::group([
        'as'     => 'event::',
        'prefix' => 'begivenhed'
    ], function () {
        Route::get('/ny', [
            'as'   => 'new',
            'uses' => 'EventController@new'
        ]);
        Route::post('/', [
            'as'   => 'create',
            'uses' => 'EventController@new'
        ]);
    });
});