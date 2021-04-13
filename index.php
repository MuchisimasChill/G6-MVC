<?php

require_once __DIR__.'/vendor/autoload.php';

use app\basic\Application;

$app = new Application();

$app->router->get('/', function(){
     return 'Hello';
});

$app->run();