<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use SimpleMVC\Model\DBOperations;

class Home implements ControllerInterface
{
    protected $plates;
    protected $conn;

    public function __construct(Engine $plates, DBOperations $conn)
    {   
        $this->plates = $plates;
        $this->conn = $conn;
    }

    public function execute(ServerRequestInterface $request)
    {
        $articles = $this->conn->getArticles();
        $displaybuttonlogin = !isset($_SESSION) ? "Login" : "Go to your Article Management";
        echo $this->plates->render('home', ['logbtn' => $displaybuttonlogin, 'articles'=> $articles]);
    }

}
