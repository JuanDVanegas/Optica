<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="<?php echo $logo; ?>" class="img-logo"/>
                <a href="<?php echo $inicio;?>" class="navbar-brand">Optica all in One</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo $acercade;?>">Acerca de</a></li>
                    <li><a href="<?php echo $contacto;?>">Contacto</a></li>
                    <li><a href="<?php echo $entidad;?>">Entidades</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php
					session_start();
					if(isset($_SESSION["status"]))
					{
						if($_SESSION["status"]!=0)
						{
							echo"<li><a class=navbar-right href=$cerrar >Cerrar Sesión</a></li>";
						}
						else
						{
							echo"<li><a class=navbar-right href=$usuarioRol >Registrarse</a></li>";					
						}
					}
					else
					{
						echo"<li><a class=navbar-right href=$usuarioRol >Registrarses</a></li>";
					}					
				?>
                </ul>
            </div>
        </div>
    </div>