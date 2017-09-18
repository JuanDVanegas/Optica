<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="images/logo.png" />
<title>Optical All in One</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="css/site.css" type="text/css" />
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/bootstrap.js"></script>
<body>
	<?php session_start(); include ('modules/navbar.php'); ?>
	<div class="body-content container">
    	<?php 
		if(isset($_GET["help"]))
		{
			$status = "style='display:none'";
			if($_GET["help"] == "inhabilitado")
			{
				
				echo "<div class='row'>
						<div class='col-md-offset-3 col-md-6'>
						<h2>Usuario Inhabilitado</h2>
						<p class='text-justify'>Motivos:<br/>
						<ul>
							<li>Mi entidad a la que pertenezco ha sido eliminada del sistema</li>
							<li>Intente afectar el sistema con información erronea, programas ilegales o hacking</li>
							<li>Cometí acciones negativas contra los demás usuarios del sistema</li>
						</ul>
						Soluciones:<br/>
						<ul>
							<li>Contactar soporte mediante correo electronico ó llamada telefonica</li>
							<li>Aceptar el fraude realizado con soporte tecnico y solicitar reactivación con previa justificación</li>
							<li>Crear una nueva cuenta de usuario, solicitar la activación de tipo y numero documento a soporte@optica-all.com</li>
						</ul>
						
						
						 </div>
					</div>";
			}
		}
		else
		{
			$status = "style='display:block'";
		}
		?>
		
   		
		<div class="row" <?php echo $status;?>>
            <div class="col-md-offset-2 col-md-4">
            <h3>Correo Electronico</h3>
            <p class="text-justify">soporte@optica-all.com<br />leiderpresiado@gmail.com<br />developer@optica-all.com</p>
             </div>
            <div class="col-md-offset-2 col-md-4">
            <h3>Telefonos</h3>
            <p class="text-justify">3213603778<br />3134689556<br />7115463<br />5478999</p>
        </div>
        <div class="row" <?php echo $status;?>>
        	<div class="col-md-offset-2 col-md-8">
        	<h3>Grupo de Desarrollo</h3>
              <p>Leyder Mendieta Paéz ⌂ soporte en el sistema de información web<br/>
              Juan David Vanegas Rodriguez ⌂ soporte basado en el cliente<br />
              Katherine Gissell Rodriguez ⌂ componente enfocado en errores del sistema<br />
              Jesus David Perdomo Mateus ⌂ delegado del cliente - servidor</p>
            </div>
        </div>
      <?php include ('modules/footer.php'); ?>
	  </div>	
</body>
</html>
