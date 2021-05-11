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

    public function rules(): array
    {
        return [
            'first_name' => [self::RULE_REQ],
            'second_name' => [self::RULE_REQ],
            'email' => [self::RULE_EMAIL, self::RULE_REQ],
            'password' => [
                self::RULE_REQ,
                [self::RULE_MIN_LENGTH, 'min' => 8],
                [self::RULE_MAX_LENGTH, 'max' => 16]
            ],
            'confirm_password' => [
                self::RULE_REQ, 
                [self::RULE_MATCH, 'match' => 'password']
            ]
        ];
    }
}
