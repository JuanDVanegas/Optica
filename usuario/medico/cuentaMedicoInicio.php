<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Optica All in One</title>
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../css/overwrite.css" type="text/css" />
  <link rel="stylesheet" href="../../css/site.css" type="text/css" />
	<script type="text/javascript" src="../../javascript/jquery.js"></script>
	<script type="text/javascript" src="../../javascript/bootstrap.js"></script>
  </head>
  <body>
  	<?php
	$logo = "../../images/logo.png";
	$inicio = "../../index.php";
	$acercade = "../../modules/menuAcercade.php";
	$contacto = "../../modules/menuContacto.php";
	$entidad = "../../modules/menuEntidades.php";	
	$cerrar = "../cerrar_sesion.php";
	$usuarioRol = "../nuevoUsuarioRol.php";
	?>
    <?php include ('../../modules/navbar.php'); ?>
    <?php include('../../seguridad/UsuarioMedico.php'); ?>
    <div class="body-content container">
         <div class="row">
         	<?php include('cuentaMedicoBanner.php');?>
         </div>
        <div class="row">
            <div class="col-md-3">
                <br />
                <?php include('cuentaMedicoMenu.php')?>
            </div>
            <div class="col-md-9"> 
                <h1>Noticias</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Sistema registro actualizado</h2>
                        <p>Se ha modificado algunos parametros al momento de registrar nuevos usuarios 
                        satisfacción para un sistema más compatible con los usuarios.</p>
                    </div>
                    <div class="col-sm-6">
                        <img src="../../images/news1.jpg" width="40%" height="40%"/>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Servicios optimizados</h2>
                        <p>Actualización de reportes opticos, estadisticas de avance y 
                        precisión en descargas de informes completos.</p>
                    </div>
                    <div class="col-sm-6">
                        <img src="../../images/news2.jpg" width="40%" height="40%"/>
                    </div>
                </div>
            </div>
        </div><?php include ('../../modules/footer.php'); ?>
     </div>     
  </body>
</html>
