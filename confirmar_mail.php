<?php
session_start();
include("database/conexion.php");	
include("clases/claseLogin.php");
$correo=$_GET["usuario"];
$codigo=$_GET["encript"];
$confirmMail=1;
$_SESSION["status"] = 0;
echo $correo;
echo "<br/>";
echo $codigo;
$sql="SELECT * FROM login WHERE email = '$correo'";
$sql3="SELECT * FROM codigo WHERE numero = '$codigo'";

if($db->query($sql) == true)
{
	$confirmarMail = new Login($correo,'',$codigo);
	$confirmarMail->confirmarCorreo();
}
else
{
   	$solicitud = "Error al confirmar correo electronico";
	header("Location: solicitud?peticion=".$solicitud);
}			
?>
