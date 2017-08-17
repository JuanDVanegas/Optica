<?php
session_start();
$_SESSION["reg"] = 3;
include('clases/claseAdmin.php');
include('clases/claseUsuario.php');
include('clases/claseLogin.php');

if($_POST["password"] == $_POST["confirmar"])
{
	$correo = new Login($_POST["mail"],"",0);
	$correo->validarCorreoElectronico();
	
	$doc = new Usuario("","","",$_POST["tipo"],$_POST["documento"],"","","");
	$doc->validarDocumento();

	if(!isset($_SESSION["errorRegistro"]))
	{
		$nuevoUsuario = new Usuario($_POST["rol"],$_POST["nombre"],$_POST["apellido"],$_POST["tipo"],$_POST["documento"],0,$_POST["fecha"],$_SESSION["entidad"]);
		$nuevoUsuario->registrar();
		
		if($_SESSION["next"]==1)
		{
			$registroFinal = new Login($_POST["mail"],$_POST["password"],$_SESSION["fk_user"]);
			$registroFinal->registrar();
		}
	}
	else
	{
		header('Location: cuentaAdminNuevoUsuario.php');
	}
}
else
{
	$_SESSION["errorRegistro"]= "<h2>Las contraseñas no coinciden</h2>";
	header('Location: cuentaAdminNuevoUsuario.php');
}
?>
