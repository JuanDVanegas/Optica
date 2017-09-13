<?php
session_start();
if(isset($_GET["type"]))
{
	$type = $_GET["type"];
	if($type == "Medico")
	{
		$style="block";
		$code="";
	}
	else
	{
		if($type == "Paciente")
		{
			$style="none";
			$code=0;
		}
		else
		{
			$style="none";
			$code=0;
			header("Location: nuevoUsuarioRol.php");
		}
	}
} 
else
{
	$style="none";
	$code=0;
	header("Location: nuevoUsuarioRol.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nuevo Usuario - Optical All in One</title>
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
        <br />
            <div class="col-md-7">
                  <a class="btn btn-primary" href="nuevo_usuario.php?type=Medico">Medico</a>
                  <a class="btn btn-primary"href="nuevo_usuario.php?type=Paciente">Paciente</a>
            </div>
        	<div class="col-md-12">
            	<h2>Crear cuenta</h2><h3 class="text-info"><?php echo $type;?></h3>
                <?php 
				if(isset($_SESSION["errorRegistro"]))
				{
					echo '<p class="text-danger">'.$_SESSION["errorRegistro"].'</p>';
					unset($_SESSION["errorRegistro"]);
				}
				if(isset($_SESSION["success"]))
				{
					echo '<p class="text-success">'.$_SESSION["success"].'</p>';
					unset($_SESSION["success"]);
				}
				?>
            </div>
        </div>
        <br />
    	<div class="row">
        	<div class="col-md-6">
                <div class="row">
                <form action="controlador_nuevo_usuario.php?userType=<?php echo md5($type);?>" method="post">
                	<div class="col-md-5">
                    	<p>Nombre</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="text" name="nombre" pattern="[A-Za-z ]+" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Apellido</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="text" name="apellido" pattern="[A-Za-z ]+" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Tipo de documento<p>
                    </div>
                    <div class="col-md-7">
                    	<select class="form-control" name="tipo" id="select">
						  <option value="Tarjeta de identidad" >Tarjeta de identidad</option>
						  <option value="Cedula de ciudadania" selected="selected">Cedula de ciudadania</option>
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
                    	<input class="form-control" type="text" name="documento" pattern="[0-9]+" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Fecha de nacimiento</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="date" name="fecha" required/>
                    </div>
                </div>
                <br />                
            </div>
            <div class="col-md-6">
            	<div class="row">
                	<div class="col-md-5">
                    	<p>Genero</p>
                    </div>
                    <div class="col-md-7">
                    	<select class="form-control" name="genero">
                        	<option value="M" selected="selected">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="O">Otro</option>
                        </select>
                    </div>
                </div>
                <br />
            	<div class="row">
                	<div class="col-md-5">
                    	<p>Correo Electronico</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="email" name="mail" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Contraseña</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="password" name="password" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Confirmar contraseña</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="password" name="confirmar" required/>
                    </div>
                </div>
                <br />
                <div class="row" style="display:<?php echo $style;?>">
                	<div class="col-md-5">
                    	<p>Codigo Entidad Optica</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="text" name="codigo" value="<?php echo $code;?>" required/>
                    </div>
                </div>
                <br />
            </div>
            <br />
        </div>
        <div class="row">
        	<div class="col-md-5"></div>
            <div class="col-md-2">
            	<input type="hidden" value="<?php echo $type;?>" name="rol" />
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