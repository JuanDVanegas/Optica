<?php
session_start();
include('clases/claseEntidad.php');
include('clases/clasePaciente.php');
$id = $_GET["id"];
$action1 = $_GET["action"];

if($action1 == "habilitar")
{
	$action = 1;
}
else
{
	if($action1 == "inhabilitar")
	{
		$action = 0;
	}
}

$cambiarEstado = new Paciente($id);
$cambiarEstado->cambiarEstado($action);

?>