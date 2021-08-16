<?php

namespace App\Core;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public DataBase $db;
    public static string $ROOT_DIR;
    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath, $config)
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->router = new Router($this->response);
        $this->db = new DataBase($config['db']);
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