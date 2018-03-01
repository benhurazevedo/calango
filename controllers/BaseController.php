<?php
namespace controllers;
abstract class BaseController
{
	protected $objRouter;
	function __construct($router=null)
	{
		if($router == null)
		{
			exit("router not exists");
		}
		$this->objRouter=$router;
	}
	public function responseApi()
	{
		$httpMethodName="do".$_SERVER['REQUEST_METHOD'];
		if(method_exists($this,$httpMethodName))
		{
			$this->$httpMethodName();
		}
		else
		{
			echo json_encode(array("message" => "resource not found."));
			exit();
		}
	}
	public function showView()
	{
		$controlerName = $_GET["controller"];
		$actionName = $_GET["action"];
		$viewPath = "views\\".$controlerName."\\".$actionName.".php";
		if(!file_exists($viewPath))
		{
			echo "View not implemented.";
			exit();
		}
		include $viewPath;
		if($layoutPage == NULL)
		{
			exit();
		}
		if(!file_exists($layoutPage))
		{
			echo "template not implemented.";
			exit();
		}
		include $layoutPage;
		exit();
	}
	public function responseRedirect($controller=null,$action=null,$id=null)
	{
	    if($controller==null && $action==null)
	    {
	        exit("Controller or action not defined.");
	    }
	    if($id == null)
	    {
	        header("Location:../".$controller."/".$action);
	        return;
	    }
        header("Location:../".$controller."/".$action."/".$id);
        return;
	}
	public function bind($object=null)
	{
	    if($object==null)
	    {
	        die("Bind method needs a object.");
	    }
	    foreach(get_object_vars($object) as $propertyName=>$value)
	    {
	        $object->$propertyName = isset($_POST[$propertyName])?$_POST[$propertyName]:null;
	    }
	    return $object;
	}
}
?>