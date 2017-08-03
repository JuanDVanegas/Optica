<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Optical All in One</title>
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="../css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="../css/site.css" type="text/css" />
<script type="text/javascript" src="../javascript/jquery.js"></script>
<script type="text/javascript" src="../javascript/bootstrap.js"></script>
<body>
	<?php
	$logo = "../images/logo.png";
	$inicio = "../index.php";
	$acercade = "menuAcercade.php";
	$contacto = "menuContacto.php";
	$entidad = "menuEntidades.php";
	$cerrar = "../usuario/cerrar_sesion.php";
	$usuarioRol = "../usuario/nuevoUsuarioRol.php";	
	?>
	<?php include ('navbar.php'); ?>
	<div class="body-content container">
		<h2>Acerca de</h2>
		<h3>Introduccion</h3>
		<p>Optical all in one es un sistema que tiene como función principal almacenar y gestionar las historias clinicas de los pacientes con problemas
			visuales y enfermedades referentes a su sentido visual. En el sistema de información se puede compartir los reportes generados por cada entidad
			asociada al proyecto, con el fin de encontrar un metodo más practico de transmitir una estadistica de las diferentes entidades, además, almacenar 
			cada diagnostico con sus respectivos resultados obtenidos, en lo cuales encontramos la formula y tratamientos obtenidos.<br />
		  <br />
		  Disminuir el consumo de estadisticas concurrentes no es factible para un paciente, teniendo en cuenta un resultado obtenido recientemente proveniente
	  de otra entidad optica, la cual genera un nuevo usuario con ninguna información respecto al paciente. </p>
		
		<h3>Misión</h3>
		<p>Facilitar a los clientes un acceso simple de cada paciente con quíen cuenta actualmente proveniente de otra entidad óptica, </p>
		
		<h3>Visión</h3>
		<p>Alcanzar la maxima cantidad de entidades asociadas en nuestro proyecto para promocionarlo, asi todos los usuarios con problemas visuales
			tengan la oportunidad de utilizar los servicios que ofrece un Sistema de información tán practico como esté.</p>
		
		<h3>Grupo de desarrollo</h3>
          <p>Leyder Mendieta Paéz<br/>
          Jesus David Perdomo Mateus <br />
          Katherine Gissell Rodriguez<br />
          Juan David Vanegas Rodriguez</p>
      <?php include ('footer.php'); ?>
	  </div>	
</body>
</html>
