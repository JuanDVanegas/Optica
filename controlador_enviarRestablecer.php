<?php
session_start();
$_SESSION["restablecer"] = 1;

include("database/conexion.php");
include("clases/claseLogin.php");
$correo = $_POST["correo"];

$objetoCorreo = new Login($correo,"","");
$objetoCorreo->validarCorreoElectronico();
if($_SESSION["next"] == 1)
{
	mail();
}
?>