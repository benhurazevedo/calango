<?php
#defining os path slash and autoload
if(PHP_OS == "WINNT"){
    define("OS_PATH_SLASH","\\");
    spl_autoload_extensions(".php");
    spl_autoload_register();
}
else{
  define("OS_PATH_SLASH","/");
  $autoLoad = function($class)
  {
      $file = str_replace('\\', '/', $class) . '.php';
      if (is_file($file)) {
          require $file;
      }
  };
  spl_autoload_register($autoLoad);
}

#defining encode
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

#define('DSN','odbc:DRIVER={ODBC Driver 17 for SQL Server};SERVER=192.168.0.252;DATABASE=DB5624_GESTAO_DEMANDAS');
define('DSN','sqlsrv:SERVER=df7436sr328;DATABASE=DB5624_GESTAO_DEMANDAS_DES');
define("DATABASE_USER","s562401");
define("DB_PASSWORD", "s562401@");
define("DEFAULT_CONTROLLER","geral");
define("DEFAULT_ACTION","index");
define("PATH","http://www.geopc.des.mz.caixa/gestaodemandas/");
?>
