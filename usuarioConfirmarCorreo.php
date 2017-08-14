<?php include('seguridad_usuario.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restablecer contraseña</title>
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
           <div class="col-md-12"> 
             <h1>Confirmar Correo electronico</h1>
             
             <p>verifique su correo electronico para enviar mensaje confirmacion.</p>
           </div>
         </div>
         <div class="row">
            <div class="col-md-6">
            	<form id="form1" name="form1" method="post" action="../_lib/sendEmail.php">
                	<br />
                	<br />
                    <?php if(isset($_SESSION["error"])){echo "<h5 class='text-danger'>".$_SESSION["error"]."</h5>";unset($_SESSION["error"]);}?>
                	<div class="row">
                    	<div class="col-md-5">
                        	<p>Correo Electronico</p>
                        </div>
                    	<div class="col-md-7">
          					<input class="form-control" type="mail" name="correoElectronico" value="<?php echo $_SESSION["correoElectronico"];?>" readonly="readonly" />
                            <a href="actualizarCorreo.php">Modificar mi correo electronico</a>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                    	<div class="col-md-8"></div>
                    	<div class="col-md-4">
          					<input name="send" type="submit" class="btn btn-primary" id="send" value="Enviar Mensaje" />
                        </div>
                    </div>
				</form>
            </div>
         </div>
     </div>
</body>
</html>