<?php

namespace Ghiffariaq\MiniACL;

use Illuminate\Support\ServiceProvider;
use Ghiffariaq\MiniACL\Console\Commands\AssignRole;
class MiniACLServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

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
        $this->mergeConfigFrom(__DIR__.'/../config/miniacl.php', 'miniacl');

        // Register the service the package provides.
        $this->app->singleton('miniacl', function ($app) {
            return new MiniACL;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['miniacl'];
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
            __DIR__.'/../config/miniacl.php' => config_path('miniacl.php'),
        ], 'miniacl.config');


        // Registering package commands.
        $this->commands([
            AssignRole::class
        ]);
    }


}