<?php
namespace app\basic;

class Router
{
    public Request $request;    
    protected array $routes = [];

    public function __construct(\app\basic\Request $request)
    {
        $this->request =  $request;
    }

    public function get($path,$recall)
   {
       $this->routes['get'][$path] = $recall;
   }

   public function resolve()
   {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $recall = $this->routes[$method][$path] ?? false;
        if ($recall === false) 
        {
            echo "Not found";
            return ;
        }
        echo call_user_func($recall);
    //   echo '<pre>';
    //   var_dump($path);
    //   echo '</pre>';
    //   exit; 
   }
}
