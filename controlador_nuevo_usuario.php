<?php
session_start();
$from = 'Location: nuevo_usuario?type=';
$userType = $_GET["userType"];
$_SESSION["reg"] = 1;
include('clases/claseUsuario.php');
include('clases/claseMedico.php');
include('clases/claseLogin.php');
if($userType == md5('Medico'))
{
	$from.= 'Medico'; 
	$confirmarEntidad = new Medico('',$_POST["codigo"]);
	$confirmarEntidad->confirmarEntidad($from);
}
else
{
	if($userType == md5('Paciente'))
	{
		$from.= 'Paciente'; 
		$_SESSION["entidad"] = 0;
	}
	else
	{
		header('Location: nuevoUsuarioRol.php?errorlog=true');		
	}
	
}
if($_POST["password"] == $_POST["confirmar"])
{
	$correo = new Login($_POST["mail"],$from,0);
	$correo->validarCorreoElectronico();
	
	$doc = new Usuario("","","",$_POST["tipo"],$_POST["documento"],"","","",$from);
	$doc->validarDocumento();

	if(!isset($_SESSION["errorRegistro"]))
	{
		$nuevoUsuario = new Usuario($_POST["rol"],$_POST["nombre"],$_POST["apellido"],$_POST["tipo"],$_POST["documento"],0,$_POST["fecha"],$_SESSION["entidad"],$_POST["genero"]);
		$nuevoUsuario->registrar($from);
		
		if($_SESSION["next"]==1)
		{
			$registroFinal = new Login($_POST["mail"],$_POST["password"],$_SESSION["fk_user"]);
			$registroFinal->registrar($from);
		}
	}
}
else
{
	$_SESSION["errorRegistro"]= "Las contraseñas no coinciden";
	header($from);
}
?>
