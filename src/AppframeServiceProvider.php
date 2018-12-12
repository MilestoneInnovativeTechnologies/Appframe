<?php

namespace Milestone\Appframe;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class AppframeServiceProvider extends ServiceProvider
{

    protected $bootDataDir = __DIR__ . '/../';
    protected $bootData = [
        'loadRoutesFrom' => 'routes/web.php',
        'loadViewsFrom' => ['views','Appframe'],
        'loadMigrationsFrom' => 'migrations',
    ];

    protected $publishData = [
        'config' => ['config_path','/'],
        'assets' => ['public_path','appframe'],
        'views' => ['resource_path','views/milestone/appframe'],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $bootDir = $this->bootDataDir;
        foreach ($this->bootData as $method => $data){
            $args = (array) $data;
            $args[0] = $bootDir . $args[0];
            call_user_func_array([$this,$method],$args);
        }

        $publishDataArray = [];
        foreach ($this->publishData as $from => $data){
            $source = $bootDir . $from;
            $destination = call_user_func($data[0],$data[1]);
            $publishDataArray[$source] = $destination;
        }

        $this->publishes($publishDataArray);
        $this->publishes($publishDataArray,'update');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Bag::class, function () { return new Bag; });
        $this->mergeConfigFrom($this->bootDataDir.'config/appframe.php', 'appframe' );
        $this->registerBlueprintMacro();
    }

    private function registerBlueprintMacro(){
        Blueprint::macro('audit',function(){
            $this->unsignedInteger('created_by')->nullable();
            $this->unsignedInteger('updated_by')->nullable();
            $this->timestamps();
            $this->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $this->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }
}
