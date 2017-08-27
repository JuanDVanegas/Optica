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
            	<?php
					if(isset($_SESSION["resultAgregar"]))
					{
						echo "<p class='text-success'>".$_SESSION["resultAgregar"]."</p>";
						unset($_SESSION["resultAgregar"]);
					}
				?>
                <div class="row">
                    <div class="col-md-offset-1 col-md-3">
                        <form action="cuentaMedicoHistorial.php" method="post" name="form_buscador">
                        <input class="form-control" type="search" name="busquedaP" placeholder="documento paciente"  
                        title="Letras exclusivamente"/>
                    </div>
                    <div class="col-md-3">
                    	<input class="form-control" type="date" name="busquedaF" />
                    </div>
                    <div class="col-md-4">
                        <input class="btn btn-primary" type="submit" value="Buscar" />
                        </form>
                    </div>
                </div>
                <br />
                <!--Nueva Insersion-->
                <?php 
				include('database/conexion.php');
				//----------------------------
				if(isset($_POST["busquedaP"]))
				{
					$filtroP = $_POST["busquedaP"];
				}
				else
				{
					$filtroP = "null";
				}
				//---------------------------------
				if(isset($_POST["busquedaF"]))
				{
					$filtro = $_POST["busquedaF"];
				}
				else
				{
					$filtro = "null";
				}
				//---------------------------------
				$cant_pagina = 10;
				if(isset($_GET["pagina"]))
				{
					$pagina = $_GET["pagina"];
				}
				else
				{
					$pagina = 1;
				}
				//pagina empieza en 0
				$empieza = ($pagina-1) * $cant_pagina;
				if($filtro != "null")
				{
					$sql1 = "SELECT * FROM historial WHERE fk_medico='".$_SESSION["id_usuario"]."' AND fecha LIKE '%".$filtro."%' 
					LIMIT $empieza,$cant_pagina";
					$query = "SELECT * FROM historial WHERE fk_medico='".$_SESSION["id_usuario"]."' AND fecha LIKE '%".$filtro."%'";
				}
				else
				{
					$sql1 = "SELECT * FROM historial WHERE fk_medico='".$_SESSION["id_usuario"]."' LIMIT $empieza,$cant_pagina";
					$query = "SELECT * FROM historial WHERE fk_medico='".$_SESSION["id_usuario"]."'";
				}	
				$result = mysqli_query($db,$query);
				$total_registro = mysqli_num_rows($result);
				$total_pagina = ceil($total_registro/$cant_pagina);
				//-------------------------------------------------------------------------
				
				
				if(!$result1 = $db->query($sql1))
				{
					die('error al ejecutar la sentencia ['. $db->error.']');
				}
				else;
				
				echo "<table class=table table-hover>
						<tr class=active>
							<td>
								<b>Paciente</b>
							</td>
							<td>
								<b>Lugar</b>
							</td>
							<td>
								<b>Fecha</b>
							</td>
							<td>
								<b>Detalles</b>
							</td>
						</tr>";
				$contador = 0;	
				while($row1 = $result1->fetch_assoc())
				{
					$id_historial = stripslashes($row1["id_historial"]);
					$fk_paciente = stripslashes($row1["fk_paciente"]);
					$fk_medico = stripslashes($row1["fk_medico"]);
					$fk_registro = stripslashes($row1["fk_registro"]);
					$lugar = stripslashes($row1["lugar"]);
					$fecha = stripslashes($row1["fecha"]);
					if($filtroP != "null")
					{
						$sql2 = "SELECT * FROM usuario WHERE id_usuario = '$fk_paciente' AND numeroDocumento LIKE '%".$filtroP."%'";
					}
					else
					{
						$sql2 = "SELECT * FROM usuario WHERE id_usuario = '$fk_paciente'";
					}					
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
						$paciente = $nombre.' '.$apellido;
						echo "<tr>
							<td>
								$paciente
							</td>
							<td>
								$lugar
							</td>
							<td>
								$fecha
							</td>
							<td>
								<a href=cuentaMedicoHistorialDetalle.php?idHistorial=$fk_registro >Ver</a>
							</td>
						</tr>";
					}
					
				}
				echo "</table>";
				?>
                
				<div class="row">
					<div class="col-sm-offset-1  col-sm-4">
						<?php if($contador == 0)
						{
							echo "No se encontraron resultados";
						}
						else
						{
							if($contador > 1)
							{
								echo "Se han encontrado $contador resultados";
							}
							else
							{
								echo "Se ha encontrado $contador resultado";
							}
						}
						?>
					</div>
                    <div class="col-sm-offset-3  col-sm-3">
						<a href="cuentaMedicoHistorialAgregar.php">Agregar Registro</a>
					</div>
				</div>
                <div class="row">
                	<div class="col-sm-offset-4  col-sm-4">
                    	<?php
						//------------------------------------------
						echo "<nav aria-label='Page navigation'>
						  <ul class='pagination'>
							<li>
							  <a href='cuentaMedicoHistorial.php?pagina=1' aria-label='Previous'>
								<span aria-hidden='true'>&laquo;</span>
							  </a>
							</li>";
							for($i=1; $i<=$total_pagina;$i++)
							{
								echo"<li><a href='cuentaMedicoHistorial.php?pagina=".$i."'>".$i."</a> ";
							}
							echo"							
							<li>
							  <a href='cuentaMedicoHistorial.php?pagina=$total_pagina' aria-label='Next'>
								<span aria-hidden='true'>&raquo;</span>
							  </a>
							</li>
						  </ul>
						</nav>";
						//-----------------------------------------
                    
                        
						?>
					</div>
                </div>
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
	