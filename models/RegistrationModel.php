<?php

namespace app\models;
use app\basic\Model;

class RegistrationModel extends Model 
{
    public string $first_name;
    public string $second_name;
    public string $email;
    public string $password;
    public string $confirm_password;

    public function register()
    {
       echo 'poluczilos';
    }
}
