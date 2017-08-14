<?php
session_start();
include("database/conexion.php");	
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
	$sql1="UPDATE login SET confirmMail = '1' WHERE email = '$correo'";
	if($db->query($sql1) == true)
	{
		$sql2="DELETE FROM codigo WHERE numero = '$codigo'";
	
		if($db->query($sql2) == true)
		{
			$_SESSION["status"] = 0;
			$_SESSION["success"] = "Se ha confirmado el correo electronico";
			header("Location: index.php");
		}
		else
		{
			$_SESSION["status"] = 0;
			$_SESSION["error"] = "Error modificar accesso code: confirmar correo 29CM";
			header("Location: index.php");
		}
	}
	else
	{
		$_SESSION["status"] = 0;
    	$_SESSION["error"] = "Error al confirmar Correo electronico36CM";
   		header("Location: index.php");
	}
}
else
{
    $_SESSION["status"] = 0;
    $_SESSION["error"] = "Error al confirmar Correo electronico 43CM";
    header("Location: index.php");
}			
?>
