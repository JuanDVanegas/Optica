<?php
	header("Content-Type: text/html; charset=utf-8");
	$db = new mysqli('localhost', 'root', '', 'db_optica');
	$acentos = $db->query("SET NAMES 'utf8'");
	if($db->connect_error > 0){
		die('No se pudo conectar a la Base de Datos [' . $db->connect_error . ']');
	}
?>

