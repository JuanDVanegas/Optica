<?php
session_start();
if($_SESSION["status"]!=2)
{
	header("Location: index.php");
}
else;
if(isset($_SESSION["estadoCorreo"]))
{
	if($_SESSION["estadoCorreo"] != 1)
	{
		header("Location: usuarioConfirmarCorreo.php");
	}
	else;	
}
else;

?>