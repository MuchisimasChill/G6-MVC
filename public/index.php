<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\basic\Application;
use app\controllers\MainController;


$app = new Application(dirname(__DIR__));

$app->router->get('/',[new MainController, 'home']);

$app->router->get('/contact',[new MainController, 'contact']);

$app->router->post('/contact', [new MainController, 'activateContact']);

$app->run(); 