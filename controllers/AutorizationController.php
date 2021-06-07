<?php

namespace app\controllers;

use app\basic\Application;
use app\basic\Controller;
use app\basic\Request;
use app\models\RegistrationModel;

class AutorizationController extends Controller
{
    public function login()
    {
        $this->setLayout('Autorization');
        return $this->call("login");
    }

    public function register(Request $request) 
    {
        $registrationModel = new RegistrationModel();
        if ($request->isPostMethod())
        {    
            $registrationModel->loadData($request->getBody());

            if($registrationModel->validate() && $registrationModel->register())
            {
                return 'register access';
            }

            return $this->call("register",[
                'model'=> $registrationModel
            ]);
        }

        $this->setLayout('Autorization');
        return $this->call("register",[
            'model'=> $registrationModel
        ]);
    }
}
