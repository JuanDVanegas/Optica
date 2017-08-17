<?php
session_start();
include ('clases/claseUsuario.php');

$usuario = new Usuario("rol",$_POST["nombre"],$_POST["apellido"],$_POST["tipoDocumento"],$_POST["numeroDocumento"],$_POST["telefono"],$_POST["nacimiento"],"entidad");
$usuario->actualizarDatos();




?>