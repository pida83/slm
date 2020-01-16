<?php
declare(strict_types=1);

use App\Application\Middleware\SessionMiddleware;
use App\Application\Middleware\ViewMiddleware;
use Slim\App;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Container\ContainerInterface;
use Slim\Interfaces\RouteParserInterface;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

return function (App $app) {
    $app->add(SessionMiddleware::class);
    // Twig
    $app->add(TwigMiddleware::createFromContainer($app, Twig::class));

    $app->add(function(Request $request, RequestHandler $handler){
        $request = $request->withAttribute("foo","bar");

        $response = $handler->handle($request);
        $existingContent = (string) $response->getBody();
        $response = new Response();
        $response->getBody()->write('BEFORE <br/>');
        $response->getBody()->write($existingContent);
        $response->getBody()->write('<br/> AFTER');
        //$test  = (string) $response->getBody();
        return $response;
    });
};
