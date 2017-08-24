<?php
session_start();
include("database/conexion.php");
include("clases/claseLogin.php");
$correo = $_POST["correoElectronico"];

if(isset($_POST["keyWord"]))
{
	$desconfirmar = new Login($correo,'',$_SESSION["id_usuario"]);
	$desconfirmar->desconfirmarCorreo();
	if($_SESSION["next"] == 1)
	{
		$_SESSION["keyUser"] = "true";
		$actualizarCorreo = new Login($correo,"",$_SESSION["id_usuario"]);
		$actualizarCorreo->actualizarCorreo();
	}
	else
	{
		window.history.back(-1);
	}
	
}
else
{
	if($correo == $_SESSION["correoElectronico"])
	{
		header("Location: usuarioConfirmarCorreo.php");
	}
	else
	{
		$actualizarCorreo = new Login($correo,"",$_SESSION["id_usuario"]);
		$actualizarCorreo->actualizarCorreo();
	}
}
?>