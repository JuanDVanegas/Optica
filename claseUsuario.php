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
		VALUES ($this->nombre,$this->apellido,$this->tipoDocumento,$this->numeroDocumento,$this->rolUsuario,$this->nacimiento,$this->entidad,$this->telefono)";
		if ($db->query($sql) === TRUE)
		{
			$sql4="SELECT * FROM usuario WHERE tipoDocumento='$this->tipoDocumento' AND numeroDocumento='$this->numeroDocumento'";
			if(!$result4 = $db->query($sql4))
			{
				die('error al ejecutar la sentencia '. $db->error.']');
			}
			
			while($row4 = $result4->fetch_assoc())
			{
				session_start();
				$idUsuario=stripslashes($row4["id_usuario"]);
				$_SESSION["fk_user"] = $idUsuario;
			}
		}
		else
		{
			echo "<h1>Error al registrar nuevo Usuario. Fail Query</h1>";
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
			$_SESSION["documentoExiste"] = "<b>Documento no se encuentra disponible.</b><br>";
			header("Location: nuevoUsuarioFormulario.php");
		}
		else;
	}
	
}

?>