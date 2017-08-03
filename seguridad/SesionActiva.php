<?php

//Redireccionar si el usuario ya ha iniciado sesion
if (isset($_SESSION["status"])) 
{
    if($_SESSION["status"]==1)
	{
		header("Location: usuario/medico/cuentaMedicoInicio.php");
	}
	else;
	if($_SESSION["status"]==2)
	{
		header("Location: usuario/medico/cuentaPacienteInicio.php");
	}
	else;
}
else;
?>