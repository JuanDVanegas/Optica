<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="css/site.css" type="text/css" />
<title>Perfil</title>
<?php session_start(); ?>
</head>
<body>
<form action="actualizarDatosConfirm.php" method="post" name="formActualizarDatos">
	<div class="row">
    	<div class="col-sm-offset-3 col-sm-4">
        	<p class="text-danger"><?php if(isset($_SESSION["resultActualizar"])){echo $_SESSION["resultActualizar"];unset($_SESSION["resultActualizar"]);}?></p>
        </div>
    </div>
	<div class="row">
    	<div class="col-sm-3">
        	<p>Nombre</p>
        </div>
        <div class="col-sm-9">
        	<input class="form-control" type="text" name="nombre" value="<?php echo $_SESSION["nombre"];?>" />
        </div>
    </div>
    <br />
    <div class="row">
    	<div class="col-sm-3">
        	<p>Apellido</p>
        </div>
        <div class="col-sm-9">
        	<input class="form-control" type="text" name="apellido" value="<?php echo $_SESSION["apellido"];?>" />
        </div>
    </div>
    <br />
     <div class="row">
        <div class="col-sm-3">
            <p>Tipo de documento</p>
        </div>
        <div class="col-sm-9">
        	<select class="form-control" name="tipoDocumento" id="select">
						  <option value="<?php echo $_SESSION["tipoDocumento"];?>"  selected="selected"><?php echo $_SESSION["tipoDocumento"];?></option>
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
        <div class="col-sm-3">
            <p>Documento</p>
        </div>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="numeroDocumento" pattern="+[0-9]" value="<?php echo $_SESSION["numeroDocumento"];?>" />
        </div>
    </div>
    <br />
    <div class="row">
    	<div class="col-sm-3">
        	<p>Fecha de nacimiento</p>
        </div>
        <div class="col-sm-9">
        	<input class="form-control" type="date" name="nacimiento" value="<?php echo $_SESSION["nacimiento"];?>" />
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-sm-3">
            <p>Correo electronico</p>
        </div>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="correo" value="<?php echo $_SESSION["correoElectronico"];?>"/>
        </div>
    </div>
    <br />
     <div class="row">
        <div class="col-sm-3">
            <p>Telefono</p>
        </div>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="telefono" pattern="+[0-9]" value="<?php echo $_SESSION["telefono"];?>"/>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-sm-3">
            <a href="actualizarPassword.php" target="content">Cambiar Contraseña</a>
        </div>
        <div class="col-sm-4">
        	<br />
            <input class="btn btn-default" type="submit" name="correo" value="Actualizar" />
        </div>
    </div>
</form>
</body>
</html>