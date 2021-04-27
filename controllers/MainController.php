<?php

namespace app\controllers;
use app\basic\Application;
use app\basic\Controller;

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

    public function activateContact()
    {
        return 'Active data';
    }  
}