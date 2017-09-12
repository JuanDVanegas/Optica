<?php
date_default_timezone_set('America/Bogota');
if($_SESSION["estadoCorreo"] != 1)
{
	header("Location: usuarioConfirmarCorreo.php");
}
else;

?>