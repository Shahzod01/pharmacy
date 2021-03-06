<?php

namespace App\Core;

class Application
{
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public DataBase $db;
    public ?DBModel $user;
    public static string $ROOT_DIR;
    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath, $config)
    {
        $this->userClass = $config['userClass'];
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->router = new Router($this->response);
        $this->db = new DataBase($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        }else{
            $this->user = null;
        }

    }

    public static function isGuest()
    {
        return !self::$app->user;
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

    public function login(DBModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryValue};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}