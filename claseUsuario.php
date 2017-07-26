<?php
class Usuario
{
	public function iniciarSesion($correo,$pass)
	{
		include('database.php');
		$sql="SELECT * FROM login WHERE email='$correo'";
		if(!$result = $db->query($sql))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		
		while($row = $result->fetch_assoc())
		{
			$usuario=stripslashes($row["fk_user"]);
			$email=stripslashes($row["email"]);
			$password=stripslashes($row["password"]);
			$contador = 1;
			if(md5($pass)==$password)
			{
				
				$_SESSION["user_id"]=$usuario;
				
				$sql1="SELECT * FROM usuario WHERE id_usuario='$usuario'";
				if(!$result1 = $db->query($sql1))
				{
					die('error al ejecutar la sentencia '. $db->error.']');
				}
				
				while($row1 = $result1->fetch_assoc())
				{
					$rolUsuario=stripslashes($row1["rolUsuario"]);
					$nombre=stripslashes($row1["nombre"]);
					$apellido=stripslashes($row1["apellido"]);
					$numeroDocumento=stripslashes($row1["numeroDocumento"]);
					$perfil=stripslashes($row1["perfil"]);
					$entidad=stripslashes($row1["entidad"]);
					
					
					$_SESSION["nombre"]=$nombre;
					$_SESSION["apellido"]=$apellido;
					$_SESSION["numeroDocumento"]=$numeroDocumento;
					$_SESSION["perfil"]=$perfil;
					$_SESSION["entidad"]=$entidad;
					
					
					if($rolUsuario=="Medico")
					{
						$_SESSION["status"]="1";
						header("Location: cuentaMedico.php");
					}
					else
					{
						$_SESSION["status"]="2";
						header("Location: cuentaPaciente.php");
					}
				}
			}
			else
			{
				$_SESSION["sesionError"]="<b>Usuario y/o Contrasena incorrecto</b>";
				header("Location: index.php");
			}
		}
		if(!isset($contador))
		{
			$_SESSION["sesionError"]="<b>Usuario y/o Contrasena incorrecto</b>";
			header("Location: index.php");
		}
		else;
		if(isset($usuario))
		{
			$this->idUsuario=$usuario;
		}		
	}
	
	public function cerrarSesion()
	{
		$_SESSION["status"]="0";
		header ("Location: index.php");
		unset($this->idUsuario);	
	}
	
	public function chequearUsuario($CorreoElectronico,$tipoDocumento,$Documento)
	{
		include('database.php');
		$sql5="SELECT * FROM usuario WHERE tipoDocumento='$tipoDocumento' AND numeroDocumento='$Documento'";
		if(!$result5 = $db->query($sql5))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		
		while($row5 = $result5->fetch_assoc())
		{
			$_SESSION["documentoExiste"] = "<b>Documento no se encuentra disponible.</b><br>";
			header("Location: nuevoUsuarioFormulario.php");
		}
		
		$sql6="SELECT * FROM login WHERE email='$CorreoElectronico'";
				if(!$result6 = $db->query($sql6))
				{
					die('error al ejecutar la sentencia '. $db->error.']');
				}
				
				while($row6 = $result6->fetch_assoc())
				{
					$_SESSION["mailExiste"] = "<b>Correo electronico no disponible, intenta con otro distinto</b>";
					header("Location: nuevoUsuarioFormulario.php");
				}	
					
		if($tipoDocumento == "Null")
		{
			$_SESSION["nonSelected"] = "<b>Seleccione un tipo de documento</b>";
			header("Location: nuevoUsuarioFormulario.php");
		}
		else;
	}
	
}
$objetoUsuario = new Usuario();
?>