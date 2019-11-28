<?php
namespace App\Application\Actions\Controllers;
use App\Application\Actions\Controllers\Base\BaseController;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController extends BaseController
{

    /**
     * @var \Slim\Flash\Messages $flash
     */
    protected $flash;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->flash = $this->container->get("flash");
        $this->db::enableQueryLog();
    }

    public function __invoke(Request $req, Response $res, $param)
    {

        $this->request = $req;
        $this->response = $res;
        $this->param = $param;

        #$this->response->getBody()->write("throw invoke");

        $method = (isset($param['method']))? $param['method'] : "index";
        $aParam = (isset($param['param']) && !empty($param['param']))? $param['param'] : "";
        #$aParam = explode("/", $param['param']);

        return (method_exists($this,$method))? $this->$method() : $this->index();
    }

    public function index()
    {

        //$this->response->getBody()->write("<script>alert('text')</script>");
        return $this->view->render($this->response,"/video/test.html",[]);
    }
}