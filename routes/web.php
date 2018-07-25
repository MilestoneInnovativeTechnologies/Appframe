<?php

$namespace = 'Milestone\\Appframe\\Controllers';

Route::group([

    'namespace' => $namespace,
    'middleware' => ['web','guest']

], function(){

    Route::get('setup','SetupController@index');
    Route::post('setup','SetupController@create');

});

Route::group([

    'namespace' => $namespace,
    'middleware' => ['web',Milestone\Appframe\Middleware\RedirectIfLogged::class],

], function(){

    Route::view('login','Appframe::login')->name('login');
    Route::post('login','LoginController@login');

});

Route::group([

    'namespace' => $namespace,
    'middleware' => ['web','auth'],

], function(){

    Route::get('logout','LoginController@logout')->name('logout');

});

Route::group([

    'namespace' => $namespace,
    'middleware' => ['web','auth'],
    'prefix' => 'root'

], function(){

    Route::get('init','AppInitController@init')->name('init');
    Route::view('/','Appframe::root')->name('root');

});


