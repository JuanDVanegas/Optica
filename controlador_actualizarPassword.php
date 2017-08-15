<?php
include ('clases/claseLogin.php');
session_start();

if($_POST["nuevoPass"]==$_POST["confirmarPass"])
{
	$_SESSION["success"] = "La contraseña ha sido modificada";
	$newPass = new Login($_POST["correoElectronico"],md5($_POST["nuevoPass"]),'');
	$newPass->actualizarPassword();
	
}
else
{
	$_SESSION["error"] = "Las contraseñas no coinciden";
	header('Location: usuarioNuevoPassword.php');
}
?>