<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Optica All in One</title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/overwrite.css" type="text/css" />
  <link rel="stylesheet" href="css/site.css" type="text/css" />
	<script type="text/javascript" src="javascript/jquery.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.js"></script>
  </head>
  <body>
    <?php include ('modules/navbar.php'); ?>
    <?php include('seguridad/UsuarioMedico.php');
		  include('seguridad/ConfirmarCorreo.php');?>
    <div class="body-content container">
         <div class="row">
         	<?php include('cuentaMedicoBanner.php');?>
         </div>
        <div class="row">
            <div class="col-md-3">
                <br />
                <?php include('cuentaMedicoMenu.php')?>
            </div>
            <div class="col-md-9"> 
                <!--Nueva Insersion-->
                    <?php
					include('database/conexion.php'); 
					$idRegistro = $_GET["idHistorial"];
					$sql1 = "SELECT * FROM registro WHERE id_registro = '$idRegistro'";
					if(!$result1 = $db->query($sql1))
					{
						die('error al ejecutar la sentencia ['. $db->error.']');
					}
					else;
					
					
					if($row1 = $result1->fetch_assoc())
					{
						$id_registro = stripslashes($row1["id_registro"]);
						$descripcion = stripslashes($row1["descripcion"]);
						$resultado = stripslashes($row1["resultados"]);
						$tratamiento = stripslashes($row1["tratamiento"]);
						
						echo "<table class=table table-hover>
							<tr class=active>
								<td>
									<b>Descripcion</b>
								</td>
								<td>
									<b>Resultado</b>
								</td>
								<td>
									<b>Tratamiento</b>
								</td>
							</tr>
							<tr>
								<td>
									$descripcion
								</td>
								<td>
									$resultado
								</td>
								<td>
									$tratamiento
								</td>
							</tr>
							</table>";
					}
					else
					{
						echo "Error al filtrar detalles del registro";
					}
					?>
					<div class="row">
						<div class="col-sm-offset-4 col-sm-3">
							<a href="CuentaMedicoHistorial.php">Regresar</a>
						</div>
					</div>
                    <!-- --------- -->
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
