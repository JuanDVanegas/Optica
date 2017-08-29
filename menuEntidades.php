<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Optical All in One</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="css/site.css" type="text/css" />
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/bootstrap.js"></script>
<body>
	<?php session_start(); include ('modules/navbar.php'); ?>
	<div class="body-content container">
    	<div class="row">
            <div class="col-md-offset-1 col-md-8">
                <h2>Entidades Opticas u oftalmologicas</h2>
                <h4>Lista de entidades vinculadas al sistema de información</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-3">
                <form action="menuEntidades.php" method="post" name="form_buscador">
                <input class="form-control" type="search" name="busqueda" placeholder="Busqueda..." pattern="[A-Za-z ]+" 
                title="Letras exclusivamente"/>
            </div>
            <div class="col-md-4">
           		<input class="btn btn-primary" type="submit" value="Buscar" />
                </form>
            </div>
        </div>
		<div class="row">
        	<br />
        	<div class="col-md-offset-1 col-md-6">
            	<?php 
				sleep(1);
				include('database/conexion.php');
				
				if(isset($_POST["busqueda"]))
				{
					$filtro = $_POST["busqueda"];
				}
				else
				{
					$filtro = "null";
				}
				
				
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
					$sql1 = "SELECT * FROM entidad WHERE estado='1' AND (nombre LIKE '%".$filtro."%' OR address LIKE '%".$filtro."%' OR
					detalles LIKE '%".$filtro."%') LIMIT $empieza,$cant_pagina";
					$query = "SELECT * FROM entidad WHERE estado='1' AND (nombre LIKE '%".$filtro."%' OR address LIKE '%".$filtro."%' OR
					detalles LIKE '%".$filtro."%')";
				}
				else
				{
					$sql1 = "SELECT * FROM entidad WHERE estado='1' LIMIT $empieza,$cant_pagina";
					$query = "SELECT * FROM entidad WHERE estado='1'";
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
                            	<b>Nombre Entidad</b>
							</td>
							<td>
								<b>Dirección</b>
							</td>
							<td>
								<b>Detalles</b>
							</td>
						</tr>";
				$contador = 0;	
				while($row1 = $result1->fetch_assoc())
				{
					$contador++;
					$nombreEntidad = stripslashes($row1["nombre"]);
					$direccion = stripslashes($row1["address"]);
					$codigo = stripslashes($row1["codigo"]);
					$detalles = stripslashes($row1["detalles"]);
					echo "<tr>
						<td>
							$nombreEntidad
						</td>
						<td>
							$direccion
						</td>
						<td>
							$detalles
						</td>
					</tr>";
					
				}
				echo "</table>";
				if($contador==0)
				{
					echo "<p class='text-info'>Sin resultados de busqueda</p>";
				}
				?>
                <br />
                <div class="col-sm-offset-4  col-sm-4">
                    <?php
                    //------------------------------------------
                    echo "<nav aria-label='Page navigation'>
                      <ul class='pagination'>
                        <li>
                          <a href='menuEntidades.php?pagina=1' aria-label='Previous'>
                            <span aria-hidden='true'>&laquo;</span>
                          </a>
                        </li>";
                        for($i=1; $i<=$total_pagina;$i++)
                        {
                            echo"<li><a href='menuEntidades.php?pagina=".$i."'>".$i."</a> ";
                        }
                        echo"							
                        <li>
                          <a href='menuEntidades.php?pagina=$total_pagina' aria-label='Next'>
                            <span aria-hidden='true'>&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>";
                    //-----------------------------------------
                
                    
                    ?>
                 </div>          
            </div>
            <div class="col-md-offset-1 col-md-3">
                    <h4 class="text-info">¿tu entidad de confianza no esta vinculada?</h4>
                    <p>Estoy interesado en agregar una nueva entidad optica u oftalmologica a este sitio web</p>
                    <a href="">Postular Nueva</a>
             </div>
        </div>
	<?php include ('modules/footer.php'); ?>
	 </div>	
</body>
</html>
