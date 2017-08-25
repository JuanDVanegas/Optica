<?php
session_start();
$_SESSION["restablecer"] = 1;
$_SESSION["next"] = "null";
include("database/conexion.php");
include("clases/claseLogin.php");
include("clases/claseCodigo.php");

$correo = $_POST["correo"];
$numero = md5(rand(1,99));
$subject = "Restablecer Contraseña";
$message = "Haz Click en el siguiente enlace para continuar: http://www.optica-all.com/controlador_restablecerPassword.php?trick=$correo&code=$numero";
$header = "From: Soporte Optica <opticaallinone@gmail.com>";

$validarCorreo = new Login($correo,"","");
$validarCorreo->validarCorreoElectronico();

if($_SESSION["next"] == "confirmed")
{
	$nuevoCodigo = new Codigo($numero,$subject,$correo);
	$nuevoCodigo->nuevoCodigo();
	if($_SESSION["next"] == "inserted")
	{
		if(mail($correo,$subject,$message,$header))
		{
			$_SESSION["success"] = "Exito al enviar, verifique su bandeja de entrada y/o spam para continuar";
			header("Location: restablecerPassword.php");
		}
		else
		{
			$_SESSION["error"] = "error al enviar mensaje de correo electronico";
			header("Location: restablecerPassword.php");
		}
	}
	else
	{		
		$_SESSION["error"] = "No se ha podido generar serial $numero";
		header("Location: restablecerPassword.php");
	}
}
else
{
	$_SESSION["error"] = "Correo electronico invalido";
	header("Location: restablecerPassword.php");
}

?>