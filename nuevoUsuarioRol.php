<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Optical All in One</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="javascript/menu_responsive.js"></script>
</head>
<body>
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
                    	<p>Seleccionar rol para continuar</p>
                    </div>
                    <div class="col-md-7">
                    <form method="post" action="soporteRol.php">
                    	<select class="text-box" name="rol" id="rol" >
                          <option value="Medico" >Medico</option>
                          <option value="Paciente" selected="selected">Paciente</option>
                      </select>
                    </div>
                </div> 
                <br />
                <div class="row">
        	<div class="col-md-8"></div>
            <div class="col-md-4">
            	<input class="btn btn-primary" type="submit" name="registro" id="button2" value="Continuar"/>
                </form>
            </div>
            <div class="col-md-5"></div>
        </div>
            </div>
            <br />
        </div>
    </div>
</body>
<footer>
</footer>
</html>