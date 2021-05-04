<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\basic\Application;
use app\controllers\MainController;
use app\controllers\AutorizationController;

$app = new Application(dirname(__DIR__));

$app->router->get('/',[MainController::class, 'home']);

$app->router->get('/contact',[MainController::class, 'contact']);

$app->router->post('/contact', [MainController::class, 'activateContact']);

$app->router->get('/login', [AutorizationController::class, 'login']);
$app->router->post('/login', [AutorizationController::class, 'login']);

$app->router->get('/register', [AutorizationController::class, 'register']);
$app->router->post('/register', [AutorizationController::class, 'register']);

$app->run(); 