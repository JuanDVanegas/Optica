<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="css/site.css" type="text/css" />
<title>Perfil</title>
</head>
<body>
<?php 
session_start();
include('database.php');
$sql1 = "SELECT * FROM historial WHERE fk_medico='".$_SESSION["id_usuario"]."'";
if(!$result1 = $db->query($sql1))
{
	die('error al ejecutar la sentencia ['. $db->error.']');
}
else;

echo "<table class=table table-hover>
    	<tr class=active>
        	<td>
            	<b>Paciente</b>
            </td>
            <td>
            	<b>Lugar</b>
            </td>
            <td>
            	<b>Fecha</b>
            </td>
            <td>
            	<b>Detalles</b>
            </td>
        </tr>";
$contador = 0;	
while($row1 = $result1->fetch_assoc())
{
	$contador++;
	$id_historial = stripslashes($row1["id_historial"]);
	$fk_paciente = stripslashes($row1["fk_paciente"]);
	$fk_medico = stripslashes($row1["fk_medico"]);
	$lugar = stripslashes($row1["lugar"]);
	$fecha = stripslashes($row1["fecha"]);
	
	$sql2 = "SELECT * FROM usuario WHERE id_usuario = 'fk_paciente'";
	if(!$result2 = $db->query($sql2))
	{
		die('error al ejecutar la sentencia ['. $db->error.']');
	}
	else;
	while($row2 = $result2->fetch_assoc())
	{
		$nombre = stripslashes($row2["nombre"]);
		$apellido = stripslashes($row2["apellido"]);
		$paciente = $nombre.' '.$apellido;
		
		echo "<tr>
        	<td>
            	$paciente
            </td>
            <td>
            	$lugar
            </td>
            <td>
            	$fecha
            </td>
            <td>
            	<a href=historialMedicoDetalle.php?idHistorial=$id_historial >Ver</a>
            </td>
        </tr>";
	}
	echo "</table>";
}
?>
<div class="row">
    <div class="col-sm-offset-1  col-sm-3">
        <?php if($contador == 0)
		{
			echo "No se encontraron resultados";
		}
		else
		{
			if($contador > 1)
			{
				echo "Se han encontrado $contador resultados";
			}
			else
			{
				echo "Se ha encontrado $contador resultado";
			}
		}
		?>
    </div>
    <div class="col-sm-offset-4 col-sm-3">
        <a href="nuevoRegistro.php">Agregar Nuevo</a>
    </div>
 </div>

</body>
</html>
