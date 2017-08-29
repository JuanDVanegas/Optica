<?php include('seguridad_usuarioAdministrador.php');?>
<?php
include('database/conexion.php');
$sql1="SELECT * FROM login WHERE estado = '0'";
if(!$result1 = $db->query($sql1))
{
	die('error al ejecutar la sentencia ['. $db->error.']');
}
else;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Medico <?php $_SESSION["nombre"];?> Optica All in One</title>
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
         	<?php include('cuentaAdminBanner.php');?>
         </div>
        <div class="row">
            <div class="col-md-3">
                <br />
                <?php include('cuentaAdminMenu.php')?>
            </div>
            <div class="col-md-9"> 
                <!--Nueva Insersion-->      
                    <div class="row">
                    	<div class="col-md-offset-1 col-md-8">
                        	<h4 class="text-warning">No abusar de las prioridades de administrador</h4>
                            <h5 class='text-info'>Listado de usuarios inhabilitados<br /><br />
                            <?php
							$contador = 0;
							echo "<table class='table table-responsive' border=1>";
							while($row1 = $result1->fetch_assoc())
							{
								$id_usuario = stripslashes($row1["fk_user"]);
								
								$sql2="SELECT * FROM usuario WHERE id_usuario='".$id_usuario."'";
								if(!$result2 = $db->query($sql2))
								{
									die('error al ejecutar la sentencia ['. $db->error.']');
								}
								else;
								while($row2 = $result2->fetch_assoc())
								{
									$contador++;
									$nombre = stripslashes($row2["nombre"]);
									$apellido = stripslashes($row2["apellido"]);
									$tipoDocumento = stripslashes($row2["tipoDocumento"]);
									$numeroDocumento = stripslashes($row2["numeroDocumento"]);
									$entidad = stripslashes($row2["entidad"]);
									$rolUsuario = stripslashes($row2["rolUsuario"]);
									echo "
									  <tr>
										<td class='active'>Nombre</td>
										<td class='active'>Numero Documento</td>
										<td class='active'>Rol de Usuario</td>
										<td class='active'></td>
									  </tr>
									  <tr>
										<td>".$nombre."</td>
										<td>".$numeroDocumento."</td>
										<td>".$rolUsuario."</td>
										<td><a href='controlador_estadoUsuario.php?id=$id_usuario&action=habilitar'>Habilitar</a></td>
									  </tr>";
								}
							}
							echo "</table><br/>";
							if($contador == 0)
							{
								echo "sin resultados encontrados";
							}
							else
							{
								if($contador == 1)
								{
									echo "1 resultado encontrado";
								}
								else
								{
									echo $contador." resultados encontrados";
								}
							}
							?>
                            </h5>
                        </div>         
                    </div>
                     <br />
                    <div class="row">
                        <div class="col-md-offset-1 col-md-3">
                            <a  href="cuentaAdminEstadoUsuario.php">Regresar</a>
                        </div> 
                    </div>
                 <!--Termina Insersion-->                 
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>