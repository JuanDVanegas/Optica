<?php include('seguridad_usuarioAdministrador.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Entidad <?php $_SESSION["nombre"];?> Optica All in One</title>
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
                            <h2>Entidades &Oacute;pticas u oftalmologicas</h2>
                            <?php if(isset($_SESSION["success"])){echo "<h4 class='text-success'>".$_SESSION["success"]."</h4>";
							unset($_SESSION["success"]);}
							if(isset($_SESSION["error"])){echo "<h4 class='text-danger'>".$_SESSION["error"]."</h4>";
							unset($_SESSION["error"]);}?>
                            <h4>Lista de entidades vinculadas al sistema de información</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-3">
                            <form action="cuentaAdminEntidades.php" method="post" name="form_buscador">
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
                        <div class="col-md-12">
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
								$sql1 = "SELECT * FROM entidad WHERE nombre LIKE '%".$filtro."%' OR address
								LIKE '%".$filtro."%' OR detalles LIKE '%".$filtro."%' LIMIT $empieza,$cant_pagina";
								$query = "SELECT * FROM entidad WHERE nombre LIKE '%".$filtro."%' OR address
								LIKE '%".$filtro."%' OR detalles LIKE '%".$filtro."%'";
							}
							else
							{
								$sql1 = "SELECT * FROM entidad LIMIT $empieza,$cant_pagina";
								$query = "SELECT * FROM entidad";
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
										<td>
                                            <b>Codigo</b>
                                        </td>
										<td>
										</td>
										<td>
										</td>
                                    </tr>";
                            $contador = 0;	
                            while($row1 = $result1->fetch_assoc())
                            {
								$contador++;
								$id = stripslashes($row1["id_entidad"]);
                                $nombreEntidad = stripslashes($row1["nombreEntidad"]);
                                $direccion = stripslashes($row1["address"]);
                                $codigo = stripslashes($row1["codigo"]);
                                $detalles = stripslashes($row1["detalles"]);
								$estado = stripslashes($row1["estadoEntidad"]);
								if($estado == 0)
								{
									$link = "habilitar";
								}
								if($estado == 1)
								{
									$link = "inhabilitar";
								}
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
									<td>
                                        $codigo
                                    </td>
									<td>
										<a href='estadoEntidad.php?entidad=".$id."&action=".$link."&page=".$pagina."'>".$link."</a>
									</td>
									<td>
										<a href='modificar_entidad.php?entidad=".$id."&page=".$pagina."'>Editar</a>
									</td>
                                </tr>";
                            }
                            echo "</table>";
							if($contador==0)
							{
								echo "<p class='text-info'>Sin resultados de busqueda</p>";
							}
                            ?>
                            <div class="col-sm-offset-1 col-sm-8">
                            	<div class="col-sm-4"><a href="nueva_entidad.php">Nueva Entidad</a></div>
                                <div class="col-sm-6"><a href="administrar_postulacion.php">Bandeja de postulación</a></div>
                            </div>
                            <div class="col-sm-offset-5  col-sm-5">
                                <?php
                                //------------------------------------------
                                echo "<nav aria-label='Page navigation'>
                                  <ul class='pagination'>
                                    <li>
                                      <a href='entidad.php?pagina=1' aria-label='Previous'>
                                        <span aria-hidden='true'>&laquo;</span>
                                      </a>
                                    </li>";
                                    for($i=1; $i<=$total_pagina;$i++)
                                    {
                                        echo"<li><a href='entidad.php?pagina=".$i."'>".$i."</a> ";
                                    }
                                    echo"							
                                    <li>
                                      <a href='entidad.php?pagina=$total_pagina' aria-label='Next'>
                                        <span aria-hidden='true'>&raquo;</span>
                                      </a>
                                    </li>
                                  </ul>
                                </nav>";
                                //-----------------------------------------
                                ?>
                            </div>
                    </div>
                    <!--Termina Insercion --------- -->
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
