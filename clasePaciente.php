<?php
class Paciente
{
	public function registrarPaciente($nombre,$apellido,$mail,$fecha,$tipo,$documento,$password,$rol)
	{
		include('database.php');
		
		$sql1 = "SELECT * FROM entidad WHERE codigoAcesso='$codigo'";
		if(!$result = $db->query($sql1))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		while($row = $result->fetch_assoc())
		{
			$nnombre=stripslashes($row["nombre"]);
			$ccodigo=stripslashes($row["codigoAcesso"]);
			$ppalabra=stripslashes($row["palabraClave"]);
			$direccion=stripslashes($row["address"]);
			$entidad=stripslashes($row["id_entidad"]);
			$existeCodigo = 1;
			if($palabra==$ppalabra)
			{
				$sql2="INSERT INTO usuario (nombre,apellido,tipoDocumento,numeroDocumento,rolUsuario,nacimiento,entidad,perfil,telefono)
				VALUES ('$Nombre', '$Apellidos', '$tipoDocumento','$Documento','$rol','$Fecha','$entidad','profile/predeterminado.jpg','Ninguno')";
				if ($db->query($sql2) === TRUE)
				{
					$sql4="SELECT * FROM usuario WHERE tipoDocumento='$tipoDocumento' AND numeroDocumento='$Documento'";
					if(!$result4 = $db->query($sql4))
					{
						die('error al ejecutar la sentencia '. $db->error.']');
					}
					
					while($row4 = $result4->fetch_assoc())
					{
						$idUsuario=stripslashes($row4["id_usuario"]);
						$sql3="INSERT INTO login (fk_user,email,password,confirmMail)
						VALUES ('$idUsuario', '$CorreoElectronico', '".md5($Contrasena)."','0')";
						
						if ($db->query($sql3) === TRUE)
						{
							echo "Se ha registrado el nuevo usuario<br/>
							Informacion de la entidad:<br/>
							Nombre: $nnombre<br/>
							Direccion: $direccion<br/>
							Palabra Clave: $ppalabra";						
						}
						else
						{echo "Error al registrar login. Failed_Login_Status";}
					}
				}
				else
				{echo "Error al registrar nuevo usuario.";}
				
				
			}
			else
			{
				echo "Error al registrar nuevo usuario.<br/>La palabra clave que utiliza la entidad es incorrecta";
			}
		}
		if(!isset($existeCodigo))
		{
			echo "El codigo que utiliza la entidad es incorrecta, ponte en contacto con tu entidad oftalmologica";
		}
	}
}
$objetoPaciente = new Paciente();
?>