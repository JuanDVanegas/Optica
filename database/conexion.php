<?php
	$db = new mysqli('localhost', 'root', '', 'db_optica');
	//$db = new mysqli('136.179.15.239', 'opticaal_usuario', 'IS;QF=^-]Z)t', 'opticaal_optica');
	//$db = new mysqli('136.179.15.239', 'mundosvi_user154', 'hEQOfJi4;K2T', 'mundosvi_optica');
	$acentos = $db->query("SET NAMES 'utf8'");
	if($db->connect_error > 0){
		die('No se pudo conectar a la Base de Datos [' . $db->connect_error . ']');
	}
?>

