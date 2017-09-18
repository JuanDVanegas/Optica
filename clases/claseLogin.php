<?php
class Login
{
	private $fk_user = 0;
	private $email = 0;
	private $password = 0;
	
	public function __construct($Email,$Password,$Fk_user)
	{
		$this->email = $Email;
		$this->password = $Password;
		$this->fk_user = $Fk_user;
	}
	
	public function registrar($from)	
	{
		include('database/conexion.php');
		$sql5="INSERT INTO login (fk_user,email,password,confirmMail,estado)
		VALUES ('$this->fk_user', '$this->email', '".md5($this->password)."','0','1')";
		if ($db->query($sql5) === TRUE)
		{
			$_SESSION["success"] = "Se ha registrado el nuevo usuario";
			header($from);				
		}
		else
		{
			$_SESSION["errorRegistro"] = "Error en el sistema 27, intentelo de nuevo";
			header($from);
		}
		
	}
	
	public function iniciarSesion()
	{
		session_start();
		include('database/conexion.php');
		$sql="SELECT * FROM login WHERE email='$this->email'";
		if(!$result = $db->query($sql))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		
		if($row = $result->fetch_assoc())
		{
			$usuario=stripslashes($row["fk_user"]);
			$email=stripslashes($row["email"]);
			$password=stripslashes($row["password"]);
			$confirmarCorreo=stripslashes($row["confirmMail"]);
			$estadoCuenta=stripslashes($row["estado"]);
			if($estadoCuenta == 0)
			{
				$_SESSION["sesionError"]="Usuario Inabilitado <a href='menuContacto.php?help=inhabilitado'> Obtener Ayuda</a>";
				header("Location: index.php");
				exit();
			}
			
			$contador = 1;
			if(md5($this->password)==$password)
			{
				$_SESSION["estadoCorreo"]=$confirmarCorreo;
				$_SESSION["correoElectronico"]=$email;
				$_SESSION["id_usuario"]=$usuario;
				$_SESSION["contrasena"]=$password;
				
				$sql1="SELECT * FROM usuario u INNER JOIN entidad e ON u.entidad = e.id_entidad WHERE id_usuario='$usuario'";
				if(!$result1 = $db->query($sql1))
				{
					die('error al ejecutar la sentencia '. $db->error.']');
				}
				else;
				
				if($row1 = $result1->fetch_assoc())
				{
					$_SESSION["rolUsuario"]=stripslashes($row1["rolUsuario"]);
					$_SESSION["nacimiento"]=stripslashes($row1["nacimiento"]);
					$_SESSION["nombre"]=stripslashes($row1["nombre"]);
					$_SESSION["apellido"]=stripslashes($row1["apellido"]);
					$_SESSION["tipoDocumento"]=stripslashes($row1["tipoDocumento"]);
					$_SESSION["numeroDocumento"]=stripslashes($row1["numeroDocumento"]);
					$_SESSION["id_entidad"]=stripslashes($row1["entidad"]);
					$_SESSION["telefono"]=stripslashes($row1["telefono"]);
					$_SESSION["genero"]=stripslashes($row1["genero"]);
					$_SESSION["nombreEntidad"]=stripslashes($row1["nombreEntidad"]);
					
					if($_SESSION["rolUsuario"] == "Medico")
					{
						$_SESSION["status"]="1";
						header("Location: index.php");
					}
					else
					{
						if($_SESSION["rolUsuario"] == "Admin")
						{
							$_SESSION["status"] = "3";
							header("Location: index.php");
						}
						else
						{
							$_SESSION["status"] = "2";
							header("Location: index.php");
						}						
					}
				}
				else;
			}
			else
			{
				$_SESSION["sesionError"]="Usuario y/o Contrasena incorrecto";
				header("Location: index");
			}
		}
		if(!isset($contador))
		{
			$_SESSION["sesionError"]="Usuario y/o Contrasena incorrecto";
			header("Location: index");
		}
		else;
	}
	public function cerrarSesion()
	{
		session_start();
		$_SESSION["status"]="0";
		unset($_SESSION["rolUsuario"]);
		unset($_SESSION["nacimiento"]);
		unset($_SESSION["nombre"]);
		unset($_SESSION["apellido"]);
		header("Location: index");
	}
	public function validarCorreoElectronico()
	{
		include('database/conexion.php');
		$sql6="SELECT * FROM login WHERE email='$this->email'";
		if(!$result6 = $db->query($sql6))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
		}
		
