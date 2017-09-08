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
            	<h1>Rol de Usuario</h1>
            </div>
        </div>
        <br />
    	<div class="row">
            <div class="col-md-6">
                <div class="row">
                	<div class="col-md-5">
                    	<p>Seleccioné un Rol para continuar</p>
                    </div>
                    <div class="col-md-7">
                          <a class="btn btn-primary" href="nuevo_usuario.php?type=Medico">Medico</a>
                          <a class="btn btn-primary"href="nuevo_usuario.php?type=Paciente">Paciente</a>
                    </div>
                </div>
         </div>
        <?php include ('modules/footer.php'); ?>
    </div>
</body>
<footer>
</footer>
</html>