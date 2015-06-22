<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'as'        => 'admin.',
    'namespace' => 'Admin',
    'prefix'    => 'a'
], function () {
    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'AdminController@dashboard'
    ]);

    Route::group([
        'as'     => 'event.',
        'prefix' => 'begivenheder'
    ], function () {

        Route::get('/ny', [
            'as'   => 'create',
            'uses' => 'EventController@create'
        ]);
        Route::post('/', [
            'as'   => 'store',
            'uses' => 'EventController@store'
        ]);
        Route::get('/{slug}/rediger', [
            'as'   => 'edit',
            'uses' => 'EventController@edit'
        ]);
        Route::put('/{slug}', [
            'as'   => 'update',
            'uses' => 'EventController@update'
        ]);
        Route::delete('/{slug}', [
            'as'   => 'destroy',
            'uses' => 'EventController@destroy'
        ]);
        Route::get('/{slug}', [
            'as'   => 'show',
            'uses' => 'EventController@show'
        ]);
    });
});