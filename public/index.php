<?php

use App\Core\Application;
use App\Controllers\SiteController;
use App\Controllers\AuthController;

require_once '../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contacts', [SiteController::class, 'contacts']);
$app->router->get('/about', 'about');
$app->router->post('/contacts', [SiteController::class, 'handleContact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();
