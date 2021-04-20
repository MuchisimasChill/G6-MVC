<?php
namespace app\basic;

class Router
{
    public Request $request;    
    protected array $routes = [];
    public Response $response;

    public function __construct(Request $request,Response $response)
    {
        $this->request =  $request;
        $this->response = $response;
    }

    public function get($path,$recall)
    {
       $this->routes['get'][$path] = $recall;
    }

    public function post($path,$recall)
    {
       $this->routes['post'][$path] = $recall;
    }

   public function resolve()
   {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $recall = $this->routes[$method][$path] ?? false;
        if ($recall === false) 
        {
            $this->response->setCodeStatus(404);
            return $this->callView('_404');
        }
        if (is_string($recall)) {
            return $this->callView($recall);
        }
        return call_user_func($recall);

        
    //   echo '<pre>';
    //   var_dump($path);
    //   echo '</pre>';
    //   exit; 
   }

    public function callView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->callOnlyView($view);
        return str_replace('{{content}}',$viewContent,$layoutContent);
        //include_once Application::$ROOT_DIR . "/views/$view.php";
    }

    public function callContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}',$viewContent,$layoutContent);       
    }


    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/mainLayout.php";
        return ob_get_clean();
    }

    protected function callOnlyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }

}
