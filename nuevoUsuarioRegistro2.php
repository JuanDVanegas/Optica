<?php
session_start();

include('claseUsuario.php');

if($_POST["password"] == $_POST["confirmar"])
{
	$objetoUsuario -> chequearUsuario($_POST["mail"],$_POST["tipo"],$_POST["documento"]);

	if(!isset($_SESSION["mailExiste"]) && !isset($_SESSION["documentoExiste"]) && !isset($_SESSION["nonSelected"]))
	{
		include('nuevoUsuarioPaciente.php');
	}
	else
	{
		header('Location: nuevoUsuarioFormulario2.php');
	}
}
else
{
	$_SESSION["passError"]= "<h2>Las contraseñas no coinciden</h2>";
	header('Location: nuevoUsuarioFormulario2.php');
}
?>
