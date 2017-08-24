<?php
session_start();
include("database/conexion.php");	
include("clases/claseLogin.php");
$correo=$_GET["usuario"];
$codigo=$_GET["encript"];
$confirmMail=1;

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
    $_SESSION["status"] = 0;
    $_SESSION["error"] = "Error al confirmar Correo electronico 43CM";
    header("Location: index.php");
}			
?>
