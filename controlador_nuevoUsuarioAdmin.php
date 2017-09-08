<?php
session_start();
$from = 'Location: administrar_nuevo_usuario.php';

include('clases/claseAdministrador.php');
include('clases/claseUsuario.php');
include('clases/claseLogin.php');

if($_POST["password"] == $_POST["confirmar"])
{
	$correo = new Login($_POST["mail"],$from,0);
	$correo->validarCorreoElectronico();
	
	$doc = new Usuario("","","",$_POST["tipo"],$_POST["documento"],"","","",$from);
	$doc->validarDocumento();

	if(!isset($_SESSION["errorRegistro"]))
	{
		$nuevoUsuario = new Usuario($_POST["rol"],$_POST["nombre"],$_POST["apellido"],$_POST["tipo"],$_POST["documento"],0,$_POST["fecha"],$_POST["entidad"],$_POST["genero"]);
		$nuevoUsuario->registrar($from);
		
		if($_SESSION["next"]==1)
		{
			$registroFinal = new Login($_POST["mail"],$_POST["password"],$_SESSION["fk_user"]);
			$registroFinal->registrar($from);
		}
	}
	else
	{
		header($from);
	}
}
else
{
	$_SESSION["errorRegistro"]= "Las contraseñas no coinciden";
	header($from);
}
?>
