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

    public function isGetMethod()
    {
        return $this->getMethod() === 'get'; 
    }

    public function isPostMethod()
    {
        return $this->getMethod() === 'post'; 
    }


    public function getBody()
    {
        $body = [];
        if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}