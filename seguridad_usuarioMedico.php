<?php
date_default_timezone_set('America/Bogota');
session_start();
//Cuenta Medico
if($_SESSION["status"]!=1)
{
	header("Location: index.php");
}
else;


?>