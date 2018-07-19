<?php

$namespace = 'Milestone\\Appframe\\Controllers';

Route::group([

    'namespace' => $namespace,
    'middleware' => 'web'

], function(){

    Route::view('setup','Appframe::setup');
    Route::post('setup','SetupController@create');
    Route::view('login','Appframe::login');

});


