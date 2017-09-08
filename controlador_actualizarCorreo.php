<?php
session_start();
include("database/conexion.php");
include("clases/claseLogin.php");

$correo = $_POST["correoElectronico"];


$desconfirmar = new Login($correo,'',$_SESSION["id_usuario"]);
$desconfirmar->desconfirmarCorreo();
if($_SESSION["next"] == 1)
{
	$_SESSION["keyUser"] = "true";
	$actualizarCorreo = new Login($correo,"",$_SESSION["id_usuario"]);
	$actualizarCorreo->actualizarCorreo();
}
else
{
	header($from);
}
	

}
?>