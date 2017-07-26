<?php
session_start();
//Cuenta Paciente
if($_SESSION["status"]!=2)
{
	header("Location: index.php");
}
?>