<?php
if(isset($_POST["rol"]))
{
	$rol = $_POST["rol"];
	if($rol == "Medico")
	{
		header("Location: nuevoUsuarioFormulario1.php");
	}
	else;
	if($rol == "Paciente")
	{
		header("Location: nuevoUsuarioFormulario2.php");
	}
	else;
}
else
{
	header("Location: index.php");
}
?>