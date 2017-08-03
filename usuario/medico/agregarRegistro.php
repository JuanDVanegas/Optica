<?php
include('../../clases/claseHistorial.php');
include('../../clases/claseRegistro.php');
$historial = new Historial($id_usuario,$_SESSION["id_usuario"],$_POST["lugar"],$_POST["fecha"]);
$historial->agregarRegistro();
$registro = new Registro($_POST["descripcion"],$_POST["resultado"],$_POST["tratamiento"]);
$registro->agregarRegistro();
?>