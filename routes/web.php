<?php

$namespace = 'Milestone\\Appframe\\Controllers';
function prefixPath($path){
    $root = config('appframe.root_path');
    return implode('/',[trim($root,'/'),trim($path,'/')]);
}

Route::group([
    'namespace' => $namespace,
    'middleware' => ['web']
],function(){
    Route::group([
        'prefix' => prefixPath('setup'),
        'middleware' => [Milestone\Appframe\Middleware\LoginIfUserExists::class]
    ],function(){
        Route::get('/','SetupController@index');
        Route::post('/','SetupController@create');
    });
    Route::group([
        'prefix' => prefixPath('login'),
        'middleware' => [Milestone\Appframe\Middleware\RedirectIfLogged::class]
    ],function(){
        Route::view('/','Appframe::login')->name('login');
        Route::post('/','LoginController@login');
    });
    Route::group([
        'prefix' => prefixPath('action'),
    ],function(){
        Route::post('profile/record/{id}',function(){ return 'profile'; })->name('profile');
    });
    Route::group([
        'middleware' => [Milestone\Appframe\Middleware\LoginIfGuest::class]
    ],function(){
        Route::prefix('logout')->group(function(){
            Route::get('/','LoginController@logout')->name('logout');
        });
        Route::get('init','AppInitController@init')->name('init');
        Route::group([
            'prefix' => 'server',
            'middleware' => [
                Milestone\Appframe\Middleware\ValidateAppframeToken::class,
                Milestone\Appframe\Middleware\RenewAppframeToken::class,
                Milestone\Appframe\Middleware\FillBagWithSession::class,
                Milestone\Appframe\Middleware\FormDataProcess::class,
                Milestone\Appframe\Middleware\ResolveAction::class,
            ],
        ],function(){
            Route::post('/','ServerController@serve')->name('server');
        });
        Route::prefix('token')->group(function(){
            Route::post('fresh','TokenController@fresh');
            Route::post('next','TokenController@next');
        });
        Route::prefix('root')->group(function(){
	        Route::view('{slug?}','Appframe::root')->where('slug', '(.*)?');
	        Route::view('/','Appframe::root')->name('root');
        });
        Route::prefix('action')->group(function(){
	        Route::view('{slug?}','Appframe::root')->where('slug', '(.*)?');
        });
    });
});

Route::get('/',function(){
	return redirect()->route(config('appframe.index_route') ?: 'root');
});
