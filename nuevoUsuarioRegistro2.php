<?php
session_start();

include('claseUsuario.php');
include('clasePaciente.php');

$objetoUsuario -> chequearUsuario($CorreoElectronico,$tipoDocumento,$Documento);

if(!isset($_SESSION["mailExiste"]) && !isset($_SESSION["documentoExiste"]) && !isset($$_SESSION["nonSelected"]))
{
	include('nuevoUsuarioMedico.php');
}
else
{
	header('Location: nuevoUsuarioFormulario2.php');
}

?>
