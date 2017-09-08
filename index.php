<?php sleep(1); include('seguridad_sesionActiva.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="images/logo.png" />
<title>Optical All in One</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="css/site.css" type="text/css" />
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/bootstrap.js"></script>
</head>
<body class="fondo">
	<?php include("modules/navbar.php");?>    
    <div class="container body-content white-transparent">
    	<div class="row">
            <div class="col-md-7">
            	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="images/vision20-20.jpg" alt="vision20-20" style="width:100%;">
      </div>

      <div class="item">
        <img src="images/abc-opticas.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="images/ny.jpg" alt="New York" style="width:100%;">
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
            </div>
            <div class="col-md-5">
            	<div class="row">
                	<div class="col-md-12">
                    	<h1>Iniciar Sesion</h1>
                        <?php if(isset($_SESSION["success"])) 
								{
									$success = $_SESSION["success"];
									echo "<h3 class='text-success' >$success</h3>";
									unset($_SESSION["success"]);
								}
							if(isset($_SESSION["error"])) 
								{
									$error = $_SESSION["error"];
									echo "<h3 class='text-danger' >$error</h3>";
									unset($_SESSION["error"]);
								}?>
                    </div>
                </div>
            	<form action="iniciar_sesion.php" method="post" name="iniciar_sesion" target="_parent" id="iniciar_sesion">
                        <div class="row">
                        	<label for="mail"></label>
                            <div class="col-md-4">
                                <p>Correo electronico</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" type="mail" name="mail" id="correo" placeholder="correo@ejemplo.com" required/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                        	<label for="mail"></label>
                            <div class="col-md-4">
                                <p>Contraseña</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" type="password" name="contrasena" id="contrasena"  required/>
                                <?php
								
								if(!isset($_SESSION["status"]))
								{
									$_SESSION["status"] = 0;
								}
								if(isset($_SESSION["sesionError"])) 
								{
									$error = $_SESSION["sesionError"];
									echo "<p class=text-danger >$error</p>";
									unset($_SESSION["sesionError"]);
								}
								?>
                                
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-5">
                                <a href="nuevoUsuarioRol.php">¿No estas registrado?</a><br /><br /><a href="restablecerPassword.php">Olvide mi Contraseña</a>
                            </div>
                            <div class="col-md-4">
                            	<br />
                                <input name="ingresar" type="submit" class="btn btn-primary" id="button" value="Ingresar"/>
                            </div>
                        </div>
            	</form>
            </div>
    	</div>
        <?php include('modules/footer.php'); ?>
    </div>
</body>
</html>