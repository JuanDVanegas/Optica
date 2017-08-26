<?php
session_start();
include ('clases/claseUsuario.php');

$usuario = new Usuario("rol",$_POST["nombre"],$_POST["apellido"],$_POST["tipoDocumento"],$_POST["numeroDocumento"],$_POST["telefono"],$_POST["nacimiento"],"entidad","");

$usuario->validarDocumento();
if(!isset($_SESSION["error"]))
{
	$usuario->actualizarDatos();
}
else
{
	if($_SESSION["rolUsuario"] == "Medico")
	{
		header("Location: cuentaMedicoPerfil.php");
	}
	else
	{
		if($_SESSION["rolUsuario"] == "Admin")
		{
			header("Location: cuentaAdminPerfil.php");
		}
		else
		{
			header("Location: cuentaPacientePerfil.php");
		}				
	}
}
?>