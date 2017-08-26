<?php
include('claseUsuario.php');

class Medico extends Usuario
{
	public $nombreEntidad;
	public $codigo;
	
	public function __construct($NombreEntidad,$Codigo)
	{
		parent::__construct($RolUsuario,$Nombre,$Apellido,$TipoDocumento,$NumeroDocumento,$Telefono,$Nacimiento,$Entidad);
		$this->nombreEntidad = $NombreEntidad;
		$this->codigo = $Codigo;
	}
	
	public function confirmarEntidad()
	{
		
		include('database/conexion.php');
		$sql="SELECT * FROM entidad WHERE codigo='$this->codigo'";
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
			header('Location: nuevoUsuarioFormulario1.php');
		}
	}
	
	public function generarReporte()
	{
		
	}
}

?>