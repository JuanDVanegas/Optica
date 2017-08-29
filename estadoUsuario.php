<?php include('seguridad_usuarioAdministrador.php');?>
<?php
include('database/conexion.php');
$sql1="SELECT * FROM login WHERE email='".$_POST["mail"]."'";
if(!$result1 = $db->query($sql1))
{
	die('error al ejecutar la sentencia ['. $db->error.']');
}
else;
if($row1 = $result1->fetch_assoc())
{
	$id_usuario = stripslashes($row1["fk_user"]);
	$resultado = stripslashes($row1["estado"]);
	if($resultado == 0)
	{
		$estado = "inhabilitado";
		$action = "habilitar";
	}
	else
	{
		$estado = "habilitado";
		$action = "inhabilitar";
	}
	
	$sql2="SELECT * FROM usuario WHERE id_usuario='".$id_usuario."'";
	if(!$result2 = $db->query($sql2))
	{
		die('error al ejecutar la sentencia ['. $db->error.']');
	}
	else;
	if($row2 = $result2->fetch_assoc())
	{
		$nombre = stripslashes($row2["nombre"]);
		$apellido = stripslashes($row2["apellido"]);
		$tipoDocumento = stripslashes($row2["tipoDocumento"]);
		$numeroDocumento = stripslashes($row2["numeroDocumento"]);
		$entidad = stripslashes($row2["entidad"]);
		$rolUsuario = stripslashes($row2["rolUsuario"]);
	}
	else
	{
		$_SESSION["error"] = "Usuario no disponible";
		header("Location: cuentaAdminEliminarUsuario.php");
	}
}
else
{
	$_SESSION["error"] = "Correo electronico no disponible";
	header("Location: cuentaAdminEliminarUsuario.php");
}
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
                        <div class="col-md-12">
                            <h1>Eliminar Usuario</h1>
                            <br />
                            <h4 class="text-info">Confirme los datos del usuario para proceder con la eliminación</h4>
                        </div>
                    </div>
                    <br />                     
                    <div class="row">
                    	<div class="col-md-offset-1 col-md-8">
                        	<h4 class="text-warning">¿Esta seguro de eliminar el siguiente usuario?</h4>
                            <h5 class='text-info'>Información del usuario<br /><br />
                            <?php
							echo "Nombre: ".$nombre."<br/>";
							echo "Apellido: ".$apellido."<br/>";
							echo "Tipo de Documento: ".$tipoDocumento."<br/>";
							echo "Numero Documento: ".$numeroDocumento."<br/>";
							echo "Entidad: ".$entidad."<br/>";
							echo "Rol de Usuario: ".$rolUsuario."<br/>";
							echo "Estado: ".$estado."<br/><br/>";
							?>
                            </h5>
                        </div>         
                    </div>
                     <br />
                    <div class="row">
                        <div class="col-md-offset-1 col-md-3">
                        	<a href="cuentaAdminEstadoUsuario.php">Regresar</a>
                        </div>
                        <div class="col-md-3">
                        	<?php echo "<a class='btn btn-danger' href='controlador_estadoUsuario.php?id=$id_usuario&action=$action'>".$action."</a>"; ?>                            
                        </div> 
                    </div>
                 <!--Termina Insersion-->                 
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>