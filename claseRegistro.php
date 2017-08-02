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
		include('database.php');
		session_start();
		$sql = "INSERT INTO registro(descripcion,resultado,tratamiento)
		VALUES ('$this->descripcion','$this->resultado','$this->tratamiento')";
		if($db->query($sql) == true)
		{
			$_SESSION["resultAgregar"] = "se ha agregar un nuevo registro exitosamente";
			header('Location: ');
		}
		else
		{
			$_SESSION["resultAgregar"] = 'error al agregar reporte ['. $db->error.']';
			header('Location: ');
		}		
	}
	
}
?>