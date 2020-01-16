<?php
declare(strict_types=1);

use App\Application\Cont\BarManager;
use App\Domain\Board\BoardRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\Board\BoardDAO;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        BoardRepository::class => \DI\autowire(BoardDAO::class),
        BarManager::class => \DI\autowire()->constructorParameter("param","param 파라메터에 바인딩") // 생성자에 주입시
    ]);
};
