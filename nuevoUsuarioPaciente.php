
<?php
include('clasePaciente.php');
include('claseLogin.php');
$objetoPaciente->registrar($_POST["nombre"],$_POST["apellido"],$_POST["mail"],$_POST["fecha"],$_POST["tipo"],$_POST["documento"],$_POST["password"],$_POST["rol"]);

$objetoLogin($this->fk_user,$_POST["mail"],$_POST["password"])->registrar();

?>
