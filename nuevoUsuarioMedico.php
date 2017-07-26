<?php

include('claseMedico.php');
$objetoMedico->registrar($_POST["codigo"],$_POST["palabra"],$_POST["nombre"],$_POST["apellido"],$_POST["mail"],$_POST["fecha"],$_POST["tipo"],$_POST["documento"],$_POST["password"],$_POST["rol"]);

?>