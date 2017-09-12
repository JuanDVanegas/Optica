<?php
date_default_timezone_set('America/Bogota');
session_start();
if($_SESSION["status"]!=2)
{
	header("Location: index.php");
}
else;

?>