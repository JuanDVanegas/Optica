<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Enviar Correo - Optical All in One</title>
<link rel="stylesheet" href="../Optica/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="../Optica/css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="../Optica/css/site.css" type="text/css" />
<script type="text/javascript" src="../Optica/javascript/jquery.js"></script>
<script type="text/javascript" src="../Optica/javascript/bootstrap.js"></script>
</head>
<body>
    <div class="container body-content">
    	<?php
			include("../database/conexion.php");	
			$correo=$_GET["correo"];
			$codigo=$_GET["codigo"];
			$confirmMail=1;
			 
			 echo $correo;
			 echo "<br/>";
			 echo $codigo;
			$sql="SELECT * FROM login WHERE email = '$correo'";
			
			if($db->query($sql) == true)
			{
				$sql1="UPDATE login SET confirmMail = '1' WHERE email = '$correo'";
				if($db->query($sql1) == true)
				{
					$sql2="DELETE FROM codigo WHERE numero = '$codigo'";
				
					if($db->query($sql2) == true)
					{
						$_SESSION["status"] = 0;
						$_SESSION["error"] = "Se ha confirmado el correo electronico";
						header("Location: ../index.php");
					}
					else
					{
						$_SESSION["status"] = 0;
						$_SESSION["error"] = "error al correo electronico";
						header("Location: ../index.php");
					}
				}
				else
				{
					$_SESSION["status"] = 0;
					$_SESSION["error"] = "error al correo electronico";
					header("Location: ../index.php");
				}
			}
			else
			{
				echo "No se encontro el correo";
			}			
    	?>
    </div>	
</body>
</html>