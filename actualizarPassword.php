<?php
include ('clases/claseLogin.php');
session_start();
$from = "Location: contrasena.php";
if($_POST["nuevoPass"]==$_POST["confirmarPass"])
{
	if($_SESSION["contrasena"] == md5($_POST["actualPass"]))
	{
		$_SESSION["contrasena"] = md5($_POST["nuevoPass"]);
		$newPass = new Login($_SESSION["correoElectronico"],md5($_POST["nuevoPass"]),$from);
		$newPass->actualizarPassword();
	}
	else
	{
		$_SESSION["resultActualizar"] = "Contraseña actual incorrecta";
		header($from);
	}	
}
else
{
	$_SESSION["resultActualizar"] = "Las contraseñas no coinciden";
	header($from);
}
?>