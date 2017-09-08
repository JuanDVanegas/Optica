<?php
session_start();
//Redireccionar si el usuario ya ha iniciado sesion
if (isset($_SESSION["status"])) 
{
    if($_SESSION["status"]!=0)
	{
		header("Location: noticias.php");
	}
}
else;
?>