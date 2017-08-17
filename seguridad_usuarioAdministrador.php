<?php
session_start();
//Cuenta Administrador
if($_SESSION["status"]!=3)
{
	header("Location: index.php");
}
else;


?>