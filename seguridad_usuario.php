<?php
session_start();
if($_SESSION["status"]!=1 || $_SESSION["status"]!=2)
{
	header("Location: index.php");
}
?>