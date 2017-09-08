<?php include('seguridad_usuarioAdministrador.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Medico <?php $_SESSION["nombre"];?> Optica All in One</title>
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
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Habilitar y/o Inhabilitar Usuario</h1>
                            <br />
                            <h4 class="text-info">Digite el correo electronico del usuario</h4>
                            <h4 class="text-danger"><?php if(isset($_SESSION["error"])){echo $_SESSION["error"];unset($_SESSION["error"]);}?></h4>
                            <h4 class="text-success"><?php if(isset($_SESSION["success"])){echo $_SESSION["success"];unset($_SESSION["success"]);}?></h4>
                        </div>
                    </div>
                    <br />
                     <form action="estadoUsuario.php" method="post" name="estadoUsuario">
                    <div class="row">
                        <div class="col-md-3">
                            <p>Correo Electronico</p>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="email" name="mail" id="textfield6" required/>
                        </div>                       
                    </div>
                     <br />
                    <div class="row">
                    	<div class="col-md-offset-1 col-md-3">
                        	<a href="usuarioInhabilitado.php" class="text-danger">Listado inhabilitados</a>
                        </div>
                        <div class="col-md-offset-1 col-md-3">
                            <input class="btn btn-primary" type="submit" value="Buscar Usuario"/></form>
                        </div> 
                    </div>
                 <!--Termina Insersion-->                 
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>