<?php
session_start();
include ('clases/claseUsuario.php');

$usuario = new Usuario("rol",$_POST["nombre"],$_POST["apellido"],$_POST["tipoDocumento"],$_POST["numeroDocumento"],$_POST["telefono"],$_POST["nacimiento"],"entidad","");

if($_POST["tipoDocumento"] == $_SESSION["tipoDocumento"] && $_POST["numeroDocumento"] == $_SESSION["numeroDocumento"])
{
	$usuario->actualizarDatos();
}
else
{
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
}

?>