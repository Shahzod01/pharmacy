<?php

use App\Core\Application;
use App\Controllers\SiteController;
use App\Controllers\AuthController;

require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


class Train implements \App\Car
{
    public function drive()
    {
        return "tututu";
    }
}

class Moto implements \App\Car
{
    public function drive()
    {
        
    }
}
class Game
{
    public function run()
    {
        
    }
}

$train = new Train();
$train->drive();
$config = [
    'userClass' => \App\Models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];
//dd(phpinfo());

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contacts', [SiteController::class, 'contacts']);
$app->router->get('/about', function(){
    return 'about';
});

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();
