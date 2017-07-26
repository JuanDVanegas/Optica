<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Optical All in One</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="javascript/menu_responsive.js"></script>
</head>
<script>
function agregarMedico()
{
	
 	var usuario = document.getElementById("rol").value;
	
	if(usuario == "Paciente")
	{
		document.getElementById("nuevoUsuario").action = "nuevoUsuarioPaciente.php";
	}
	else;
	
	
	if(usuario == "Medico")
	{
		document.getElementById("nuevoUsuario").action = "entidad_informacion.php";
	}
	else;
	
	
	
}
</script>
<body>
<div class="nav-bar">
      <div class="container">
        <div class="topnav" id="myTopnav">
          <a href="index.php" style="font-size: 22px; padding: 10px 14px;">Optica all in One</a>
          <a href="#about">Acerca de</a>
          <a href="#contact">Contacto</a>
          <a href="#news">Entidades</a>
          <a class="float-right" href="nuevoUsuarioFormulario.php">Registrarse</a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()"><img src="images/menu-icon.png" width="15" height="15"></a>
      </div>
      </div>
    </div>
	<?php 
    session_start();
    if(isset($_SESSION["existDoc"]))
    {
        $ad = $_SESSION["existDoc"];
        echo $ad;	
    }
    if(isset($_SESSION["existMail"]))
    {
        $ad = $_SESSION["existMail"];
        echo $ad;
    }
    if(isset($_SESSION["nonSelected"]))
    {
        $ad = $_SESSION["nonSelected"];
        echo $ad;
    }
    ?>
    <div class="body-content container">
    	<div class="row">
        	<div class="col-md-12">
            	<h1>Nuevo Usuario</h1>
            </div>
        </div>
        <br />
    	<div class="row">
        	<div class="col-md-6">
                <div class="row">
                	<div class="col-md-5">
                    	<p>Nombre</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="text" name="Nombre" id="textfield4" pattern="[A-Za-z]+" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Apellido</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="text" name="Apellidos" id="textfield5" pattern="[A-Za-z]+" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Tipo de documento<p>
                    </div>
                    <div class="col-md-7">
                    	<select class="form-control"<?php 
			if(isset($_SESSION["nonSelected"]))
			{echo"style='border-color:#FF0000;'";}
			?> name="tipoDocumento" id="select">
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
                    	<input class="form-control" type="text" name="Documento" id="textfield8" pattern="[0-9]+" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Fecha de nacimiento</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="date" name="Fecha" id="textfield7" />
                    </div>
                </div>
                <br />
            </div>
            <div class="col-md-6">
            	<div class="row">
                	<div class="col-md-5">
                    	<p>Correo Electronico</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="text" name="CorreoElectronico" id="textfield6" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Contraseña</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="password" name="Contrasena" id="textfield9" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Confirmar contraseña</p>
                    </div>
                    <div class="col-md-7">
                    	<input class="form-control" type="password" name="Confirmar" id="textfield10" required/>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="col-md-5">
                    	<p>Registrarme como</p>
                    </div>
                    <div class="col-md-7">
                    	<select class="form-control" name="rol" id="rol" >
              <option value="Medico" >Medico</option>
              <option value="Paciente" selected="selected">Paciente</option>
          </select>
                    </div>
                </div> 
            </div>
            <br />
        </div>
        <div class="row">
        	<div class="col-md-5"></div>
            <div class="col-md-2">
            	<input class="btn btn-primary" type="submit" name="registro" id="button2" value="Registrar" onclick="agregarMedico()" />
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
    <?php 
        unset($_SESSION["existDoc"]);
        unset($ad);
        unset($_SESSION["existMail"]);
        unset($_SESSION["nonSelected"]);
    ?>
</body>
<footer>
</footer>
</html>