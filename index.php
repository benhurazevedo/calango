<?php

/*
	global gera uma variavel global
	define("FOO_BAR", "something more"); define uma constante
	webBasket -> cesto de informacoes
	antiForgeryTolken -> valida formulario
	quando for api -> o controlador vai ter um metodo Response que roteara o tipo de requisicao
	sempre que o metodo for post em um formulario deverá haver um antiForgeryToken
	use Project\Model\Post; -> usa um namespace
	tempdata -> transfere mensagens entre actions
	Three special keywords self, parent and static are used to access properties or methods from inside the class definition.
	$this
	new \config\Teste;
	*/
include("config.php");
$Html = new \services\htmlHelper\HtmlHelperService;
new \router\BaseRouter;




?>
