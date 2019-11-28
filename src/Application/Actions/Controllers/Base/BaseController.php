<?php
namespace App\Application\Actions\Controllers\Base;

use App\Application\Actions\Controllers\HomeInterface\HomeInterface;
use App\Application\Actions\SttTest;
use App\Application\Middleware\SessionMiddleware;
use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface as Request;


class BaseController implements HomeInterface
{
    /**
     * @var $container ContainerInterface
     */
    protected $container;
    /**
     * @var $view Twig
     */
    protected $view;
    /**
     * @var $db \Illuminate\Database\Capsule\Manager
     */
    protected $db;
    /**
     * property
     *
     * @var $request \Slim\Psr7\Request;
     */
    protected $request;
    /**
     * @var $request \Slim\Psr7\Response;
     */
    protected $response;
    protected $param;


    public function __construct(ContainerInterface $container) {

        $this->container = $container;

        $this->view = $container->get(Twig::class);
        $this->db = $container->get("db");
        #$this->flash =$container->get("flash");
    }

    public function getHome($ia)
    {
        // TODO: Implement getHome() method.
    }
}