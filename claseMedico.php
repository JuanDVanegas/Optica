<?php
include('claseUsuario.php');
class Medico extends Usuario
{
	public $nombreEntidad;
	public $codigo;
	public function __construct($NombreEntidad,$Codigo)
	{
		$this->nombreEntidad = $NombreEntidad;
		$this->codigo = $Codigo;
	}
	
	public function confirmarEntidad()
	{
		
	}
	
	public function generarReporte()
	{
		
	}
}
$objetoMedico = new Medico();
?>