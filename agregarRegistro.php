<?php

session_start();
include('clases/claseHistorial.php');
include('clases/claseRegistro.php');
include('clases/claseUsuario.php');

$from = "Location: nuevo_registro.php?target_user=".$_GET["target_user"];

$usuario = new Usuario("","","",$_POST["tipoDocumento"],$_POST["numeroDocumento"],"","","","");
$usuario->validarUsuario();
if(isset($_SESSION["paciente"]) && $_SESSION["keyRol"] == "Paciente")
{
	$registro = new Registro($_POST["descripcion"],$_POST["resultado"],$_POST["tratamiento"]);
	$registro->agregarRegistro();
	
	
	if(isset($_SESSION["id_registro"]))
	{
		$_SESSION["keyRol"] = $from;
		$historial = new Historial($_SESSION["paciente"],$_SESSION["id_usuario"],$_SESSION["id_registro"],$_POST["lugar"],$_POST["fecha"]);
		$historial->agregarHistorial();		
	}
	else
	{
		$_SESSION["error"] = "Error agregar registro";
		header($from);
	}
}
else
{
	$_SESSION["error"] = "el usuario no esta disponible";
	header($from);
}


?>