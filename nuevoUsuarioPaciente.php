
<?php
$usuarioPaciente = new Usuario($_POST["rol"],$_POST["nombre"],$_POST["apellido"],$_POST["tipo"],$_POST["documento"],0,$_POST["fecha"],0);
$usuarioPaciente->registrar();

if($_SESSION["next"]==1)
{
	$registroFinal = new Login($_POST["mail"],$_POST["password"],$_SESSION["fk_user"]);
	$registroFinal->registrar();
}


?>