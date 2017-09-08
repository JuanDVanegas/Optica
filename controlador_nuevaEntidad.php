<?php
session_start();
$from = 'Location: entidad.php';
include('clases/claseEntidad.php');
$nombre = $_POST["nombre"];
$address = $_POST["address"];
$detalles = $_POST["detalles"];
$codigo = md5(md5(rand(1,20)).md5($nombre.$address));

$agregarEntidad = new Entidad('',$nombre,$address,$codigo,$detalles);
$agregarEntidad->agregarEntidad($from);
?>