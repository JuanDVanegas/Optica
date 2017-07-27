<?php
class Login
{
	private $fk_user;
	private $email;
	private $password;
	public function __construct($Fk_user,$Email,$Password)
	{
		$this->fk_user = $Fk_user;
		$this->email = $Email;
		$this->password = $Password;
	}
	public function registrar()
	{
		$sql5="INSERT INTO login (fk_user,email,password,confirmMail)
		VALUES ('$this->fk_user', '$this->email', '".md5($this->password)."','0')";
		if ($db->query($sql5) === TRUE)
		{
			echo "<h1>Se ha registrado el Usuario</h1>";				
		}
		else
		{
			echo "<h1>Error al registrar login. Fail Query</h1>";
		}
		
	}
	public function iniciarSesion()
	{
		include('database.php');
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
			$contador = 1;
			if(md5($this->password)==$password)
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
	public function validarCorreoElectronico()
	{
		$sql6="SELECT * FROM login WHERE email='$this->email'";
		if(!$result6 = $db->query($sql6))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		
		if($result6->fetch_assoc())
		{
			$_SESSION["mailExiste"] = "<b>Correo electronico no disponible, intenta con otro distinto</b>";
			header("Location: nuevoUsuarioFormulario.php");
		}	
	}
}
$objetoLogin = new Login();


?>