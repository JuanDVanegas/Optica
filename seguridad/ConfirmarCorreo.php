<?php
if(isset($_SESSION["estadoCorreo"]))
{
	if($_SESSION["estadoCorreo"] == 0)
	{
		header("Location: ../usuarioConfirmarCorreo.php");
	}
	else;	
}

?>