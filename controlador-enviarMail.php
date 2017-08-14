<?php	
include("database/conexion.php");

$correo = $_POST["correoElectronico"];
$asunto = "Confirmar Cuenta";
$codigo = rand(1000000, 9999999999);
$tipo = "Confirmar Cuenta";
$body = "Haga click en el enlace para confirmar correo electronico "."http://www.optica-all.com/controlador-confirmarMail.php?usuario=$correo&encript=$codigo";
$header="Soporte Optica <soporte@optica-all.com>";

if(mail($correo,$asunto,$body,$header))
{
	$sql2="INSERT INTO codigo (numero,tipo)
	VALUES ('$codigo','$tipo')";
	$db->query($sql2);
	$_SESSION["success"] = "Mensaje enviado con exito, importante chequear la bandeja de spam";
	$_SESSION["status"] = 0;
	header("Location: index.php");
}
else
{
	$_SESSION["error"] = "Error al enviar confirmacion";
	header("Location: usuarioConfirmarCorreo.php");
}




