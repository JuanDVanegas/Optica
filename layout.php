<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Optical All in One</title>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/overwrite.css" type="text/css" />
        <link rel="stylesheet" href="css/site.css" type="text/css" />
        <script type="text/javascript" src="javascript/jquery.js"></script>
        <script type="text/javascript" src="javascript/bootstrap.js"></script> 
    </head> 
    <body> 
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="images/logo.png" class="img-logo"/>
                    <a href="index.php" class="navbar-brand">Optica all in One</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="acercade.html">Acerca de</a></li>
                        <li><a href="#contact">Contacto</a></li>
                        <li><a href="#news">Entidades</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="navbar-right" href="nuevoUsuarioRol.php">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="body-content container"> 
            <?= $content;?> 
        </div>  
    </body> 
</html>