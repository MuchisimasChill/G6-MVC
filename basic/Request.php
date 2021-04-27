<?php

namespace app\basic;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $startPosition = strpos($path,'?');
        if($startPosition === false)
        {
            return $path;
        }
        return substr($path, 0, $startPosition);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']); 
    }

    public function getBody()
    {
        # code...
    }
}