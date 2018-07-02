<?php 
namespace services\dbService;
use \PDO;
class UsuariosDAO
{
	private $connector;
    function __construct($conn=null)
    {
        if($conn==null)
        {
            throw new \Exception ("To get an userDADO its necessary to set a conn");
        }
        $this->connector = $conn;
    }
	public function getUsuario($mat)
	{
		if($mat==null)
		{
			throw new \Exception ("To get an user its necessary to infor a matricula");
		}
		$sqlCommand = "
			SELECT [matricula]
				  ,[nome]
				  ,[unidadeLotacao]
				  ,[unidadeOperacao]
				  ,[nomeUnidadeOperacao]
				  ,[perfil]
				  ,[funcaoPerfil]
			  FROM [dbo].[usuarios]
			  where matricula = :matricula
		";
		$stmt = $this->connector->prepare($sqlCommand);
		$stmt->bindParam(":matricula", $mat);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}
?>