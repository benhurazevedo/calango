<?php
#defining os path slash
if(PHP_OS == "WINNT"){
    define("OS_PATH_SLASH","\\");
    spl_autoload_extensions(".php");
    spl_autoload_register();
}
define('DSN','odbc:DRIVER={SQL Server};SERVER=(local)\SQLEXPRESS;DATABASE=UNIDADES');
define("DATABASE_USER","sa");
define("DB_PASSWORD", "sa");
define("DEFAULT_CONTROLLER","A");
define("DEFAULT_ACTION","Oiaction");
define("PATH","http://localhost:60000/");
?>