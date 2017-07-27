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
	
	public function validarDocumento($CorreoElectronico,$tipoDocumento,$Documento)
	{
		include('database.php');
		$sql5="SELECT * FROM usuario WHERE tipoDocumento='$tipoDocumento' AND numeroDocumento='$Documento'";
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
$objetoUsuario = new Usuario();
?>