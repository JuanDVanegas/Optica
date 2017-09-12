<?php
date_default_timezone_set('America/Bogota');
session_start();
//Cuenta Administrador
if($_SESSION["status"]!=3)
{
	header("Location: index.php");
}
else;


?>