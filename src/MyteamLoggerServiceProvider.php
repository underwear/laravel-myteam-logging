<?php

namespace MyteamLogger;

use Illuminate\Support\ServiceProvider;

/**
 * Class MyteamLoggerServiceProvider
 * @package Logger
 */
class MyteamLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/myteam-logger.php', 'myteam-logger');
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/myteam-logger.php' => config_path('myteam-logger.php')], 'config');
    }
}