<?php
namespace App\Application\Actions\Controllers;

use Mockery\Generator\Method;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Application\Actions\Controllers\Base\BaseController;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use  App\Application\Cont\BarManager;
class HomeController extends BaseController
{
    public function __construct(ContainerInterface $container) {

        parent::__construct($container);

    }

    public function __invoke(Request $req, Response $res, $params)
    {
        return $res;
    }
    public function index(Request $req, Response $res, $params)
    {
        $method = $req->getAttribute("method");
        $param = $req->getQueryParams();
        //return $this->view->render($res, , $params);
        $ba = $this->container->get(BarManager::class);
        $ba->mail("1","2");

        //$ba->mail("1","2");

        return $res;
    }
    public function home(Request $req, Response $res, $params) {

        try {
            return $this->view->render($res, "index.html", $params);
        } catch (LoaderError $e) {

        } catch (RuntimeError $e) {

        } catch (SyntaxError $e) {

        }
        //return $res;
    }

    /*
        public function __invoke(Request $req, Response $res, $param)
        {
            return $this;
            //$method =$req->getAttribute("method");
            //return (method_exists($this,$method))? $this->$method($req,$res,$param) : $this->index($req,$res,$param);
        }

        public function index(...$args)
        {
            $req = $args[0]??null;
            $res = $args[1]??null;
            $param = $args[2]??null;
            #Request $req, Response $res, $param
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
         #   return $res;
        }

        public function home(Request $req, Response $res, $param)
        {
            return $res;
        }
    */

}