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
		$sql = "INSERT INTO registro(descripcion,resultados,tratamiento)
		VALUES ('$this->descripcion','$this->resultado','$this->tratamiento')";
		if($db->query($sql) == true)
		{
			$sql1 = "SELECT id_registro FROM registro WHERE descripcion = '$this->descripcion' AND resultados = '$this->resultado'";
			if($result1 = $db->query($sql1))
			{
				echo "ERROR DATABASE";
			}
			if($row1 = $result1->fetch_assoc())
			{
				$_SESSION["id_registro"]=stripslashes($row1["id_registro"]);
			}
			else
			{
				$_SESSION["resultAgregar"] = 'error R33 agregar reporte ['. $db->error.']';
				header('Location: cuentaMedicoHistorial.php');
			}
			
		}
		else
		{
			$_SESSION["resultAgregar"] = 'error R39 agregar reporte ['. $db->error.']';
			header('Location: cuentaMedicoHistorial.php');
		}		
	}
	
}
?>