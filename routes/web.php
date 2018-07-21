<?php

$namespace = 'Milestone\\Appframe\\Controllers';

Route::group([

    'namespace' => $namespace,
    'middleware' => 'web'

], function(){

    Route::view('setup','Appframe::setup');
    Route::post('setup','SetupController@create');
    Route::view('login','Appframe::login')->name('login');
    Route::post('login','LoginController@login');
    Route::get('logout','LoginController@logout');

});


Route::group([

    'namespace' => $namespace,
    'middleware' => 'web'

], function(){

    Route::view('login','Appframe::login')->name('login');
    Route::post('login','LoginController@login');
    Route::get('logout','LoginController@logout');

});

Route::group([

    'namespace' => $namespace,
    'middleware' => 'web'

], function(){

    Route::get('logout','LoginController@logout');

});

Route::group([

    'namespace' => $namespace,
    'middleware' => ['web','auth'],
    'prefix' => 'root'

], function(){

    Route::view('/','Appframe::root')->name('root');

});


