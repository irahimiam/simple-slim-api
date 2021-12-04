<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'api' => [
                'version' => 'v1',
                'base_url' => 'http://api:10'
            ],
            //database
            'db' => [
                'dsn' => 'mysql',
                'database' => __DIR__. '/api_database',
            ]
        ],
    ]);
};
