<?php

session_start();
include('../../clases/claseHistorial.php');
include('../../clases/claseRegistro.php');
include('../../clases/claseUsuario.php');


$usuario = new Usuario("","","",$_POST["tipoDocumento"],$_POST["numeroDocumento"],"","","");
$usuario->validarUsuario();
if(isset($_SESSION["paciente"]))
{
	$registro = new Registro($_POST["descripcion"],$_POST["resultado"],$_POST["tratamiento"]);
	$registro->agregarRegistro();
	
	
	if(isset($_SESSION["id_registro"]))
	{
		$historial = new Historial($_SESSION["paciente"],$_SESSION["id_usuario"],$_SESSION["id_registro"],$_POST["lugar"],$_POST["fecha"]);
		$historial->agregarHistorial();
	}
	else
	{
		$_SESSION["resultAgregar"] = "Error R23 al agregar nuevo registro";
		header('Location: cuentaMedicoHistorial.php');
	}
}


?>