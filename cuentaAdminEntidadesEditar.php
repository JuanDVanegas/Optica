<?php include('seguridad_usuarioAdministrador.php');?>
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
                        <div class="col-md-10">
                            <h2>Entidades Opticas u oftalmologicas</h2>
                            <h4>Editar Valores de la entidad</h4>
                        </div>
                    </div>
                    
                    <?php
					include('database/conexion.php');
					$id_entidad = $_GET["entidad"];
					$sql = "SELECT * FROM entidad WHERE id_entidad = '$id_entidad'";
					if(!$result = $db->query($sql))
					{
						die("error al ejecutar ".$db->error);
					}
					if($row = $result->fetch_assoc())
					{
						$nombre = stripslashes($row["nombre"]);
						$address = stripslashes($row["address"]);
						$detalles = stripslashes($row["detalles"]);
					}
					?>
                    
                    
                    <div class="row">
                        <br />
                        <div class="col-md-10">
                         <form action="controlador_editarEntidad.php" method="post" name="editarEntidad">
                         <input type="hidden" value="value="<?php echo $id_entidad;?>"" name="id_entidad" />
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Nombre</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="nombre"  value="<?php echo $nombre;?>" required/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Direccion</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="address" value="<?php echo $address;?>" required/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Detalles</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="detalles" value="<?php echo $detalles;?>" required/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-4">
                                <br />
                                <input class="btn btn-default" type="submit" name="confirmar" value="Actualizar" />
                            </div>
                        </div>
                         </form>
                         </div>
                    </div>
                    <!--Termina Insercion --------- -->
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
