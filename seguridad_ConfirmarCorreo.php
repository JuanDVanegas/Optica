<?php
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