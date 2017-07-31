<?php
session_start();

//Redireccionar si el usuario ya ha iniciado sesion
if (isset($_SESSION["status"])) 
{
    if($_SESSION["status"]==1)
	{
		header("Location: cuentaMedico.php");
	}
	else;
	if($_SESSION["status"]==2)
	{
		header("Location: cuentaPaciente.php");
	}
	else;
}
else;
?>