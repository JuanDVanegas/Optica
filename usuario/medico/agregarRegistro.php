<?php

session_start();
include('../../clases/claseHistorial.php');
include('../../clases/claseRegistro.php');
include('../../clases/claseUsuario.php');


$usuario = new Usuario("","","",$_POST["tipoDocumento"],$_POST["numeroDocumento"],"","","");
$usuario->validarUsuario();

$historial = new Historial($_SESSION["paciente"],$_SESSION["id_usuario"],$_POST["lugar"],$_POST["fecha"]);
$historial->agregarRegistro();

if($_SESSION["next"] == 1)
{
	$registro = new Registro($_POST["descripcion"],$_POST["resultado"],$_POST["tratamiento"]);
	$registro->agregarRegistro();
}
else
{
	$_SESSION["resultRegistro"] = "Error al agregar nuevo registro";
	header('Location: cuentaMedicoHistorial.php');
}

?>