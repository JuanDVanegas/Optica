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
                    <li><a href="modules/menuAcercade.php">Acerca de</a></li>
                    <li><a href="modules/menuContacto.php">Contacto</a></li>
                    <li><a href="modules/menuEntidades.php">Entidades</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php
					session_start();
					if(isset($_SESSION["status"]))
					{
						if($_SESSION["status"]!=0)
						{
							echo"<li><a class=navbar-right href='cerrar_sesion.php'>Cerrar Sesión</a></li>";
						}
						else
						{
							echo"<li><a class=navbar-right href='nuevoUsuarioRol.php'>Registrarse</a></li>";					
						}
					}
					else
					{
						echo"<li><a class=navbar-right href='nuevoUsuarioRol.php'>Registrarses</a></li>";
					}					
				?>
                </ul>
            </div>
        </div>
    </div>