		if($result6->fetch_assoc())
		{
			$_SESSION["errorRegistro"] = "Correo electronico no disponible, intenta con otro distinto";
			if(isset($_SESSION["reg"]))
			{
				header($this->password);			
			}
			else
			{
				$_SESSION["next"] = "confirmed";
			}
				
			
		}
		else
		{
			$_SESSION["next"] = "declined";
		}	
	}
	public function actualizarPassword()
	{
		include('database/conexion.php');
		unset($_SESSION["keyLogger"]);
		$sql="UPDATE login SET password='$this->password' WHERE email='$this->email'";
		if($db->query($sql) == true)
		{
			if(isset($_SESSION["rolUsuario"]))
			{
				$_SESSION["resultActualizar"] = "su contraseña ha sido modificada exitosamente";	
				header($this->fk_user);
			}	
			else
			{
				$solicitud = "su contraseña ha sido modificada con exito";
				header("Location: solicitud?peticion=".$solicitud);
			}			
		}
		else
		{			
			if(isset($_SESSION["rolUsuario"]))
			{
				$_SESSION["resultActualizar"] = "Error al actualizar la contraseña";			
				header($this->fk_user);
			}
			else
			{
				$_SESSION["error"] = "Error al actualizar la contraseña";
				header("Location: index.php");
			}
			
		}
	}
	public function actualizarCorreo()
	{
		include('database/conexion.php');
		$sql6="SELECT * FROM login WHERE email='$this->email'";
		if(!$result6 = $db->query($sql6))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
		}
		
		if($result6->fetch_assoc())
		{
			$_SESSION["error"] = "Correo electronico no disponible, intenta con otro distinto";
			header($this->password);
		}
		else
		{
			$sql="UPDATE login SET email = '$this->email' WHERE fk_user = '$this->fk_user'";
			if($db->query($sql) == true)
			{
				$_SESSION["resultActualizar"] = "su correo ha sido modificado exitosamente";
				$_SESSION["correoElectronico"] = "$this->email";
				header($this->password);
							
			}
			else
			{
				$_SESSION["error"] = "Error al actualizar correo electronico";
				header($this->password);
			}
		}
	}
	
	public function confirmarCorreo()
	{
		include('database/conexion.php');
		$sql1="UPDATE login SET confirmMail = '1' WHERE email = '$this->email'";
		if($db->query($sql1) == true)
		{
			$sql2="DELETE FROM codigo WHERE numero = '$this->fk_user'";
		
			if($db->query($sql2) == true)
			{
				$solicitud = "Se ha confirmado el correo electronico";
				header("Location: solicitud?peticion=".$solicitud);
			}
			else
			{
				$solicitud = "Error al confirmar correo electronico";
				header("Location: solicitud?peticion=".$solicitud);
			}
		}
		else
		{
			$_SESSION["status"] = 0;
			$_SESSION["error"] = "Error al confirmar Correo electronico36CM";
			header("Location: index");
		}
	}
	public function desconfirmarCorreo()
	{
		include('database/conexion.php');
		$sql1="UPDATE login SET confirmMail = '0' WHERE fk_user = '$this->fk_user'";
		if($db->query($sql1) == true)
		{
			$_SESSION["estadoCorreo"] = 0;
		}
		else
		{
			$_SESSION["error"] = "Error al confirmar Correo electronico";
			header($this->password);
		}
	}
}



?>