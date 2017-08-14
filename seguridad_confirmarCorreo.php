<?php
if($_SESSION["estadoCorreo"] != 1)
{
	header("Location: usuarioConfirmarCorreo.php");
}
else;

?>