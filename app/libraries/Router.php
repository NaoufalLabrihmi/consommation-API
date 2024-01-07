<?php
class Router
{
    protected $currentController ;
    protected $currentMethod;
    protected $params = [];

    public function __construct()
    {
        
        $urlData = $this->getUrl();
   
       
        
        if (empty($urlData)){
            $urlData['controller']  = 'Home';
            $urlData['method']  = 'index';
            $urlData['params'] = [];

        } 
  
        
        
       
        
        
        
        if (file_exists('../app/controllers/' . ($urlData['controller']) . '.php')) {
            $currentController = $urlData['controller'];
            require_once('../app/controllers/' . $currentController . '.php');
            
            $this->currentController = new $currentController;
            if(method_exists($this->currentController, $urlData['method'])){
                $this->currentMethod = $urlData['method'];
              }
        } else {
            
            require_once '../app/controllers/ErrorCustom.php';
            $error = new ErrorCustom();
        }
        $this->params =  $urlData['params'];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        $urlData = array();
 
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
         

            // Set controller
            $urlData['controller'] = isset($url[0]) ? $url[0] : null;

            // Set method
            $urlData['method'] = isset($url[1]) ? $url[1] : null;

            // Set params
            $urlData['params'] = array_slice($url, 2);
           
            
            return $urlData;
        }
    }
}
