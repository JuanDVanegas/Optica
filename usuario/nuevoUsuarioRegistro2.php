<?php
session_start();
$_SESSION["reg"] = 2;

include('../clases/claseUsuario.php');
include('../clases/claseLogin.php');

if($_POST["password"] == $_POST["confirmar"])
{
	$correo = new Login($_POST["mail"],"",0);
	$correo->validarCorreoElectronico();
	
	$doc = new Usuario("","","",$_POST["tipo"],$_POST["documento"],"","","");
	$doc->validarDocumento();

	if(!isset($_SESSION["errorRegistro"]))
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
	$_SESSION["errorRegistro"]= "<h2>Las contraseñas no coinciden</h2>";
	header('Location: nuevoUsuarioFormulario2.php');
}
?>
