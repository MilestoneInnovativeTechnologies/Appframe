<?php

namespace Milestone\Appframe;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Event;

class AppframeServiceProvider extends ServiceProvider
{

    use Traits\AddSignatureTrait;

    protected $bootDataDir = __DIR__ . '/../';
    protected $bootData = [
        'loadRoutesFrom' => 'routes/web.php',
        'loadViewsFrom' => ['views','Appframe'],
        'loadMigrationsFrom' => 'migrations',
    ];

	protected $publishDataDir = __DIR__ . '/../';
	protected $publishData = [
        'config' => ['config_path','/'],
        'assets' => ['public_path','/'],
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
        $publishDir = $this->publishDataDir;
        foreach ($this->bootData as $method => $data){
            $args = (array) $data;
            $args[0] = $bootDir . $args[0];
            call_user_func_array([$this,$method],$args);
        }

        $publishDataArray = [];
        foreach ($this->publishData as $from => $data){
            $source = $publishDir . $from;
            $destination = call_user_func($data[0],$data[1]);
            $publishDataArray[$source] = $destination;
        }

        $this->publishes($publishDataArray);
        $this->publishes($publishDataArray,'update');

        Event::listen(['eloquent.creating: *'], function($name,$data) { $this->setModelDataSignature('created_by',$data); });
        Event::listen(['eloquent.updating: *'], function($name,$data) { $this->setModelDataSignature('updated_by',$data); });
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
            $this->unsignedBigInteger('created_by')->nullable();
            $this->unsignedBigInteger('updated_by')->nullable();
            $this->timestamps();
            $this->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $this->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    private function setModelDataSignature($Signature,$data){
        if(!empty($data) && !!($User = Request()->user()))
            foreach($data as $Model)
                if($this->hasSignatureAble($Model,$Signature))
                    $this->setModelAttribute($Model,$Signature,$User->id);
    }
}
