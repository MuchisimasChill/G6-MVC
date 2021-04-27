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
        if ($recall === false) {
            $this->response->setCodeStatus(404);
            return $this->callView('_404');
        }
        if (is_string($recall)) {
            return $this->callView($recall);
        }
        if(is_array($recall)){
            $recall[0] = new $recall[0]();
        }
        return call_user_func($recall, $this->request);
   }

    public function callView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->callOnlyView($view, $params);
        return str_replace('{{content}}',$viewContent,$layoutContent);
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

    protected function callOnlyView($view, $params)
    {
        foreach ($params as $key => $param) {
            $$key = $param; 
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }

}
