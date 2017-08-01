<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="css/site.css" type="text/css" />
<title>Actualizar Contraseña</title>
</head>
<?php session_start(); ?>
<body>
<form action="actualizarPasswordConfirm.php" method="post" name="formActualizarPassword">

	<div class="row">
    	<div class="col-sm-offset-3 col-sm-4">
        	<p class="text-danger"><?php if(isset($_SESSION["resultActualizar"])){echo $_SESSION["resultActualizar"];unset($_SESSION["resultActualizar"]);}?></p>
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
        <div class="col-sm-4">
        	<br />
            <a href="actualizarDatosUsuario.php" target="content">Regresar</a>
        </div>
        <div class="col-sm-4">
        	<br />
            <input class="btn btn-default" type="submit" name="confirmar" value="Actualizar" />
        </div>
    </div>
</form>
</body>
</html>