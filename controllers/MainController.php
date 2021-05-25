<?php

namespace app\controllers;
use app\basic\Application;
use app\basic\Controller;
use app\basic\Request;

class MainController extends Controller
{
    public function home()
    {
       $params = [
        'name' => "vivonio"
       ];
       return $this->call('home',  $params);
    }

    public function contact()
    {
        return $this->call('contact');
    }

    public function activateContact(Request $request)
    { 
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        // exit;
        return 'Active data';
    }  
}