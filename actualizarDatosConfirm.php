<?php
include ('claseUsuario.php');
session_start();
$doc = new Usuario("?rol",$_POST["nombre"],$_POST["apellido"],$_POST["tipoDocumento"],$_POST["numeroDocumento"],$_POST["telefono"],$_POST["nacimiento"],"?entidad");
$doc->actualizarDatos();



?>