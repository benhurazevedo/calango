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
			#return "../../index.php?controller=".$controllerName."&action=".$actionName;
			return $this->generateBaseURL().$controllerName."/".$actionName;
		}
		else
		{
			#return "index.php?controller=".$controllerName."&action=".$actionName."&".$routeParams;
			return $this->generateBaseURL().$controllerName."/".$actionName."/".$routeParams; 	
		}
	}
	public function resourceUrl($basePath)
	{
		return $this->generateBaseURL() . $basePath;
	}
	private function generateBaseURL()
	{
		if(isset($_GET["id"]) && isset($_GET["action"]) && isset($_GET["controller"]))
		{
			return "../../";
		}
		else if(isset($_GET["action"]) && isset($_GET["controller"]))
		{
			return "../";
		}
		else 
		{
			return "./";
		}
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
	public function setFormToken()
	{
	    $token = rand();
	    if(!isset($_SESSION['formToken']))
	    {
	        $_SESSION['formToken'] = array();
	    }
	    array_push($_SESSION['formToken'], $token);
	    return "<input type='hidden' name='formToken' value='$token'>";
	}
	public function validateFormToken()
	{
	    if(!isset($_SESSION['formToken']))
	    {
	        return false;
	    }
	    if(!is_array($_SESSION['formToken']))
	    {
	        return false;
	    }
	    if(!isset($_POST['formToken']))
	    {
	        return false;
	    }
	    if(!$formTokenIndex = array_search($_POST['formToken'], $_SESSION['formToken']))
	    {
	        return false;
	    }
	    unset($_SESSION['formToken'][$formTokenIndex]);
	    return true;
	}
}
?>