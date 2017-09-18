<?php
session_start();
include("clases/claseLogin.php");

$from = 'Location: correo_electronico';
$correo = $_POST["correoElectronico"];

if($_SESSION["correoElectronico"] == $correo)
{
	header($from);
}
else
{
	if(!isset($_GET["keyAdmin"]))
	{
		$desconfirmar = new Login($correo,$from,$_SESSION["id_usuario"]);
		$desconfirmar->desconfirmarCorreo();
	}
	
	$actualizarCorreo = new Login($correo,$from,$_SESSION["id_usuario"]);
	$actualizarCorreo->actualizarCorreo();
}



?>