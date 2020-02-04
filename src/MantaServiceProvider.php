<?php

namespace fazzinipierluigi\Manta;

use Illuminate\Support\ServiceProvider;

class MantaServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
    	### TRENSLATIONS ###
		$this->loadTranslationsFrom(__DIR__.'/resources/lang', 'fazzinipierluigi');

		### MIGRATIONS ###
		$this->loadMigrationsFrom(__DIR__.'/database/migrations');

		### ROUTES ###
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');

		### VIEWS ###
		$this->loadViewsFrom(__DIR__.'/resources/views', 'manta');

        // Publishing is only necessary when using the CLI.
		if ($this->app->runningInConsole()) {
			$this->bootForConsole();
		}
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/manta.php', 'manta');

        // Register the service the package provides.
        $this->app->singleton('manta', function ($app) {
            return new Manta;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['manta'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
        	 __DIR__.'/config/model.php' => config_path('manta.php'),
    	]);

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/fazzinipierluigi'),
        ], 'manta.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/fazzinipierluigi'),
        ], 'manta.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/fazzinipierluigi'),
        ], 'manta.views');*/

        ### COMMANDS ###
        $this->commands([
			\fazzinipierluigi\Manta\App\Commands\CreatePermission::class,
			\fazzinipierluigi\Manta\App\Commands\AssignPermission::class,
			\fazzinipierluigi\Manta\App\Commands\ImportPermission::class
		]);
    }
}
