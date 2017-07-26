<?php
session_start();
//Cuenta Medico
if($_SESSION["status"]!=1)
{
	header("Location: index.php");
}
?>