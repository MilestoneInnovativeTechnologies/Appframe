<?php

namespace Milestone\Appframe;

use Illuminate\Support\ServiceProvider;
use Milestone\Appframe\Register\Bag;
use Milestone\Appframe\Register\Frame;
use Milestone\Appframe\Engine\Base;

class AppframeServiceProvider extends ServiceProvider
{

    protected $bootDataDir = __DIR__ . '/../';
    protected $bootData = [
        'loadRoutesFrom' => 'routes/web.php',
        'loadViewsFrom' => ['views','Appframe'],
        'loadMigrationsFrom' => 'migrations',
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->bootData as $method => $data){
            $args = (array) $data;
            $args[0] = $this->bootDataDir . $args[0];
            call_user_func_array([$this,$method],$args);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Frame::class, function () {
            return new Frame;
        });

        $this->app->singleton(Bag::class, function () {
            return new Bag;
        });

        $this->app->singleton(Base::class, function ($app) {
            $bag = $app->make(Bag::class);
            return new Base($bag);
        });
    }
}
