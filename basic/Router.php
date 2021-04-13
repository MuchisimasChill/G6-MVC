<?php
namespace app\basic;

class Router
{
    public Request $request;    
    protected array $routes = [];

   public function get($path,$recall)
   {
       $this->routes['get'][$path] = $recall;
   }

   public function resolve(){
       echo '<pre>';
       var_dump($_SERVER);
       echo '</pre>';
       exit;
   }
}
