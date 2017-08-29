<?php
class Paciente
{
	private $id_usuario;
	
	public function __construct($Id_usuario)
	{
		$this->id_usuario = $Id_usuario;
	}
	public function cambiarEstado($action)
	{
		include('database/conexion.php');
		if($action == 1)
		{
			$respuesta = "habilitar";
		}
		else
		{
			$respuesta = "inhabilitar";
		}
		
		$sql2 = "UPDATE login SET estado = '$action' WHERE fk_user = '$this->id_usuario'";
		if($db->query($sql2) == true)
		{
			$_SESSION["success"] = "Exito al ".$respuesta." usuario";
			header("Location: cuentaAdminEstadoUsuario.php");
		}
		else
		{
			$_SESSION["error"] = "Error al ".$respuesta." usuario";
			header("Location: cuentaAdminEstadoUsuario.php");
		}
		
		
	}
}
?>