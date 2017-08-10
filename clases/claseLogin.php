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
	
	public function registrar()	
	{
		include('../database/conexion.php');
		$sql5="INSERT INTO login (fk_user,email,password,confirmMail)
		VALUES ('$this->fk_user', '$this->email', '".md5($this->password)."','0')";
		if ($db->query($sql5) === TRUE)
		{
			$_SESSION["success"] = "Se ha registrado el nuevo usuario";
			header("Location: ../index.php");				
		}
		else
		{
			$_SESSION["errorRegistro"] = "Error en el sistema 400, intentelo de nuevo";
			if($_SESSION["reg"]==1)
			{
				header("Location: ../usuario/nuevoUsuarioFormulario1.php");
			}
			else
			{
				header("Location: ../usuario/nuevoUsuarioFormulario2.php");
			}
		}
		
	}
	
	public function iniciarSesion()
	{
		session_start();
		include('../database/conexion.php');
		$sql="SELECT * FROM login WHERE email='$this->email'";
		if(!$result = $db->query($sql))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		
		while($row = $result->fetch_assoc())
		{
			$usuario=stripslashes($row["fk_user"]);
			$email=stripslashes($row["email"]);
			$password=stripslashes($row["password"]);
			$confirmarCorreo=stripslashes($row["confirmMail"]);
			$contador = 1;
			if(md5($this->password)==$password)
			{
				$_SESSION["estadoCorreo"]=$confirmarCorreo;
				$_SESSION["correoElectronico"]=$email;
				$_SESSION["id_usuario"]=$usuario;
				$_SESSION["contrasena"]=$password;
				
				$sql1="SELECT * FROM usuario WHERE id_usuario='$usuario'";
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
					
					$sql2="SELECT * FROM entidad WHERE id_entidad='".$_SESSION["id_entidad"]."'";
					if(!$result2 = $db->query($sql2))
					{
						die('error al ejecutar la sentencia ['. $db->error.']');
					}
					
					if($row2 = $result2->fetch_assoc())
					{
						$_SESSION["nombreEntidad"]=stripslashes($row2["nombre"]);
					}
					else
					{
						echo "Fallo en la entidad";
					}
					
					
					
					if($_SESSION["rolUsuario"]=="Medico")
					{
						$_SESSION["status"]="1";
						header("Location: ../index.php");
					}
					else
					{
						$_SESSION["status"]="2";
						header("Location: ../index.php");
					}
				}
				else;
			}
			else
			{
				$_SESSION["sesionError"]="Usuario y/o Contrasena incorrecto";
				echo $_SESSION["sesionError"];
				header("Location: ../index.php");
			}
		}
		if(!isset($contador))
		{
			$_SESSION["sesionError"]="Usuario y/o Contrasena incorrecto";
			echo $_SESSION["sesionError"];
			header("Location: ../index.php");
		}
		else;
	}
	public function cerrarSesion()
	{
		session_start();
		$_SESSION["status"]="0";
		header("Location: ../index.php");
	}
	public function validarCorreoElectronico()
	{
		include('../database/conexion.php');
		$sql6="SELECT * FROM login WHERE email='$this->email'";
		if(!$result6 = $db->query($sql6))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
		}
		
		if($result6->fetch_assoc())
		{
			$_SESSION["errorRegistro"] = "<b>Correo electronico no disponible, intenta con otro distinto</b>";
			if($_SESSION["reg"]==1)
			{
				header("Location: ../usuario/nuevoUsuarioFormulario1.php");
			}
			else
			{
				header("Location: ../usuario/nuevoUsuarioFormulario2.php");
			}
		}
		else;	
	}
	public function actualizarPassword()
	{
		include('../database/conexion.php');
		$sql="UPDATE login SET password = '$this->password' WHERE email = '$this->email'";
		if($db->query($sql) == true)
		{
			$_SESSION["resultActualizar"] = "su contraseña ha sido modificada exitosamente";
			if($_SESSION["rolUsuario"] == "Medico")
			{
				header("Location: ../usuario/medico/cuentaMedicoPerfilPassword.php");
			}
			else
			{
				header("Location: ../usuario/medico/cuentaPacientePerfilPassword.php");
			}
		}
		else
		{
			$_SESSION["resultActualizar"] = "Error al actualizar la contraseña";
			if($_SESSION["rolUsuario"] == "Medico")
			{
				header("Location: ../usuario/medico/cuentaMedicoPerfilPassword.php");
			}
			else
			{
				header("Location: ../usuario/medico/cuentaPacientePerfilPassword.php");
			}
		}
	}
	public function actualizarCorreo()
	{
		include('../database/conexion.php');
		$sql6="SELECT * FROM login WHERE email='$this->email'";
		if(!$result6 = $db->query($sql6))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
		}
		
		if($result6->fetch_assoc())
		{
			$_SESSION["errorActualizar"] = "Correo electronico no disponible, intenta con otro distinto";
			header("Location: usuarioConfirmarCorreo.php");
		}
		else
		{
			$sql="UPDATE login SET email = '$this->email' WHERE fk_user = '$this->fk_user'";
			if($db->query($sql) == true)
			{
				$_SESSION["resultActualizar"] = "su correo ha sido modificado exitosamente";
				$_SESSION["correoElectronico"] = "$this->email";
				header("Location: usuarioConfirmarCorreo.php");
			}
			else
			{
				$_SESSION["resultActualizar"] = "Error al actualizar correo electronico";
				header("Location: usuarioConfirmarCorreo.php");
			}
		}
		
		
		
		
	}
}



?>