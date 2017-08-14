<?php
class Historial
{
	private $fk_paciente;
	private $fk_medico;
	private $fk_registro;
	private $lugar;
	private $fecha;
	
	public function __construct($Fk_paciente,$Fk_medico,$Fk_registro,$Lugar,$Fecha)
	{
		$this->fk_paciente = $Fk_paciente;
		$this->fk_medico = $Fk_medico;
		$this->fk_registro = $Fk_registro;
		$this->lugar = $Lugar;
		$this->fecha = $Fecha;
	}
	
	public function agregarHistorial()
	{
		include('database/conexion.php');
		$sql = "INSERT INTO historial(fk_paciente,fk_medico,fk_registro,lugar,fecha)
		VALUES ('$this->fk_paciente','$this->fk_medico','$this->fk_registro','$this->lugar','$this->fecha')";
		if($db->query($sql) == true)
		{
			$_SESSION["resultAgregar"] = "Se ha agregar el nuevo registro al usuario";
			header("Location: cuentaMedicoHistorial.php");
			
		}
		else
		{
			$_SESSION["resultAgregar"] = 'error H32 agregar reporte ['. $db->error.']';
			header('Location: cuentaMedicoHistorial.php');
		}		
	}
	
}
?>