<?php
session_start();

declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use SimpleMVC\Model\ReadOnlyOpt;

class Login implements ControllerInterface
{
    protected $plates;
    protected $conn;

    public function __construct(Engine $plates, ReadOnlyOpt $conn)
    {   
        $this->plates = $plates;
        $this->conn = $conn;

    }

    public function execute(ServerRequestInterface $request)
    {
        if($request->getMethod() != 'POST'){

            if (isset($_SESSION['mail'])){
                echo $this->plates->render('admin');
            } else {
                echo $this->plates->render('login');
            }

        } else {
<<<<<<< HEAD
            if($this->conn->checkLogin($request->getParsedBody())){
                // set session cookie
=======
            if($this->conn->checkLogin($_POST)){

>>>>>>> refs/remotes/origin/master
                $_SESSION['mail'] = $request->getParsedBody()['mail'];
                echo $this->plates->render('admin');
                
            } else {

                echo $this->plates->render('login');
            }

        }

    }

}
