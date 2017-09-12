<?php include('seguridad_usuario.php');
	include('seguridad_confirmarCorreo.php');
	if(!isset($_GET["target_user"]))
	{
		header('Location: noticias.php');
	}
	$target_user = $_GET["target_user"];
	if($target_user == md5("Paciente") && $_SESSION["rolUsuario"] == "Paciente")
	{
		$user = "fk_medico";
		$fk_usuario_target = "fk_paciente";
		$user_to = "Medico";
	}
	else
	{
		if($target_user == md5("Medico") && $_SESSION["rolUsuario"] == "Medico")
		{
			$user = "fk_paciente";
			$fk_usuario_target = "fk_medico";
			$user_to = "Paciente";
		}
		else
		{
			$user = "null";
			header("Location: noticias.php");						
		}
	}
?>
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
            	<?php
					if(isset($_SESSION["success"]))
					{
						echo "<p class='text-success'>".$_SESSION["success"]."</p>";
						unset($_SESSION["success"]);
					}
					if(isset($_SESSION["error"]))
					{
						echo "<p class='text-danger'>".$_SESSION["error"]."</p>";
						unset($_SESSION["error"]);
					}
					
				?>
                <div class="row">
                    <div class="col-md-offset-1 col-md-3">
                        <form action="historial.php?target_user=<?php echo $_GET["target_user"];?>" method="post" name="form_buscador">
                        <input class="form-control" type="search" name="busquedaP" placeholder="N° Documento <?php echo $user_to;?>" pattern="[0-9]+" 
                        title="Numero de documento a buscar"/>
                    </div>
                    <div class="col-md-3">
                    	<input class="form-control" type="date" name="busquedaF" title="fecha de inquisición"/>
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
				//-----------------------------------
				
				$empieza = ($pagina-1) * $cant_pagina;
				if($filtro != "null")
				{
					$sql1 = "SELECT * FROM historial WHERE ".$fk_usuario_target."='".$_SESSION["id_usuario"]."' AND 
					fecha LIKE '%".$filtro."%' LIMIT $empieza,$cant_pagina";
					$query = "SELECT * FROM historial WHERE ".$fk_usuario_target."='".$_SESSION["id_usuario"]."' AND 
					fecha LIKE '%".$filtro."%'";
				}
				else
				{
					$sql1 = "SELECT * FROM historial WHERE ".$fk_usuario_target."='".$_SESSION["id_usuario"]."' 
					LIMIT $empieza,$cant_pagina";
					$query = "SELECT * FROM historial WHERE ".$fk_usuario_target."='".$_SESSION["id_usuario"]."'";
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
								<b>$user_to</b>
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
					if($user_to == 'Medico')
					{
						$to_user_view = stripslashes($row1["fk_medico"]);
					}
					else
					{
						if($user_to == 'Paciente')
						{
							$to_user_view = stripslashes($row1["fk_paciente"]);
						}
						else;
					}
					if($filtroP != "null")
					{
						$sql2 = "SELECT * FROM usuario WHERE id_usuario = '$to_user_view' AND numeroDocumento 
						LIKE '%".$filtroP."%'";
					}
					else
					{
						$sql2 = "SELECT * FROM usuario WHERE id_usuario = '$to_user_view'";
					}					
					if(!$result2 = $db->query($sql2))
					{
						die('error al ejecutar la sentencia ['. $db->error.']');
					}
					else;
					while($row2 = $result2->fetch_assoc())
					{	
						$contador++;	
						$id_usuario	= stripslashes($row2["id_usuario"]);			
						$nombre = stripslashes($row2["nombre"]);
						$apellido = stripslashes($row2["apellido"]);
						$usuario_view = $nombre.' '.$apellido;
						echo "<tr>
							<td>
								$usuario_view
							</td>
							<td>
								$lugar
							</td>
							<td>
								$fecha
							</td>
							<td>
								<a href='historial_detalle.php?id_registro=".$fk_registro."&target_user=".$user."&key=".$id_usuario."&from=".$fk_usuario_target."&redirect=".$_GET["target_user"]."'>Ver</a>
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
                    <?php
                    	if($user == "fk_paciente")
                        {
                        	echo "<a href='nuevo_registro.php?target_user=".$_GET["target_user"]."'>Agregar Registro</a>";
                       	}
						else;
					?>
					</div>
				</div>
                <div class="row">
                	<div class="col-sm-offset-4  col-sm-4">
                    	<?php
						//------------------------------------------
						echo "<nav aria-label='Page navigation'>
						  <ul class='pagination'>
							<li>
							  <a href='historial.php?pagina=1&target_user=".$_GET["target_user"]."' aria-label='Previous'>
								<span aria-hidden='true'>&laquo;</span>
							  </a>
							</li>";
							for($i=1; $i<=$total_pagina;$i++)
							{
								echo"<li><a href='historial.php?pagina=".$i."&target_user=".$_GET["target_user"]."'>".$i."</a> ";
							}
							echo"							
							<li>
							  <a href='historial.php?pagina=$total_pagina&target_user=".$_GET["target_user"]."' aria-label='Next'>
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
	