<?php
namespace app\basic;

class Response  
{
    public function setCodeStatus(int $code)
    {
        http_response_code($code);
    }
}
