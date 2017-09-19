<?php include('seguridad_usuario.php');
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
         	<?php include('banner_principal.php');?>
         </div>
        <div class="row">
            <div class="col-md-3">
                <br />
                <?php include('menu_principal.php');?>
            </div>
            <div class="col-md-9"> 
                <!--Nueva Insersion-->
                    <?php
					include('database/conexion.php'); 
					$id_registro = $_GET["id_registro"];
					$target_to = $_GET["target_user"];
					$target_from = $_GET["from"];
					$user_key = $_GET["key"];
$sql2 = "SELECT * FROM historial INNER JOIN registro ON historial.fk_registro = registro.id_registro WHERE ".$target_from."='".$_SESSION["id_usuario"]."' AND ".$target_to."='".$user_key."' AND fk_registro='$id_registro'";
					if(!$result2 = $db->query($sql2))
					{
						die('error al ejecutar la sentencia ['. $db->error.']');
					}
					else;
					if($row2 = $result2->fetch_assoc())
					{
						$id_historial = stripslashes($row2["id_historial"]);
						$fk_medico = stripslashes($row2["fk_medico"]);
						$fk_paciente = stripslashes($row2["fk_paciente"]);
						$lugar = stripslashes($row2["lugar"]);
						$fecha = stripslashes($row2["fecha"]);
						$id_registro = stripslashes($row2["id_registro"]);
						$descripcion = stripslashes($row2["descripcion"]);
						$resultado = stripslashes($row2["resultados"]);
						$tratamiento = stripslashes($row2["tratamiento"]);
					}
					else;
					
					
					$sql3 = "SELECT * FROM usuario INNER JOIN entidad ON usuario.entidad=entidad.id_entidad WHERE id_usuario='$fk_medico'";
					if(!$result3 = $db->query($sql3))
					{
						die('error al ejecutar la sentencia ['. $db->error.']');
					}
					else;
					if($row3 = $result3->fetch_assoc())
					{
						$id_medico = stripslashes($row3["id_usuario"]);
						$nombreEntidad = stripslashes($row3["nombreEntidad"]);
						$documentoMedico = stripslashes($row3["numeroDocumento"]);
						$nombreMedico = stripslashes($row3["nombre"]);
						$apellidoMedico = stripslashes($row3["apellido"]);
						$medico = $nombreMedico.' '.$apellidoMedico;
					}
					else;
					$sql4 = "SELECT * FROM usuario WHERE id_usuario='$fk_paciente'";
					if(!$result4 = $db->query($sql4))
					{
						die('error al ejecutar la sentencia ['. $db->error.']');
					}
					else;
					if($row4 = $result4->fetch_assoc())
					{
						$id_paciente = stripslashes($row4["id_usuario"]);
						$documentoPaciente = stripslashes($row4["numeroDocumento"]);
						$nombrePaciente = stripslashes($row4["nombre"]);
						$apellidoPaciente = stripslashes($row4["apellido"]);
						$paciente = $nombrePaciente.' '.$apellidoPaciente;
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
                                <td class="active"><b>Nombre Completo Medico</b></td>
                                <td><?php echo $medico;?></td>
                              </tr>
                              <tr>
                                <td class="active"><b>Documento del Medico</b></td>
                                <td><?php echo $documentoMedico;?></td>
                              </tr>
                              <tr>
                                <td class="active"><b>Entidad Optica u Oftalmologíca</b></td>
                                <td><?php echo $nombreEntidad;?></td>
                              </tr>
                              <tr>
                                <td class="active"><b>Nombre Completo Paciente</b></td>
                                <td><?php echo $paciente;?></td>
                              </tr>
                              <tr>
                                <td class="active"><b>Documento del Paciente</b></td>
                                <td><?php echo $documentoPaciente;?></td>
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
                    <div class="col-sm-offset-2 col-sm-3">
                        	<p class='text-info'>Generar Reporte</p><a href="generar_reporte?id_registro=<?php echo $id_registro;?>&id_medico=<?php echo $id_medico;?>&action=view"><img title="Ver Online PDF"src="images/pdf_generar.png" width="20%" height="20%"/></a><a href="controlador_generarReporte.php?id_registro=<?php echo $id_registro;?>&id_medico=<?php echo $id_medico;?>&action=download"><img title="Descargar PDF" src="images/pdf_down.png" width="20%" height="20%"/></a>
                        </div>
						<div class="col-sm-offset-4 col-sm-3">
							<a href="historial?target_user=<?php echo $_GET["redirect"];?>">Regresar</a>
						</div>
					</div>
                    <!-- --------- -->
          </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
