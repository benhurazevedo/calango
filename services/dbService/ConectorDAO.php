<?php 
namespace services\dbService;
use \PDO;
class ConectorDAO implements ConnectorInterface
{
	private $con;
	function __construct()
	{
		$this->con = new PDO(DSN,DATABASE_USER,DB_PASSWORD);
		$this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	public function getConn()
	{
		return $this->con;
	}
}
?>