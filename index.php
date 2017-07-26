<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Optical All in One</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/bootstrap.js"></script>
<script type="text/javascript" src="javascript/menu_responsive.js"></script>
</head>
<?php
include('seguridad3.php');
?>
<body class="fondo">
		<div class="nav-bar">
      <div class="container">
        <div class="topnav" id="myTopnav">
          <a href="index.php" style="font-size: 22px; padding: 10px 14px;">Optica all in One</a>
          <a href="#about">Acerca de</a>
          <a href="#contact">Contacto</a>
          <a href="#news">Entidades</a>
          <a class="float-right" href="nuevoUsuarioRol.php">Registrarse</a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()"><img src="images/menu-icon.png" width="15" height="15"></a>
      </div>
      </div>
    </div>
		<?php
		if(isset($_SESSION["sesionError"])) 
		{
			$error = $_SESSION["sesionError"];
			echo $error;
			$_SESSION["sesionError"] = "";
		}
		?>
    <div class="body-content container white-transparent">
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
        <div class="carousel-caption">
          <h3>Vision 20/20</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="images/abc-opticas.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="images/ny.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
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
                    </div>
                </div>
            	<form action="iniciar_sesion.php" method="post" name="iniciar_sesion" target="_parent" id="iniciar_sesion">
                        <div class="row">
                        	<label for="mail"></label>
                            <div class="col-md-4">
                                <p>Correo electronico</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="mail" id="correo" placeholder="correo@ejemplo.com" required/>
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
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-8">
                                <a href="nuevoUsuarioRol.php" class="vinculo-sec">¿No estas registrado?</a><br /><br /><a href="restablecer.php" class="vinculo-sec">Restablecer Contraseña</a>
                            </div>
                            <div class="col-md-4">
                            	<br />
                                <input name="ingresar" type="submit" class="btn btn-primary" id="button" value="Ingresar" />
                            </div>
                        </div>
            	</form>
            </div>
    	</div>
        <footer>
		</footer>
    </div>
</body>

</html>