<?php
include('claseUsuario.php');
$objetoUsuario -> iniciarSesion($_POST["mail"],$_POST["contrasena"]);
?>