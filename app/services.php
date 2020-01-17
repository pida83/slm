<?php
declare(strict_types=1);

use App\Domain\Board\BoardRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\Board\BoardDAO;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;
use App\Application\Inter\Bar;
use App\Application\Cont\BarManager;
use Psr\Container\ContainerInterface;
return function (ContainerInterface $c) {
    // def
    // 다 지우기
    // def
    //$c->set(BarManager::class,\DI\create()->constructor(DI\get(Bar::class),"seconds arg") ); // 생성자에 파라미터 주입 시
    // BarManager::class => \DI\create()->constructor(DI\get(Bar::class),"test") // 생성자에 주입시
};
