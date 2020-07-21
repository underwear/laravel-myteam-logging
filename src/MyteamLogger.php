<?php

namespace MyteamLogger;

use Monolog\Logger;

/**
 * Class MyteamLogger
 * @package App\Logging
 */
class MyteamLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        return new Logger(
            config('app.name'),
            [
                new MyteamHandler($config['level'])
            ]
        );
    }
}