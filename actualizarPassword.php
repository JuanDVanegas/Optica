<?php
include ('clases/claseLogin.php');
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
		if($_SESSION["rolUsuario"] == "Medico")
		{
			header("Location: cuentaMedicoPerfilPassword");
		}
		else
		{
			header("Location: cuentaPacientePerfilPassword");
		}
		
	}	
}
else
{
	$_SESSION["resultActualizar"] = "Las contraseñas no coinciden";
	if($_SESSION["rolUsuario"] == "Medico")
	{
		header("Location: cuentaMedicoPerfilPassword");
	}
	else
	{
		header("Location: cuentaPacientePerfilPassword");
	}
}
?>