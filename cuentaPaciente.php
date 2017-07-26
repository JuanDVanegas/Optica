<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Optica Paciente</title>
</head>
<?php
include('seguridad2.php');
$name=$_SESSION["nombre"];
$apellido=$_SESSION["apellido"];
/*
if ( is_uploaded_file($_FILES['profileUser']['tmp_name']) )
	{
		echo $_FILES['profileUser']['type']."<br/>";
		if ( ($_FILES['profileUser']['type']) == "image/png" || ($_FILES['profileUser']['type']) == "image/jpg" || ($_FILES['profileUser']['type']) == "image/jpeg" )
		{
			
			$id_user="1956";
			echo 'La foto de perfil ha sido actualizada'; 
			$origen = $_FILES['profileUser']['tmp_name'];
			$destino = 'uploads/'.'profile-'.$id_user.'.jpg';
			move_uploaded_file($origen, $destino);	
		}
		else
		{
			echo "Error al actualizar<br/>Solo se aceptan imagenes tipo PNG o JPG";
			
		}
		
						  
	}*/






echo "Bienvenido $name $apellido<br>";
?>

<body>
<a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>