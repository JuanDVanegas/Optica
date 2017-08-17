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
		
		include('database/conexion.php');
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
		include('database/conexion.php');
		$sql5="SELECT * FROM usuario WHERE tipoDocumento='$this->tipoDocumento' AND numeroDocumento='$this->numeroDocumento'";
		if(!$result5 = $db->query($sql5))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
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
				if($_SESSION["reg"]==3)
				{
					header("Location: cuentaAdminNuevoUsuario.php");
				}
				else
				{
					header("Location: nuevoUsuarioFormulario2.php");
				}				
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
		}
		else
		{
			$_SESSION["resultAgregar"] = "El usuario no se encuentra";
			header("Location: cuentaMedicoHistorial.php");
		}
	}
	
	public function actualizarDatos()
	{
		include('database/conexion.php');
		$sql="UPDATE `usuario` SET nombre = '$this->nombre', apellido = '$this->apellido', tipoDocumento = '$this->tipoDocumento', numeroDocumento = '$this->numeroDocumento', telefono = '$this->telefono', nacimiento = '$this->nacimiento' WHERE id_usuario = '".$_SESSION["id_usuario"]."'";
		if($db->query($sql) == true)
		{
			$_SESSION["resultActualizar"] = "su información personal ha sido modificada";
			
			$_SESSION["nacimiento"] = $this->nacimiento;
			$_SESSION["nombre"] = $this->nombre;
			$_SESSION["apellido"] = $this->apellido;
			$_SESSION["tipoDocumento"] = $this->tipoDocumento;
			$_SESSION["numeroDocumento"]= $this->numeroDocumento;
			$_SESSION["telefono"] = $this->telefono;
			
			if($_SESSION["rolUsuario"] == "Medico")
			{
			 	header("Location: cuentaMedicoPerfil.php");
			}
			else
			{
				if($_SESSION["rolUsuario"] == "Admin")
				{
					header("Location: cuentaAdminPerfil.php");
				}
				else
				{
					header("Location: cuentaPacientePerfil.php");
				}				
			}
			
			
		}
		else
		{
			$_SESSION["resultActualizar"] = "Error al actualizar sus información personal";
			header("Location: index.php");
			if($_SESSION["rolUsuario"] == "Medico")
			{
				header("Location: cuentaMedicoPerfil.php");
			}
			else
			{
				if($_SESSION["rolUsuario"] == "Admin")
				{
					header("Location: cuentaAdminPerfil.php");
				}
				else
				{
					header("Location: cuentaPacientePerfil.php");
				}				
			}
			
		}
	}
	
}

?>