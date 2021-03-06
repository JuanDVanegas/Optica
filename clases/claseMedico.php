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
	
	public function confirmarEntidad($from)
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
			$_SESSION["errorRegistro"] = "Esta entidad optica no esta vinculada al sistema";
			header($from);
		}
	}
	
	public function generarReporte()
	{
		
	}
	
	public function numeroMedicoXEntidad()
	{
		include('database/conexion.php');
		$sql="SELECT * FROM usuario WHERE entidad='$this->codigo'";
		if(!$result = $db->query($sql))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		else;
		$_SESSION["numeroMedico"] = 0;
		while($row = $result->fetch_assoc())
		{	
			$_SESSION["numeroMedico"]++;
		}
	}
	
	public function cambiarEstadoMedicoVinculado($action,$from)
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
		
		$sql = "SELECT * FROM usuario WHERE entidad = '$this->codigo'";
		if(!$result1 = $db->query($sql))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
		}
		else;
		$contador = 0;
		while($row1 = $result1->fetch_assoc())
		{
			$id = stripslashes($row1["id_usuario"]);
			
			$sql2 = "UPDATE login SET estado = '$action' WHERE fk_user = '$id'";
			if($db->query($sql2) == true)
			{
				$contador++;
			}
			else
			{
				$_SESSION["error"] = "Error al ".$respuesta." medico";
				header($from);
			}
		}
		if($contador > 0)
		{
			$_SESSION["success"] = "Exito ál ".$respuesta." entidad y afiliados";
			header($from);
			
		}
		else
		{
			$_SESSION["success"] = "Exito ál ".$respuesta." entidad sín afiliados";
			header($from);
		}
		
	}
}

?>