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
	
	public function __construct($RolUsuario,$Nombre,$Apellido,$TipoDocumento,$NumeroDocumento,$Telefono,$Nacimiento,$Entidad)
	{
		$this->rolUsuario = $RolUsuario;
		$this->nombre = $Nombre;
		$this->apellido = $Apellido;
		$this->tipoDocumento = $TipoDocumento;
		$this->numeroDocumento = $NumeroDocumento;
		$this->telefono = $Telefono;
		$this->nacimiento = $Nacimiento;
		$this->entidad = $Entidad;
	}
	
	public function registrar()
	{
		
		include('database.php');
		$sql="INSERT INTO usuario (nombre,apellido,tipoDocumento,numeroDocumento,rolUsuario,nacimiento,entidad,telefono)
		VALUES ('$this->nombre','$this->apellido','$this->tipoDocumento','$this->numeroDocumento','$this->rolUsuario','$this->nacimiento','$this->entidad','$this->telefono')";
		if ($db->query($sql) === TRUE)
		{
			$sql4="SELECT * FROM usuario WHERE tipoDocumento='$this->tipoDocumento' AND numeroDocumento='$this->numeroDocumento'";
			if(!$result4 = $db->query($sql4))
			{
				die('error al ejecutar la sentencia '. $db->error.']');
			}
			
			if($row4 = $result4->fetch_assoc())
			{
				session_start();
				$idUsuario=stripslashes($row4["id_usuario"]);
				$_SESSION["fk_user"] = $idUsuario;
				$_SESSION["next"] = 1;
			}
			else
			{
				$_SESSION["errorRegistro"] = "<b>Error en el sistema 402, intentelo de nuevo</b>";
				if($_SESSION["reg"]==1)
				{
					header("Location: nuevoUsuarioFormulario1.php");
				}
				else
				{
					header("Location: nuevoUsuarioFormulario2.php");
				}
			}
		}
		else
		{
			$_SESSION["errorRegistro"] = "<b>Error en el sistema 401, intentelo de nuevo</b>";
			if($_SESSION["reg"]==1)
			{
				header("Location: nuevoUsuarioFormulario1.php");
			}
			else
			{
				header("Location: nuevoUsuarioFormulario2.php");
			}
		}
	}
	
	public function validarDocumento()
	{
		include('database.php');
		$sql5="SELECT * FROM usuario WHERE tipoDocumento='$this->tipoDocumento' AND numeroDocumento='$this->numeroDocumento'";
		if(!$result5 = $db->query($sql5))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		else;
		
		if($row5 = $result5->fetch_assoc())
		{
			$_SESSION["errorRegistro"] = "<b>Documento no se encuentra disponible.</b>";
			if($_SESSION["reg"]==1)
			{
				header("Location: nuevoUsuarioFormulario1.php");
			}
			else
			{
				header("Location: nuevoUsuarioFormulario2.php");
			}
		}
		else;
	}
	
}

?>