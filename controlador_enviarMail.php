<?php	

include("database/conexion.php");
session_start();
$_SESSION["status"] = 0;
$correo = $_POST["correoElectronico"];
$asunto = "Confirmar Cuenta";
$codigo = rand(1000000, 9999999999);
$tipo = "Confirmar Cuenta";
$body = "Haga click en el enlace para confirmar correo electronico "."https://www.mundos-virtual.com/confirmar_mail?usuario=$correo&encript=$codigo";
$header = "From: Soporte Optica <soporte@optica-all.com>";

if(mail($correo,$asunto,$body,$header))
{	
	$sql2="INSERT INTO codigo (numero,tipo)
	VALUES ('$codigo','$tipo')";
	$db->query($sql2);	
	$resultado = "El mensaje de confirmación ha sido enviado con exito<br>Importante revisar la bandeja de Spam si aún no recibe 
	el correo electronico";	
	header("Location: solicitud?peticion=".$resultado);
}
else
{
	$resultado = "Error al enviar mensaje de confirmación<br>Es posible que su dirección de correo electronico no exista<br>Error con el cliente - servidor";
	header("Location: solicitud?peticion=".$resultado);;
}
?>




