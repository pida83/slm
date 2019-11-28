<?php
namespace App\Application\Actions\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Application\Actions\Controllers\Base\BaseController;

class HomeController extends BaseController
{
    public function __construct(ContainerInterface $container) {
        parent::__construct($container);
    }

    public function __invoke(Request $req, Response $res, $param)
    {
        $method =$req->getAttribute("method");
        return (method_exists($this,$method))? $this->$method($req,$res,$param) : $this->index($req,$res,$param);
    }

    public function index(Request $req, Response $res, $param)
    {
        return $this->view->render($res,"/index.html",["a"=>"testa"]);

        #$res->getBody()->write();
/*
        $arr = array(
            'param1',
            'param2',
            'param3',
            'param4',
            'param5',
        );

        $aParam = (empty($param['param']))? null : array_combine($arr ,explode("/",$param['param']));

        echo "LINE :: " . __LINE__ . "<br/>";
        echo "FILE :: " . __FILE__ . "<br/>";
        echo "METHOD :: " . __METHOD__ . "<br/>";
        echo "<pre>";
        var_dump($req);
        echo "</pre>";
        exit;
        #$res->getBody()->write($req->getAttribute('view')->render("/index.html"));
*/
     #   return $res;
    }

    public function home(Request $req, Response $res, $param)
    {
        return $res;
    }

}