<?php
include('claseUsuario.php');

class Paciente extends Usuario
{
	public function validarUsuario()
	{
		include('database/conexion.php');
		$sql5="SELECT * FROM usuario WHERE tipoDocumento='$this->getTipoDocumento()' AND numeroDocumento='$this->getNumeroDocumento()'";
		if(!$result5 = $db->query($sql5))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		else;
		
		if($row5 = $result5->fetch_assoc())
		{
		}
		else
		{
			echo "sin resultados";
		}
	}
	
}
?>