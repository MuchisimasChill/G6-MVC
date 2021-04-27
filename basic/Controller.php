<?php

namespace app\basic;
use app\basic\Application;

class Controller
{
    public function call($view, $params = [])
    {
        return Application::$app->router->callView($view, $params);
    }
}
