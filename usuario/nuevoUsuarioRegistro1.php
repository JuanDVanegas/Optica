<?php
session_start();
$_SESSION["reg"] = 1;
include('../clases/claseMedico.php');
include('../clases/claseUsuario.php');
include('../clases/claseLogin.php');

if($_POST["password"] == $_POST["confirmar"])
{
	
	$entidad = new Medico($_POST["nombreEntidad"],$_POST["codigo"]);
	$entidad->confirmarEntidad();
	
	$correo = new Login($_POST["mail"],"",0);
	$correo->validarCorreoElectronico();
	
	$doc = new Usuario("","","",$_POST["tipo"],$_POST["documento"],"","","");
	$doc->validarDocumento();

	if(!isset($_SESSION["errorRegistro"]))
	{
		include('nuevoUsuarioMedico.php');
	}
	else
	{
		header('Location: nuevoUsuarioFormulario1.php');
	}
}
else
{
	$_SESSION["errorRegistro"]= "<h2>Las contraseñas no coinciden</h2>";
	header('Location: nuevoUsuarioFormulario1.php');
}
?>
