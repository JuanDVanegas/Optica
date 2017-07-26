<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Optica Medico</title>
</head>

<?php

include('seguridad.php');
include('database.php');
$user=$_SESSION["user_id"];
$name=$_SESSION["nombre"];
$apellido=$_SESSION["apellido"];


$sql = "SELECT * FROM usuario WHERE id_usuario='$user'";
if(!$result = $db->query($sql))
{
	die('error al ejecutar la sentencia '. $db->error.']');
}
while($row = $result->fetch_assoc())
{	
	$photoProfile=stripslashes($row["perfil"]);
}

echo "Bienvenido $name<br/>";
if(isset($_SESSION["update"]))
{
	$update = $_SESSION["update"];
	echo "<b>$update</b>";
	$_SESSION["update"] ="";
}
?>

<body>

<p><img src="<?php echo $photoProfile; ?>" height="200" width="200" alt="foto de perfil" onclick="editarPhoto()"/></p>
<form action="actualizarFoto.php" method="post" enctype="multipart/form-data" name="actualizar_Foto" >
    <input type="file" name="photoProfile" value="Seleccionar Foto"/>
    <input type="submit" name="Submit" value="Actualizar Perfil" />
</form>
<p><br />
  <a href="cerrar_sesion.php">Cerrar sesión</a></p>
</body>
</html>