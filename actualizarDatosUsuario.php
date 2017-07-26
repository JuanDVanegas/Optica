<?php
session_start();
include('database.php');
$user=$_SESSION["user_id"];
$name=$_SESSION["name"];
$lastname=$_SESSION["lastname"];
$phone=$_SESSION["phone"];
$date=$_SESSION["date"];
$entity=$_SESSION["entity"];

$sql2 = "UPDATE usuario SET nombre='$name',apellido='$lastname',telefono='phone',nacimiento='date',entidad='$entity' WHERE id_usuario='$user'";
			if ($db->query($sql2) === TRUE)
			{
				$_SESSION["update"]="Se ha actualizado la foto de perfil";
				header("Location: index.php");
				
			}
?>