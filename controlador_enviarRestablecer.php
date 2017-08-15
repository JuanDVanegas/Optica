<?php
session_start();
$_SESSION["restablecer"] = 1;
$_SESSION["next"] = "null";
include("database/conexion.php");
include("clases/claseLogin.php");
include("clases/claseCodigo.php");

$correo = $_POST["correo"];
$subject = "Restablecer Contraseña";
$message = "Haz Click en el siguiente enlace para continuar: http://www.optica-all.com/controlador-restablecerpassword.php?trick=$correo&code";
$header = "From: Soporte Optica<soporte@optica-all.com>/r/n";
$header.= "Reply-to: opticaallinone@gmail.com"; 
$numero = rand(1000000000,9999999999999);

$validarCorreo = new Login($correo,"","");
$validarCorreo->validarCorreoElectronico();

if($_SESSION["next"] == "confirmed")
{
	$nuevoCodigo = new Codigo($numero,$subject,'');
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
		$_SESSION["error"] = "No se ha podido generar serial";
		header("Location: restablecerPassword.php");
	}
}
else
{
	$_SESSION["error"] = "Correo electronico invalido";
	header("Location: restablecerPassword.php");
}

?>