<?php include('seguridad_usuarioMedico.php');
	include('seguridad_confirmarCorreo.php');?>
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
					
					$sql2 = "SELECT * FROM historial WHERE fk_medico='".$_SESSION["id_usuario"]."' AND fk_registro='$idRegistro'";
					if(!$result2 = $db->query($sql2))
					{
						die('error al ejecutar la sentencia ['. $db->error.']');
					}
					else;
					if($row2 = $result2->fetch_assoc())
					{
						$id_historial = stripslashes($row2["id_historial"]);
						$fk_paciente = stripslashes($row2["fk_paciente"]);
						$lugar = stripslashes($row2["lugar"]);
						$fecha = stripslashes($row2["fecha"]);
					}
					else;
					
					
					$sql3 = "SELECT * FROM usuario WHERE id_usuario='$fk_paciente'";
					if(!$result3 = $db->query($sql3))
					{
						die('error al ejecutar la sentencia ['. $db->error.']');
					}
					else;
					if($row3 = $result3->fetch_assoc())
					{
						$nombreMedico = stripslashes($row3["nombre"]);
						$apellidoMedico = stripslashes($row3["apellido"]);
						$paciente = $nombreMedico.' '.$apellidoMedico;
					}
					else;						
					
					
					
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
					}
					else;
					?>
                    <div class="row">
                    	<div class="col-md-offset-1 col-md-8">
                        	<h4 class="text-warning">Detalles del registro</h4><br />
                            <table class="table table-bordered">
                              <tr>
                                <td class="active"><b>Fecha</b></td>
                                <td><?php echo $fecha;?></td>
                              </tr>
                              <tr>
                                <td class="active"><b>Lugar</b></td>
                                <td><?php echo $lugar;?></td>
                              </tr>
                              <tr>
                                <td class="active"><b>Paciente</b></td>
                                <td><?php echo $paciente;?>;</td>
                              </tr>
                              <tr>
                                <td class="active"><b>Descripción</b></td>
                                <td><?php echo $descripcion;?></td>
                              </tr>
                              <tr>
                                <td class="active"><b>Resultado</b></td>
                                <td><?php echo $resultado;?></td>
                              </tr>
                              <tr>
                                <td class="active"><b>Tratamiento</b></td>
                                <td><?php echo $tratamiento;?></td>
                              </tr>
                            </table>
                        </div>         
              		</div>
					<div class="row">
						<div class="col-sm-offset-4 col-sm-3">
							<a href="cuentaMedicoHistorial.php">Regresar</a>
						</div>
					</div>
                    <!-- --------- -->
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
