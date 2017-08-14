<?php

class Medico
{
	public $nombreEntidad;
	public $codigo;
	public function __construct($NombreEntidad,$Codigo)
	{
		$this->nombreEntidad = $NombreEntidad;
		$this->codigo = $Codigo;
	}
	
	public function confirmarEntidad()
	{
		
		include('database/conexion.php');
		$sql="SELECT * FROM entidad WHERE nombre='$this->nombreEntidad' AND codigo='$this->codigo'";
		if(!$result = $db->query($sql))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		else;
		
		if($row = $result->fetch_assoc())
		{	
			$_SESSION["entidad"] = stripslashes($row["id_entidad"]);
		}
		else
		{
			$_SESSION["errorRegistro"] = "<b>Esta entidad optica no esta vinculada al sistema</b>";
			header('Location: ../usuario/nuevoUsuarioFormulario1.php');
		}
	}
	
	public function generarReporte()
	{
		
	}
}

?>