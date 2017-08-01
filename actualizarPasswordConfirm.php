<?php
include ('claseLogin.php');
session_start();

if($_POST["nuevoPass"]==$_POST["confirmarPass"])
{
	if($_SESSION["contrasena"] == md5($_POST["actualPass"]))
	{
		$_SESSION["contrasena"] = md5($_POST["nuevoPass"]);
		$newPass = new Login($_SESSION["correoElectronico"],md5($_POST["nuevoPass"]),$_SESSION["id_usuario"]);
		$newPass->actualizarPassword();
	}
	else
	{
		$_SESSION["resultActualizar"] = "Contraseña actual incorrecta";
		header("Location: actualizarPassword.php");
	}	
}
else
{
	$_SESSION["resultActualizar"] = "Las contraseñas no coinciden";
	header("Location: actualizarPassword.php");
}
?>