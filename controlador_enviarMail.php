<?php	

include("database/conexion.php");
session_start();
$_SESSION["status"] = 0;
$correo = $_POST["correoElectronico"];
$asunto = "Confirmar Cuenta";
$codigo = rand(1000000, 9999999999);
$tipo = "Confirmar Cuenta";
$body = "Haga click en el enlace para confirmar correo electronico "."http://www.optica-all.com/controlador_confirmarMail.php?usuario=$correo&encript=$codigo";
$header = "From: Soporte Optica <soporte@optica-all.com>";

if(mail($correo,$asunto,$body,$header))
{	
	$sql2="INSERT INTO codigo (numero,tipo)
	VALUES ('$codigo','$tipo')";
	$db->query($sql2);	
	$_SESSION["success"] = "Mensaje enviado con exito, importante chequear la bandeja de spam";	
	header("Location: index.php");
}
else
{
	$_SESSION["error"] = "Error al enviar confirmacion";
	header("Location: index.php");
}
?>




