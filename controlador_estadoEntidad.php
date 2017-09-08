<?php
session_start();
include('clases/claseEntidad.php');
include('clases/claseMedico.php');
$action1 = $_POST["cambiar"];
$from = "Location: entidad.php";
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

$id_entidad = $_POST["entidad"];

$_SESSION["success"] = "null";

$entidad = new Entidad($id_entidad,"","","","");
$entidad->cambiarEstadoEntidad($action);
if($_SESSION["next"] == "Entidad")
{
	$MedicoVinculado = new Medico($from,$id_entidad);
	$MedicoVinculado->cambiarEstadoMedicoVinculado($action);
}
else
{
	$_SESSION["error"] = "Error al ".$action1." &Chi;";
	header($from);
}
?>