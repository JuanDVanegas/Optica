<?php
session_start();
$_SESSION["restablecer"] = 1;
$_SESSION["next"] = "null";
include("database/conexion.php");
include("clases/claseLogin.php");
include("clases/claseCodigo.php");
$from = "Location: restablecerPassword";
$correo = $_POST["correo"];
$numero = md5(rand(1,99));
$subject = "Restablecer Contraseña";
$message = "Haz Click en el siguiente enlace para continuar: https://www.mundos-virtual.com/restablecer_password?trick=$correo&code=$numero";
$header = "From: Soporte Optica <soporte@optica-all.com>";

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
			$solicitud = "Exito al enviar, verifique su bandeja de entrada y/o spam para continuar";
			header("Location: solicitud?peticion=".$solicitud);
		}
		else
		{
			$_SESSION["error"] = "error al enviar mensaje de correo electronico";
			header($from);
		}
	}
	else
	{		
		$_SESSION["error"] = "No se ha podido generar serial $numero";
		header($from);
	}
}
else
{
	$_SESSION["error"] = "Correo electronico invalido";
	header($from);
}

?>