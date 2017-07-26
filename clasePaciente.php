<?php
class Paciente
{
	public function registrar($nombre,$apellido,$mail,$fecha,$tipo,$documento,$password,$rol)
	{
		include('database.php');
		
		$sql="INSERT INTO usuario (nombre,apellido,tipoDocumento,numeroDocumento,rolUsuario,nacimiento,entidad,perfil,telefono)
		VALUES ('$nombre', '$apellido', '$tipo','$documento','$rol','$fecha','0','profile/predeterminado.jpg','Ninguno')";
		if ($db->query($sql) === TRUE)
		{
			$sql4="SELECT * FROM usuario WHERE tipoDocumento='$tipo' AND numeroDocumento='$documento'";
			if(!$result4 = $db->query($sql4))
			{
				die('error al ejecutar la sentencia '. $db->error.']');
			}
			
			while($row4 = $result4->fetch_assoc())
			{
				$idUsuario=stripslashes($row4["id_usuario"]);
				$sql3="INSERT INTO login (fk_user,email,password,confirmMail)
				VALUES ('$idUsuario', '$mail', '".md5($password)."','0')";
				
				if ($db->query($sql3) === TRUE)
				{
					echo "<h1>Se ha registrado el Usuario</h1>";				
				}
				else
				{
					echo "<h1>Error al registrar login. Fail Query</h1>";
				}
			}
		}
		else
		{
			echo "<h1>Error al registrar nuevo Usuario. Fail Query</h1>";
		}
	}
}
$objetoPaciente = new Paciente();
?>