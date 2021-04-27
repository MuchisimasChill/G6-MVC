<?php

namespace app\controllers;
use app\basic\Application;

class MainController 
{
    public function home()
    {
       $params = [
        'name' => "vivonio"
       ];
       return Application::$app->router->callView('home',  $params);
    }

    public function contact()
    {
        return Application::$app->router->callView('contact');
    }

    public function activateContact()
    {
        return 'Active data';
    }  
}