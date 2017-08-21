<?php
session_start();
include('clases/claseEntidad.php');
$id_entidad = $_POST["id_entidad"];
$nombre = $_POST["nombre"];
$addres = $_POST["address"];
$detalles = $_POST["detalles"];

$editarEntidad = new Entidad($id_entidad,$nombre,$addres,"",$detalles);
$editarEntidad->editarEntidad();	
?>