<?php
session_start();
include('clases/claseEntidad.php');
$id_entidad = $_GET["entidad"];

$eliminarEntidad = new Entidad($id_entidad,"","","","");
$eliminarEntidad->eliminarEntidad();
?>