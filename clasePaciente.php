<?php
include('claseUsuario.php');
class Paciente extends Usuario
{
	public function __construct($RolUsuario,$Nombre,$Apellido,$TipoDocumento,$NumeroDocumento,$Telefono,$Nacimiento,$Entidad)
	{
		
	}
	public function registrar($nombre,$apellido,$fecha,$tipo,$documento,$rol)
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