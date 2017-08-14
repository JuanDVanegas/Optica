<?php
session_start();
include("database/conexion.php");
include("clases/claseLogin.php");
$correo = $_POST["correoElectronico"];
if($correo == $_SESSION["correoElectronico"])
{
	header("Location: usuarioConfirmarCorreo.php");
}
else
{
	$actualizarCorreo = new Login($correo,"",$_SESSION["id_usuario"]);
	$actualizarCorreo->actualizarCorreo();
}
?>