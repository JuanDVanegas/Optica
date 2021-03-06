<?php
class Usuario
{
	private $rolUsuario;
	private $nombre;
	private $apellido;
	private $tipoDocumento;
	private $numeroDocumento;
	private $telefono;
	private $nacimiento;
	private $entidad;
	private $genero;
	
	public function __construct($RolUsuario,$Nombre,$Apellido,$TipoDocumento,$NumeroDocumento,$Telefono,$Nacimiento,$Entidad,$Genero)
	{
		$this->rolUsuario = $RolUsuario;
		$this->nombre = $Nombre;
		$this->apellido = $Apellido;
		$this->tipoDocumento = $TipoDocumento;
		$this->numeroDocumento = $NumeroDocumento;
		$this->telefono = $Telefono;
		$this->nacimiento = $Nacimiento;
		$this->entidad = $Entidad;
		$this->genero = $Genero;
	}	
	
	public function registrar($from)
	{
		
		include('database/conexion.php');
		$sql="INSERT INTO usuario (nombre,apellido,tipoDocumento,numeroDocumento,rolUsuario,nacimiento,entidad,telefono,genero)
		VALUES ('$this->nombre','$this->apellido','$this->tipoDocumento','$this->numeroDocumento','$this->rolUsuario','$this->nacimiento','$this->entidad','$this->telefono','$this->genero')";
		if ($db->query($sql) == true)
		{
			$sql4="SELECT * FROM usuario WHERE tipoDocumento='$this->tipoDocumento' AND numeroDocumento='$this->numeroDocumento'";
			if(!$result4 = $db->query($sql4))
			{
				die('error al ejecutar la sentencia '. $db->error.']');
			}
			
			if($row4 = $result4->fetch_assoc())
			{
				$_SESSION["fk_user"]=stripslashes($row4["id_usuario"]);
				$_SESSION["next"] = 1;
			}
			else
			{
				$_SESSION["errorRegistro"] = "Error en el sistema 402, intentelo de nuevo";
				header($from);
			}
		}
		else
		{
			$_SESSION["errorRegistro"] = "Error al registrar intentelo de nuevo";
			header($from);
		}
	}
	
	public function validarDocumento()
	{
		include('database/conexion.php');
		$sql5="SELECT * FROM usuario WHERE tipoDocumento='$this->tipoDocumento' AND numeroDocumento='$this->numeroDocumento'";
		if(!$result5 = $db->query($sql5))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
		}
		else;
		
		if($row5 = $result5->fetch_assoc())
		{
			$_SESSION["errorRegistro"] = "Documento no se encuentra disponible";
			if(isset($_SESSION["reg"]))
			{
				header($this->genero);
			}		
		}
		else;
	}
	
	public function validarUsuario()
	{
		include('database/conexion.php');		
		
		$sql5="SELECT * FROM usuario WHERE tipoDocumento='$this->tipoDocumento' AND numeroDocumento='$this->numeroDocumento'";
		if(!$result5 = $db->query($sql5))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		else;
		
		if($row5 = $result5->fetch_assoc())
		{
			$_SESSION["paciente"] = stripslashes($row5["id_usuario"]);
			$_SESSION["keyRol"] = stripslashes($row5["rolUsuario"]);
		}
		else
		{
			$_SESSION["keyRol"] = "error";
		}
	}
	
	public function actualizarDatos()
	{
		include('database/conexion.php');
		$sql="UPDATE `usuario` SET nombre = '$this->nombre', apellido = '$this->apellido', telefono = '$this->telefono' WHERE id_usuario = '".$_SESSION["id_usuario"]."'";
		if($db->query($sql) == true)
		{
			$_SESSION["resultActualizar"] = "su información personal ha sido modificada";			
			$_SESSION["nombre"] = $this->nombre;
			$_SESSION["apellido"] = $this->apellido;
			$_SESSION["telefono"] = $this->telefono;
			header($this->genero);
		}
		else
		{
			$_SESSION["error"] = "Error al actualizar sus información personal";
			header($this->genero);
		}
	}
	
}

?>