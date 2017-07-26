<?php
include('database.php');
session_start();

$user=$_SESSION["user_id"];
if ( is_uploaded_file($_FILES['photoProfile']['tmp_name']) )
	{
		if ( ($_FILES['photoProfile']['type']) == "image/png" || ($_FILES['photoProfile']['type']) == "image/jpg" || ($_FILES['photoProfile']['type']) == "image/jpeg" )
		{
			
			
			echo 'La foto de perfil ha sido actualizada'; 
			$origen = $_FILES['photoProfile']['tmp_name'];
			$destino = 'profile/'.'profile-'.$user.'.jpg';
			move_uploaded_file($origen, $destino);			
			$sql2 = "UPDATE usuario SET perfil='$destino' WHERE id_usuario='$user'";
			if ($db->query($sql2) === TRUE)
			{
				$_SESSION["update"]="Se ha actualizado la foto de perfil";
				header("Location: index.php");
				
			}
			else
			{
				$_SESSION["update"]="Error, no se pudo cargar la imagen";
				header("Location: index.php");
				
			}	
		}
		else
		{
			$_SESSION["update"]="Error al actualizar<br/>Solo se aceptan imagenes tipo PNG o JPG";
			header("Location: index.php");			
		}
		
						  
	}
	else{$_SESSION["update"]="Error al subir el archivo";
			header("Location: index.php");	}
	
?>