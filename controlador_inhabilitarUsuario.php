<?php
session_start();
include('clases/claseAdministrador.php');
$eliminarUsuario = new Administrador($_POST["id_usuario"]);
$eliminarUsuario->eliminarUsuario();
?>