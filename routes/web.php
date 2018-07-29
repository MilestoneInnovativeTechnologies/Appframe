<?php

$namespace = 'Milestone\\Appframe\\Controllers';

Route::group([
    'namespace' => $namespace,
    'middleware' => ['web']
],function(){
    Route::group([
        'prefix' => 'setup',
        'middleware' => [Milestone\Appframe\Middleware\LoginIfUserExists::class]
    ],function(){
        Route::get('/','SetupController@index');
        Route::post('/','SetupController@create');
    });
    Route::group([
        'prefix' => 'login',
        'middleware' => [Milestone\Appframe\Middleware\RedirectIfLogged::class]
    ],function(){
        Route::view('/','Appframe::login')->name('login');
        Route::post('/','LoginController@login');
    });
    Route::group([
        'middleware' => [Milestone\Appframe\Middleware\LoginIfGuest::class]
    ],function(){
        Route::prefix('logout')->group(function(){
            Route::get('/','LoginController@logout')->name('logout');
        });
        Route::get('init','AppInitController@init')->name('init');
        Route::group([

        ],function(){
            Route::post('server','ServerController@serve')->name('server');
        });
        Route::view('{slug?}','Appframe::root')->where('slug', '(.*)?')->name('root');
    });
});

Route::redirect('/','root',301);
