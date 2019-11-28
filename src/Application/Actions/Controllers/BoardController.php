<?php
namespace App\Application\Actions\Controllers;

use App\Application\Actions\Controllers\Base\BaseController;
use App\Application\Actions\SttTest;
use App\Domain\Board\Validator\DataValiate;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\Board\Service\BoardService;
use Slim\Flash\Messages;

class BoardController extends BaseController
{
    /**
     * @var  \App\Domain\Board\Service\BoardService;
     */
    protected $boardService;
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
        $this->boardService = (empty($this->boardService))? new BoardService() : $this->boardService;

        #$this->response->getBody()->write("throw invoke");

        $method = (isset($param['method']))? $param['method'] : "index";
        $aParam = (isset($param['param']) && !empty($param['param']))? $param['param'] : "";
        #$aParam = explode("/", $param['param']);

        return (method_exists($this,$method))? $this->$method() : $this->index();
    }

    public function index()
    {
        $list = $this->boardService->getList();

        $aReturn = [
            "data"  => $list
        ];
        //var_dump($this->request->getAttribute("session"));exit;
        //$this->response->getBody()->write("<script>alert('text')</script>");
        return $this->view->render($this->response,'/board/list.html',$aReturn);
    }

    public function list()
    {

        $list = $this->boardService->getList();
        return $this->view->render($this->response,"/board/list.html",["data" => $list]);
    }

    public function home()
    {
        $list = $this->boardService->getList(50);

        $this->view->render($this->response, "/board/list.html", ["data" => $list]);
        $this->response->getBody()->write("this is home()");

        return $this->response;
    }

    public function view()
    {
        $_SESSION['test'] = "testsession from view";

        var_dump($this->request->getAttributes());exit;
        $aParam = explode("/", $this->param['param']);
        $row = $this->boardService->getRow($aParam[0]);
        $this->view->render($this->response, "/board/view.html", ["data" => $row]);
        $this->response->getBody()->write("<div>this is view</div>");

        return $this->response;
    }

    public function edit()
    {
        $aParam = explode("/", $this->param['param']);
        $row = $this->boardService->getRow($aParam[0]);
        $this->view->render($this->response, "/board/edit.html", ["data" => $row]);
        $this->response->getBody()->write("<div>this is view</div>");
        SttTest::setVal();
        return $this->response;
    }

    public function set_data()
    {
        $aParam = $this->request->getParsedBody();
        $result = $this->boardService->setRow($aParam);
        return ($result)? $this->redirect('/board/view/'.$result->id) : false;
    }

    public function del()
    {
        //$_SESSION['test'] = "testsession from del";
        //$this->flash->addMessage("slimFlash","session1 from del");
        
        #$session = $this->request->session;
        #$session['attr'] = "att";
        
        
        #$this->flash->addMessage("alert","message");
        $aParam = $this->param['param'];
        $result = $this->boardService->delRow($aParam);

        (!$result)?: $this->response->getBody()->write("<script type='text/javascript'>alert('text')</script>");

        /*
        if ( $result ) {
            $this->response->getBody()->write("<script type='text/javascript'>alert('text')</script>");
        }
        */
        return $this->index();
    }

    public function redirect($url = "/board/index"){

        return $this->response
            ->withHeader('Location', $url)
            ->withStatus(302);
    }
    public function redirect_alert($url = "/board/index"){
         $this->response->getBody()->write("<script type='text/javascript'>alert('text')</script>");
         return  $this->response->withHeader('Location', $url)->withStatus(302);
    }

    public function upload_data()
    {
        $aParam = $this->request->getUploadedFiles();
        $result = $this->boardService->setRow($aParam);
        return ($result)? $this->redirect('/board/view/'.$result->id) : false;
    }

    public function add()
    {
        $name = ini_get('session.upload_progress.name');
        $aParam = $this->request->getParsedBody();
        $this->view->render($this->response, "/board/add.html", ['ini'=>$name]);
        return $this->response;
    }

    public function add2()
    {
        $name = ini_get('session.upload_progress.name');
        $aParam = $this->request->getParsedBody();

        $this->view->render($this->response, "/board/add2.html", ['ini'=>$name]);
        return $this->response;
    }

    public function upload_data2()
    {

        if($this->request->getUri()->getQuery() == "process") {
            // does key exist
            $key = ini_get("session.upload_progress.prefix") . 'demo';
            if (!isset($_SESSION[$key])) exit("done");
            // workout percentage
            $upload_progress = $_SESSION[$key];

            //$progress = round(($upload_progress['content_length'] / $upload_progress['bytes_processed']) * 100, 2);
            $aReturn['length'] = $upload_progress['content_length'];
            $aReturn['getlen'] = $upload_progress['bytes_processed'];
            $aReturn['done'] = $upload_progress['done'];
            //$aReturn['error'] =  $upload_progress['error'];
            echo json_encode($aReturn);
            exit;
        }
        //$aParam = $this->request;
        //$aParam = $this->request->getParsedBody();

        //cdecho json_encode($aParam);
        exit;
        //$result = $this->boardService->setRow($aParam);
        //return ($result)? $this->redirect('/board/view/'.$result->id) : false;
    }

    /**
     * @return ContainerInterface
     */
    public function chk_upload()
    {

     if($this->request->getUri()->getQuery() == "process") {
            // does key exist
            $key = ini_get("session.upload_progress.prefix") . 'demo';
            if (!isset($_SESSION[$key])) exit("done");
            // workout percentage
            $upload_progress = $_SESSION[$key];

            //$progress = round(($upload_progress['content_length'] / $upload_progress['bytes_processed']) * 100, 2);
            $aReturn['length'] = $upload_progress['content_length'];
            $aReturn['getlen'] = $upload_progress['bytes_processed'];
            $aReturn['done'] = $upload_progress['done'];
            //$aReturn['error'] =  $upload_progress['error'];
            echo json_encode($aReturn);
            exit;
        }
    }
}