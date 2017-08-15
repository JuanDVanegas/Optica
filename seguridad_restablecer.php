<?php
session_start();

if($_SESSION["key_password"]!= "true")
{
	header("Location: index.php");
}
else;


?>