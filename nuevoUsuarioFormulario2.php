<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Optical All in One</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="images/logo.png" />
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
        	<div class="col-md-12">
            	<h1>Nuevo Usuario Paciente</h1>
                <?php 
				if(isset($_SESSION["errorRegistro"]))
				{
					$errorRegistro = $_SESSION["errorRegistro"];
					echo "<h3>$errorRegistro</h3>";
				}
				?>
            </div>
        </div>
        <br />
    	<div class="row">
        	<div class="col-md-6">
                <div class="row">
                <form action="nuevoUsuarioRegistro2.php" method="post">
                	<div class="col-md-5">
                    	<p>Nombre</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="text" name="nombre" id="textfield4" pattern="[A-Za-z]+" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Apellido</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="text" name="apellido" id="textfield5" pattern="[A-Za-z]+" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Tipo de documento<p>
                    </div>
                    <div class="col-md-7">
                      <select class="form-control" name="tipo" id="select">
						  <option value="Null"  selected="selected">Seleccionar</option>
						  <option value="Tarjeta de identidad">Tarjeta de identidad</option>
						  <option value="Cedula de ciudadania" >Cedula de ciudadania</option>
						  <option value="Cedula extrajera">Cedula extrajera</option>
						  <option value="Pasaporte">Pasaporte</option>
						  <option value="Libreta Militar">Libreta Militar</option>
					  </select>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Numero de documento</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="text" name="documento" id="textfield8" pattern="[0-9]+" required/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="row">
                	<div class="col-md-5">
                    	<p>Fecha de nacimiento</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="date" name="fecha" id="textfield7" />
                    </div>
                </div>
                <br />
            	<div class="row">
                	<div class="col-md-5">
                    	<p>Correo Electronico</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="mail" name="mail" id="textfield6" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Contraseña</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="password" name="password" id="textfield9" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Confirmar contraseña</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="password" name="confirmar" id="textfield10" required/>
                    </div>
                </div>
                <br />
            </div>
            <br />
        </div>
        <div class="row">
        	<div class="col-md-5"></div>
            <div class="col-md-2">
            	<input type="hidden" value="Paciente" name="rol" />
            	<input class="btn btn-primary" type="submit" name="registro" id="button2" value="Registrar" />
            </div>
            <div class="col-md-5"></div>
        </div>
        <?php include ('modules/footer.php'); ?>
    </div></form>
    <?php 
        if(isset($_SESSION["errorRegistro"])){unset($_SESSION["errorRegistro"]);}
	   if(isset($_SESSION["reg"])){unset($_SESSION["reg"]);}
	   if(isset($_SESSION["next"])){unset($_SESSION["next"]);}
    ?>
</body>
<footer>
</footer>
</html>