<?php
class Codigo
{
	private $id_codigo;
	private $numero;
	private $tipo;
	
	public function __construct($Numero,$Tipo,$Id_codigo)
	{
		$this->id_codigo = $Id_codigo;
		$this->numero = $Numero;
		$this->tipo = $Tipo;
	}
	
	public function nuevoCodigo()
	{
		include("../database/conexion.php");
		$sql = "INSERT INTO codigo(numero,tipo) values('$this->numero','$this->tipo')";
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
		include("../database/conexion.php");
		$sql = "SELECT * FROM codigo WHERE numero='$this->numero' AND tipo='$this->tipo'";
		if($db->query($sql))
		{
			$_SESSION["next"]="true";
		}
		else
		{
			$_SESSION["next"]="false";
		}
	}
}
?>