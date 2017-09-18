<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="images/logo.png" class="img-logo"/>
                <a href="index" class="navbar-brand">Optica all in One</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="acerca-de">Acerca de</a></li>
                    <li><a href="contacto">Contacto</a></li>
                    <li><a href="entidades">Entidades</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php
					
					if(isset($_SESSION["status"]))
					{
						if($_SESSION["status"]!=0)
						{
							echo"<li><a class=navbar-right href='cerrar_sesion.php'>Cerrar Sesión</a></li>";
						}
						else
						{
							echo"<li><a class=navbar-right href='nuevoUsuarioRol'>Registrarse</a></li>";					
						}
					}
					else
					{
						echo"<li><a class=navbar-right href='nuevoUsuarioRol'>Registrarse</a></li>";
					}					
				?>
                </ul>
            </div>
        </div>
    </div>