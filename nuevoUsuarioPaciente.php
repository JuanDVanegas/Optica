
<?php
include('clasePaciente.php');
$objetoPaciente->registrar($_POST["nombre"],$_POST["apellido"],$_POST["mail"],$_POST["fecha"],$_POST["tipo"],$_POST["documento"],$_POST["password"],$_POST["rol"]);

?>
