<?php
declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

class ViewMiddleware implements Middleware
{
    /**
     * {@inheritdoc}
     */
    public function process(Request $request, RequestHandler $handler): Response
    {
        $twig = new Twig(__DIR__ . '/../templates');
        #$twigMiddleware = new TwigMiddleware($twig, $container, $routeParser, $basePath);
        #$app->add($twigMiddleware);

        $request = $request->withAttribute("view",$twig);
        #$app->add($twigMiddleware);
        return $handler->handle($request);

        #$request = $request->withAttribute('session', $_SESSION);

    }
}
