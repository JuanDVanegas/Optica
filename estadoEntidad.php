<?php include('seguridad_usuarioAdministrador.php');?>
<?php
include('database/conexion.php');
include('clases/claseMedico.php');

$action = $_GET["action"];

$numeroMedicos = new Medico('',$_GET["entidad"]);
$numeroMedicos->numeroMedicoXEntidad();

$sql1="SELECT * FROM entidad WHERE id_entidad='".$_GET["entidad"]."'";
if(!$result1 = $db->query($sql1))
{
	die('error al ejecutar la sentencia ['. $db->error.']');
}
else;
if($row1 = $result1->fetch_assoc())
{
	$nombre = stripslashes($row1["nombreEntidad"]);
	$address = stripslashes($row1["address"]);
	$codigo = stripslashes($row1["codigo"]);
	$detalles = stripslashes($row1["detalles"]);
}
else
{
	$_SESSION["error"] = "Entidad no se encuentra disponible";
	header("Location: entidad.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Estado Entidad - Optica All in One</title>
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
                        <div class="col-md-12">
                            <h2><?php echo $action;?> Entidad</h2>
                            <br />
                            <h4 class="text-info">¿Esta seguro de <?php echo $action;?> la siguiente entidad del sistema de información?</h4>
                        </div>
                    </div>
                    <br />                     
                    <div class="row">
                    	<div class="col-md-offset-1 col-md-8">
                        	<h4 class="text-warning">Ál <?php echo $action;?> la entidad todos los medicos afiliados a esta misma serán afectados del mismo modó</h4>
                            <h5 class='text-info'>Información de la entidad<br /><br />
                            <?php
							echo "Numero de Medicos Afiliados: ".$_SESSION["numeroMedico"]."<br/><br/>";
							echo "Nombre: ".$nombre."<br/>";
							echo "Dirección: ".$address."<br/>";
							echo "detalles: ".$detalles."<br/>";
							echo "codigo: ".$codigo."<br/>";
							if($action =="inhabilitar")
							{
								$btn = "btn-danger";
							}
							else
							{
								$btn = "btn-success";							
							}
							?>
                            </h5>
                        </div>         
                    </div>
                     <br />
                    <div class="row">
                        <div class="col-md-offset-1 col-md-3">
                        	<form action="controlador_estadoEntidad.php?page=<?php echo $_GET["page"];?>" method="post" 
                            name="cambiarEstadoUsuario">
                            <input type="hidden" name="cambiar" value="<?php echo $action;?>" />
                            <input type="hidden" name="entidad" value="<?php echo $_GET["entidad"];?>"/>
                            <input class="btn <?php echo $btn;?> " type="submit" value="<?php echo $action;?> Entidad y Afiliados"/>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-default" href="entidad">Regresar</a>
                        </div> 
                    </div>
                 <!--Termina Insersion-->                 
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>