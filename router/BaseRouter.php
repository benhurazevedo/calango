<?php
namespace router;

use Exception;

class BaseRouter{
    private $controller;
    private $action;
    public function loadAction(){
        $controllerDeclared = isset($_GET["controller"]);
        $actionDeclared = isset($_GET["action"]);
        if($controllerDeclared && $actionDeclared){
            try {
                $class_exists = class_exists('controllers'.OS_PATH_SLASH.$_GET["controller"], true);
            }
            catch(Exception $e) {
                $this->notFoundRouteAction();
            }
            if(!$class_exists)
            {
                $this->notFoundRouteAction();
            }
            $controllerFullName = '\\controllers\\'.$_GET["controller"];
            $controller = new $controllerFullName($this);
            $actionName = $_GET["action"];
            if(method_exists($controller,$actionName)){
                $controller->$actionName();
            }
            else{
                $this->notFoundRouteAction();
            }
        }
        else
        {
            if(defined('DEFAULT_CONTROLLER') && defined('DEFAULT_ACTION'))
            {
                $this->responseRedirect(DEFAULT_CONTROLLER,DEFAULT_ACTION);
            }
            $this->notFoundRouteAction();
        }
    }
    function __construct(){
        $this->loadApplicationFilter($this);
        $this->loadControllerFilter($this);
        $this->loadActionFilter($this);
        $this->loadAction();
    }
    /*
     you can overload notFoundRouteAction to atempts to your needs
     */
    public function notFoundRouteAction(){
        die("Route not found.");
    }
    
    private function loadFilter($filterClassName=null)
    {
        if($filterClassName==null)
        {
            return;
        }
        $filterPath = str_replace("\\", OS_PATH_SLASH, $filterClassName);
        try
        {
            $class_exists = class_exists($filterPath,true);
        }
        catch(Exception $e)
        {
            return;
        }
        if($class_exists)
        {
            $className = '\\'. $filterClassName;
            new $className();
        }
        
    }
    public function loadApplicationFilter()
    {
        $this->loadFilter('filters\\ApplicationFilter');
    }
    public function loadControllerFilter()
    {
        if(isset($_GET["controller"]))
        {
            $this->loadFilter('filter\\' . $_GET["controller"] . '\\ControllerFilter');
        }
    }
    public function loadActionFilter()
    {
        if(isset($_GET["controller"]) && isset($_GET["action"]))
        {
            if(isset($_GET["controller"]))
            {
                $this->loadFilter('filter\\' . $_GET["controller"] . '\\'. $_GET["action"] .'Filter');
            }
        }
    }
    public function responseRedirect($controller=null,$action=null,$id=null)
    {
        if($controller==null && $action==null)
        {
            exit("Controller or action not defined.");
        }
        if($id == null)
        {
            $url = str_replace("//", "/", PATH."/".$controller."/".$action);
            $url = str_replace("http:/", "http://", $url);
            $url = str_replace("https:/", "https://", $url);
            header("Location:".$url);
            return;
        }
        $url = str_replace("//","/",PATH."/".$controller."/".$action."/".$id);
        $url = str_replace("http:/", "http://", $url);
        $url = str_replace("https:/", "https://", $url);
        header("Location:".$url);
        return;
    }
}
?>