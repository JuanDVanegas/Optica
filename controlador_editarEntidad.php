<?php
session_start();
include('clases/claseEntidad.php');
$from = 'Location: entidad?pagina='.$_GET["page"];
$id_entidad = $_POST["id_entidad"];
$nombre = $_POST["nombre"];
$addres = $_POST["address"];
$detalles = $_POST["detalles"];

$editarEntidad = new Entidad($id_entidad,$nombre,$addres,"",$detalles);
$editarEntidad->editarEntidad($from);	
?>