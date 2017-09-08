<?php
session_start();
include ('clases/claseUsuario.php');
$from = "Location: datos_personales.php";
$usuario = new Usuario('',$_POST["nombre"],$_POST["apellido"],'','',$_POST["telefono"],'','',$from);
$usuario->actualizarDatos();
?>