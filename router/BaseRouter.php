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
				$class_exists = class_exists('controllers\\'.$_GET["controller"], true);
			}
			catch(Exception $e) {
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
			$this->notFoundRouteAction();
	}
	function __construct(){
		$this->loadApplicationFilter();
		$this->loadControllerFilter();
		$this->loadActionFilter();
		$this->loadAction();
	}
	/*
		you can overload notFoundRouteAction to atempts to your needs
	*/
	public function notFoundRouteAction(){
		echo "Route not found.";
	}
	
	private function loadFilter($filterClassName=null)
	{
		if($filterClassName==null)
		{
			return;
		}
		try 
		{
			$class_exists = class_exists($filterClassName,true);
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
}
?>