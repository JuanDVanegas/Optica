<?php
date_default_timezone_set('America/Bogota');
session_start();

if($_SESSION["key_password"]!= "true")
{
	header("Location: index.php");
}
else;


?>