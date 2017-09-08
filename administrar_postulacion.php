<?php include('seguridad_usuarioAdministrador.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Postulación <?php $_SESSION["nombre"];?> Optica All in One</title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/overwrite.css" type="text/css" />
  <link rel="stylesheet" href="css/site.css" type="text/css" />
	<script type="text/javascript" src="javascript/jquery.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.js"></script>
  </head>
  <body>
    <?php include ('modules/navbar.php'); ?>
    <div class="body-content container">
         <div class="row">
         	<?php include('banner_principal.php');?>
         </div>
        <div class="row">
            <div class="col-md-3">
                <br />
                <?php include('menu_principal.php')?>
            </div>
            <div class="col-md-9"> 
                <!--Nueva Insersion-->
                    <img width="80%" height="80%" src="images/mantenimiento.png"/>
                    <div class="row">
                    	<div class="col-md-offset-3">
                        	<a href="administrar_entidades.php">Regresar</a>
                        </div>
                    </div>
                    
                    <!--Termina Insercion --------- -->
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
