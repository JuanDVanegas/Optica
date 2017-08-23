<?php
class Administrador
{
	private $id_usuario;
	public function __construct($Id_usuario)
	{
		$this->id_usuario = $Id_usuario;
	}	
	public function eliminarUsuario()
	{
		include('database/conexion.php');
		$sql = "DELETE FROM usuario WHERE id_usuario = '$this->id_usuario'";
		if($db->query($sql) == true)
		{
			$sql2 = "DELETE FROM login WHERE fk_user = '$this->id_usuario'";
			if($db->query($sql2) == true)
			{
				$_SESSION["success"] = "El usuario se ha eliminado exitosamente";
				header("Location: cuentaAdminEliminarUsuario.php");
			}			
		}	
		else
		{
			$_SESSION["error"] = "Error en el proceso, intente nuevamente";
			header("Location: cuentaAdminEliminarUsuario.php");
		}	
	}
	
	public function boom()
	{
		
	}
}

?>