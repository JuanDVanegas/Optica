<?php
session_start();
include('clases/claseEntidad.php');
$nombre = $_POST["nombre"];
$address = $_POST["address"];
$detalles = $_POST["detalles"];
$codigo = md5(rand(10,20));
$agregarEntidad = new Entidad('',$nombre,$address,$codigo,$detalles);
$agregarEntidad->agregarEntidad();
?>