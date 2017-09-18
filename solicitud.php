<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restablecer contraseña</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="images/logo.png" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="css/site.css" type="text/css" />
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/bootstrap.js"></script>
</head>
<body>
	<?php include ('modules/navbar.php'); 
	session_start();
	$solicitud = $_GET["peticion"];
	if(isset($_SESSION["success"])){unset($_SESSION["success"]);}?>
    <div class="body-content container">
         <div class="row">
           <div class="col-md-offset-3 col-md-6"> 
           	<h3><?php echo $solicitud;?></h3>
            <a class="btn btn-success" href="index">Regresar al inicio</a>
           </div>
         </div>
    </div>
</body>
</html>