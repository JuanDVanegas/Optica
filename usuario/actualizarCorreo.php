<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restablecer contraseña</title>
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="../css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="../css/site.css" type="text/css" />
<script type="text/javascript" src="../javascript/jquery.js"></script>
<script type="text/javascript" src="../javascript/bootstrap.js"></script>
</head>
<body>
	<?php
	$logo = "../images/logo.png";
	$inicio = "../index.php";
	$acercade = "../modules/menuAcercade.php";
	$contacto = "../modules/menuContacto.php";
	$entidad = "../modules/menuEntidades.php";
	$cerrar = "cerrar_sesion.php";
	$usuarioRol = "nuevoUsuarioRol.php";	
	?>
	<?php include ('../modules/navbar.php'); ?>
    <div class="body-content container">
         <div class="row">
           <div class="col-md-12"> 
             <h1>Actualizar correo electronico</h1>
             
             <p>digite su nuevo correo electronico</p>
           </div>
         </div>
         <div class="row">
            <div class="col-md-6">
            	<form id="form1" name="form1" method="post" action="actualizandoCorreo.php">
                	<br />
                	<div class="row">
                    	<div class="col-md-5">
                        	<p>Correo Electronico</p>
                        </div>
                    	<div class="col-md-7">
          					<input class="form-control" type="text" name="correoElectronico" value="<?php echo $_SESSION["correoElectronico"];?>"/>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                    	<div class="col-md-8"></div>
                    	<div class="col-md-4">
          					<input name="send" type="submit" class="btn btn-primary" id="send" value="Actualizar" />
                        </div>
                    </div>
				</form>
            </div>
         </div>
     </div>
</body>
</html>