<?php
namespace app\basic;

/*
*@package app\basic
*/

class Application
{
    public static string  $ROOT_DIR;
    public Router $router;
    public Request $request; 
    public Response $response;
    public Database $db;
    public static Application $app;
    public Controller $controller;

    public function __construct($path, array $data)
    {
        self::$ROOT_DIR = $path;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);   
        $this->db = new Database($data['db']);    
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
}