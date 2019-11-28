<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;
use Slim\Views\Twig;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name'  => 'slim-app',
                'path'  => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'twig' => [
                'basepath' => __DIR__ . "/../public/templates",
                'option'   => [
                    #'cache'       => __DIR__ . "/../public/templates/cache",
                    'cache'       => false,
                    'auto_reload' => true
                ]
            ],
            /*
            'template' => new Twig(__DIR__."/../public/templates",[
                'cache' => __DIR__."/../public/templates/cache",
                'auto_reload' => true
            ]),
            */
            'db' => [
                'driver'    => 'mysql',
                'host'      => '127.0.0.1',
                'port'      => '3306',
                'database'  => 'homestead',
                'username'  => 'homestead',
                'password'  => 'secret',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ],
        ],
    ]);
};
