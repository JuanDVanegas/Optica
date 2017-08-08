<?php
include ('../clases/claseUsuario.php');
session_start();
$usuario = new Usuario("?rol",$_POST["nombre"],$_POST["apellido"],$_POST["tipoDocumento"],$_POST["numeroDocumento"],$_POST["telefono"],$_POST["nacimiento"],"?entidad");
$usuario->actualizarDatos();




?>