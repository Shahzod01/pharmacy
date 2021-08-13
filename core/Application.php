<?php

namespace App\Core;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $ROOT_DIR;
    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath)
    {
        $this->request = new Request();
        $this->response = new Response();
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->router = new Router($this->response);
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