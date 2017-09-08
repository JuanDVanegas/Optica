<?php include('seguridad_usuario.php');
	include('seguridad_confirmarCorreo.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Optica All in One</title>
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
         	<?php include('configuracion_banner.php');?>
         </div>
        <div class="row">
            <div class="col-md-3">
                <br />
                <?php include("configuracion_menu.php");?>
            </div>
            <div class="col-md-9"> 
                <!--Nueva Insersion-->
                    <form action="actualizarPassword.php" method="post" name="formActualizarPassword">
                    <div class="row">
                        <div class="col-sm-offset-3 col-sm-4">
                            <?php 
							if(isset($_SESSION["resultActualizar"]))
							{
								if($_SESSION["resultActualizar"] == "su contraseña ha sido modificada exitosamente")
								{
									$result = "text-success";
								}
								else
								{
									$result = "text-danger";
								}
								echo "<p class='".$result."'>".$_SESSION["resultActualizar"]."</p>";
								unset($_SESSION["resultActualizar"]);
							}
							?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p>Contraseña actual</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="actualPass"  required/>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-3">
                            <p>Nueva Contraseña</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="nuevoPass"  required/>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-3">
                            <p>Confirmar Contraseña</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="confirmarPass" required/>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-offset-3 col-sm-4">
                            <br />
                            <input class="btn btn-default" type="submit" name="confirmar" value="Actualizar Contraseña" />
                        </div>
                    </div>
                </form>
                    <!-- --------- -->
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
