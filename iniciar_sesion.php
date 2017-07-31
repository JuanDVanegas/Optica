<?php

include('claseLogin.php');
$objetoLogin = new Login($_POST["mail"],$_POST["contrasena"],0);
$objetoLogin->iniciarSesion();

?>