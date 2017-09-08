<?php include('seguridad_usuarioAdministrador.php');?>
<?php
include('database/conexion.php');
$sql1="SELECT * FROM login INNER JOIN usuario ON login.fk_user = usuario.id_usuario INNER JOIN entidad ON usuario.entidad = entidad.id_entidad WHERE estado = '0'";
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
         	<?php include('banner_principal.php');?>
         </div>
        <div class="row">
            <div class="col-md-3">
                <br />
                <?php include('menu_principal.php')?>
            </div>
            <div class="col-md-9"> 
                <!--Nueva Insersion-->      
                    <div class="row">
                    	<div class="col-md-10">
                        	
                            <h3 class='text-info'>Listado de usuarios inhabilitados</h3><br /><br />
                            <?php
							$contador = 0;
							echo "<table class='table table-responsive'>
								<tr>
									<td class='active'>Nombre</td>
									<td class='active'>Numero Documento</td>
									<td class='active'>Entidad</td>
									<td class='active'>Rol de Usuario</td>
									<td class='active'></td>
								  </tr>";
							while($row1 = $result1->fetch_assoc())
							{
								$contador++;
								$id_usuario = stripslashes($row1["id_usuario"]);
								$nombre = stripslashes($row1["nombre"]);
								$apellido = stripslashes($row1["apellido"]);
								$tipoDocumento = stripslashes($row1["tipoDocumento"]);
								$numeroDocumento = stripslashes($row1["numeroDocumento"]);
								$entidad = stripslashes($row1["entidad"]);
								$nombreEntidad = stripslashes($row1["nombreEntidad"]);
								$rolUsuario = stripslashes($row1["rolUsuario"]);
								echo "
								  
								  <tr>
									<td>".$nombre." ".$apellido."</td>
									<td>".$numeroDocumento."</td>
									<td>".$nombreEntidad."</td>
									<td>".$rolUsuario."</td>
									<td><a href='controlador_estadoUsuario.php?id=$id_usuario&action=habilitar'>Habilitar</a></td>
								  </tr>";
								
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
                            
                        </div>         
                    </div>
                     <br />
                    <div class="row">
                        <div class="col-md-offset-1 col-md-3">
                            <a  href="administrar_estado.php">Regresar</a>
                        </div> 
                    </div>
                 <!--Termina Insersion-->                 
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>