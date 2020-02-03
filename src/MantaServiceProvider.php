<?php

namespace fazzinipierluigi\manta;

use Illuminate\Support\ServiceProvider;

class MantaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
		$this->mergeConfigFrom([
        	__DIR__.'/config/manta.php' => 'manta',
    	]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		### PUBLISH ###
		$this->publishes([
        	__DIR__.'/config/model.php' => config_path('manta.php'),
    	]);

		### MIGRATIONS ###
		$this->loadMigrationsFrom(__DIR__.'/database/migrations');

		### ROUTES ###
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');

		### VIEWS ###
		$this->loadViewsFrom(__DIR__.'/resources/views/views', 'manta');

		### COMMANDS ###
		if ($this->app->runningInConsole()) {
	        $this->commands([
				fazzinipierluigi\manta\Commands\CreatePermission::class,
				fazzinipierluigi\manta\Commands\AssignPermission::class,
				fazzinipierluigi\manta\Commands\ImportPermission::class
	        ]);
    	}
    }
}
