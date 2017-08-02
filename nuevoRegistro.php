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
        	<p class="text-danger"><?php if(isset($_SESSION["resultAgregar"])){echo $_SESSION["resultAgregar"];unset($_SESSION["resultAgregar"]);}?></p>
        </div>
    </div>
	<div class="row">
    	<div class="col-sm-3">
        	<p>Lugar</p>
        </div>
        <div class="col-sm-9">
        	<input class="form-control" type="text" name="nombre"/>
        </div>
    </div>
    <br />
    <div class="row">
    	<div class="col-sm-3">
        	<p>Fecha</p>
        </div>
        <div class="col-sm-9">
        	<input class="date" type="text" name="apellido"/>
        </div>
    </div>
    <br />
     <div class="row">
        <div class="col-sm-3">
            <p>Tipo de documento paciente</p>
        </div>
        <div class="col-sm-9">
        	<select class="form-control" name="tipoDocumento" id="select">
						  <option value="Tarjeta de identidad" selected="selected">Tarjeta de identidad</option>
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
            <p>Documento paciente</p>
        </div>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="numeroDocumento" pattern="+[0-9]"/>
        </div>
    </div>
    <br />
    <div class="row">
    	<div class="col-sm-3">
        	<p>Descripcion</p>
        </div>
        <div class="col-sm-9">
        	<input class="form-control" type="text" name="nacimiento"/>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-sm-3">
            <p>Resultado</p>
        </div>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="correo" />
        </div>
    </div>
    <br />
     <div class="row">
        <div class="col-sm-3">
            <p>Tratamiento</p>
        </div>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="telefono" pattern="+[0-9]" />
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-sm-3">
            <a href="historialMedico.php" target="content">Regresar</a>
        </div>
        <div class="col-sm-4">
        	<br />
            <input class="btn btn-primary" type="submit" name="add" value="Agregar Registro" />
        </div>
    </div>
</form>
</body>
</html>