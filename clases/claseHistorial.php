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
	
	public function agregarRegistro()
	{
		include('../../database/conexion.php');
		$sql = "INSERT INTO historial(fk_paciente,fk_medico,fk_registro,lugar,fecha)
		VALUES ('$this->fk_paciente','$this->fk_medico','$this->fk_registro','$this->lugar','$this->fecha')";
		if($db->query($sql) == true)
		{
			$_SESSION["resultRegistro"] = "se ha agregar un nuevo registro exitosamente";
			header('Location: cuentaMedicoHistorial.php');
		}
		else
		{
			$_SESSION["resultAgregar"] = 'error al agregar reporte ['. $db->error.']';
			header('Location: ');
		}		
	}
	
}
?>