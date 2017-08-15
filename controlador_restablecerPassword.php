<?php
include('database/conexion.php');
include('clases/claseLogin.php');
include('clases/claseCodigo.php');
session_start();
$_SESSION["restablecer"] = 1;
$correo = md5($_GET["trick"]);
$codigo = $_GET["code"];
$subject = "Restablecer Contraseña";
$validarCorreo = new Login($correo,"","");
$validarCorreo->validarCorreoElectronico();
if($_SESSION["next"] == "confirmed")
{
	$nuevoCodigo = new Codigo($codigo,$subject,"");
	$nuevoCodigo->validarCodigo();
	
	if($_SESSION["next"] == "true")
	{
		$nuevoCodigo->eliminarCodigo();
		echo $_SESSION["next"];
		if($_SESSION["next"] == "deleted")
		{
			$_SESSION["keyLogger"] = md5($correo);
			$_SESSION["key_password"] = "true";
			header('Location: usuarioNuevoPassword.php?keyLogger='.$_SESSION["keyLogger"].'');
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
	$_SESSION["error"] = "Solicitud incorrecta, valores erroneos";
	header("Location: restablecerPassword.php");
}
?>