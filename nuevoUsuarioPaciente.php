
<?php
include('clasePaciente.php');
$objetoMedico->registrarMedico($_POST["nombre"],$_POST["apellido"],$_POST["mail"],$_POST["fecha"],$_POST["tipo"],$_POST["documento"],$_POST["password"],$_POST["rol"]);

?>
