<?php
declare(strict_types=1);

use App\Application\Middleware\SessionMiddleware;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('/', "App\Application\Actions\Controllers\HomeController");
    $app->get('/home[/{method}[/{param:.*}]]', "App\Application\Actions\Controllers\HomeController");
    $app->get('/user[/{method}[/{param:.*}]]', 'App\Application\Actions\Controllers\UserController');
    $app->get('/video/', 'App\Application\Actions\Controllers\UserController');

    $app->group('/board',function(RouteCollectorProxy $group){

        $group->get('/','App\Application\Actions\Controllers\BoardController');
        #$group->post('/set_data',\App\Application\Actions\Controllers\BoardController::class);
        $group->any('[/{method}[/{param:.*}]]','App\Application\Actions\Controllers\BoardController');
    });
#http://cdn.dashjs.org/latest/dash.all.min.js
    #$app->get('/board[/{method}[/{param:.*}]]', 'App\Application\Controllers\BoardController')->add(SessionMiddleware::class);
    #$app->get('board', 'App\Application\Controllers\BoardController:index');
    #$app->get("/test",function(){});
    /*
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
    */
};
