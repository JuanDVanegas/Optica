<?php
class Registro
{
	private $descripcion;
	private $resultado;
	private $tratamiento;
	
	public function __construct($Descripcion,$Resultado,$Tratamiento)
	{
		$this->descripcion = $Descripcion;
		$this->resultado = $Resultado;
		$this->tratamiento = $Tratamiento;
	}
	
	public function agregarRegistro()
	{
		include('../../database/conexion.php');
		$sql = "INSERT INTO registro(descripcion,resultado,tratamiento)
		VALUES ('$this->descripcion','$this->resultado','$this->tratamiento')";
		if($db->query($sql) == true)
		{
			$sql1 = "SELECT id_registro FROM registro WHERE descripcion = '$this->descripcion' AND resultado = '$this->resultado'";
			if(!$result1 = $db->query($sql1))
			{
				echo "ERROR DATABASE";
			}
			if(
		}
		else
		{
			$_SESSION["resultRegistro"] = 'error al agregar reporte ['. $db->error.']';
			header('Location: cuentaMedicoHistorial.php');
		}		
	}
	
}
?>