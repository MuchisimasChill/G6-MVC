<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\basic\Application;
use app\controllers\MainController;


$app = new Application(dirname(__DIR__));

$app->router->get('/','home');

$app->router->get('/contact','contact');

$app->router->post('/contact', [\app\controllers\MainController::class, 'contact']);

$app->run();