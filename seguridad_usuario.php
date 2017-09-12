<?php
date_default_timezone_set('America/Bogota');
session_start();
if($_SESSION["status"]==0)
{
	header("Location: index.php");
}
?>