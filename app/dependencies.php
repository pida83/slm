<?php
declare(strict_types=1);


use App\Application\Middleware\SessionMiddleware;
use App\Utility\Configuration;
use DI\ContainerBuilder;
use Illuminate\Database\Capsule\Manager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Flash\Messages;
use Slim\Views\Twig;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        Twig::class => function(ContainerInterface $c) {
                $settings = $c->get('settings');
                $twigSetting = $settings['twig'];
                $twig = new Twig($twigSetting['basepath'],$twigSetting['option']);
                return $twig;
         },
        "db" => function (ContainerInterface $c) {
            $settings = $c->get('settings');
            $dbSetting = $settings['db'];
            $capsule = new Manager;
            $capsule->addConnection($dbSetting);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            return $capsule;
        },
        "flash" => function (ContainerInterface $c) {
            return new Messages($_SESSION,"flash_data");
        },


    ]);

};
