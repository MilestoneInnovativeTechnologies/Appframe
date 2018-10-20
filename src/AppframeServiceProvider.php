<?php

namespace Milestone\Appframe;

use Illuminate\Support\ServiceProvider;

class AppframeServiceProvider extends ServiceProvider
{

    protected $bootDataDir = __DIR__ . '/../';
    protected $bootData = [
        'loadRoutesFrom' => 'routes/web.php',
        'loadViewsFrom' => ['views','Appframe'],
        'loadMigrationsFrom' => 'migrations',
        'publishes' => 'config/appframe.php',
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

        $this->publishes([
            $this->bootDataDir . 'config/appframe.php' => config_path('appframe.php'),
            $this->bootDataDir . 'assets' => public_path('appframe'),
            $this->bootDataDir . 'views' => resource_path('views/milestone/appframe'),
        ], 'update');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Bag::class, function () {
            return new Bag;
        });
    }
}
