<?php
class Historial
{
	private $fk_paciente;
	private $fk_medico;
	private $lugar;
	private $fecha;
	
	public function __construct($Fk_paciente,$Fk_medico,$Lugar,$Fecha)
	{
		$this->fk_paciente = $Fk_paciente;
		$this->fk_medico = $Fk_medico;
		$this->lugar = $Lugar;
		$this->fecha = $Fecha;
	}
	
	public function agregarRegistro()
	{
		include('database.php');
		session_start();
		$sql = "INSERT INTO historial(fk_paciente,fk_medico,lugar,fecha)
		VALUES ('$this->fk_paciente','$this->fk_medico','$this->lugar','$this->fecha')";
		if($db->query($sql) == true)
		{
			$_SESSION["next"] = 1;
		}
		else
		{
			$_SESSION["resultAgregar"] = 'error al agregar reporte ['. $db->error.']';
			header('Location: ');
		}		
	}
	
}
?>