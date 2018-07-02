<?php
namespace services\htmlHelper;
class HtmlHelperService{
    function __construct(){
        if(isset($_SESSION["initialized"]))
        {
            if($_SESSION["initialized"])
            {
                return;
            }
        }
        session_start();
        $_SESSION["initialized"] = true;
    }
    public function actionUrl($controllerName, $actionName, $routeParams="")
    {
        if($routeParams=="")
        {
            return $this->generateBaseURL().$controllerName."/".$actionName;
        }
        else
        {
            return $this->generateBaseURL().$controllerName."/".$actionName."/".$routeParams;
        }
    }
    public function resourceUrl($basePath)
    {
        return $this->generateBaseURL() . $basePath;
    }
    private function generateBaseURL()
    {
        return defined("PATH")?PATH:"";
    }
    public function setTempData($name=NULL, $value=NULL)
    {
        if($name == NULL || $value == NULL)
        {
            return;
        }
        $key = $name."TempData";
        $_SESSION[$key] = $value;
    }
    public function getTempData($name=NULL)
    {
        if($name == NULL)
        {
            return;
        }
        $key = $name."TempData";
        $value = isset($_SESSION[$key])?$_SESSION[$key]:null;
        unset($_SESSION[$key]);
        return $value;
    }
}
?>