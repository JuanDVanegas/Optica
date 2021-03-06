<?php
class Codigo
{
	private $id_codigo = 0;
	private $numero = 0;
	private $tipo = 0;
	
	public function __construct($Numero,$Tipo,$Id_codigo)
	{
		$this->id_codigo = $Id_codigo;
		$this->numero = $Numero;
		$this->tipo = $Tipo;
	}
	
	public function nuevoCodigo()
	{
		include("database/conexion.php");	
		
		$sql = "INSERT INTO codigo(numero,tipo,fk_mail) VALUES('$this->numero','$this->tipo','$this->id_codigo')";
		if($db->query($sql))
		{
			$_SESSION["next"]="inserted";
		}
		else
		{
			$_SESSION["next"]="fall";
		}
	}
	
	public function validarCodigo()
	{
		include("database/conexion.php");
		$sql = "SELECT * FROM codigo WHERE numero='$this->numero' AND tipo='$this->tipo' AND fk_mail='$this->id_codigo'";
		if(!$result = $db->query($sql))
		{
			die("Error database");
		}
		else;
		if($result->fetch_assoc())
		{
			$_SESSION["next"]="true";
		}
		else
		{
			$_SESSION["next"]="false";
		}
	}
	
	public function eliminarCodigo()
	{
		include("database/conexion.php");
		$sql = "DELETE FROM codigo WHERE numero='$this->numero' AND tipo='$this->tipo'";
		
		if ($db->query($sql) == true)
		{
			$_SESSION["next"]="deleted";
		}
		else
		{
			$_SESSION["next"]="error";
		}
	}
}
?>