<?php
include('database/conexion.php');
include('clases/claseLogin.php');
include('clases/claseCodigo.php');

$correo = md5($_GET["trick"]);
$codigo = $_GET["code"];
$subject = "Restablecer Contraseña";
$validarCorreo = new Login($correo,"","");
$validarCorreo->validarCorreoElectronico();
if($_SESSION["next"] == "confirmed")
{
	$nuevoCodigo = new Codigo($numero,$subject,"");
	$nuevoCodigo->validarCodigo();
	
	if($_SESSION["next"] == "true")
	{
		$nuevoCodigo->eliminarCodigo();
		if($_SESSION["next"] == "deleted")
		{
			$_SESSION["key_password"] = "true";
			header('Location: usuarioNuevoPassword.php');
		}
		else
		{
			$_SESSION["error"] = "Error en la solicitud";
			header("Location: restablecerPassword.php");
		}		
	}
	else
	{		
		$_SESSION["error"] = "Esta solicitud ha expirado";
		header("Location: restablecerPassword.php");
	}
}
else
{
	$_SESSION["error"] = "Correo electronico invalido";
	header("Location: restablecerPassword.php");
}
?>