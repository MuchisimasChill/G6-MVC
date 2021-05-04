<?php

namespace app\basic;
use app\basic\Application;

class Controller
{
    public string $layout = 'main';
    public function setLayout($layout)
    {
       $this->layout = $layout;
    }

    public function call($view, $params = [])
    {
        return Application::$app->router->callView($view, $params);
    }
}
