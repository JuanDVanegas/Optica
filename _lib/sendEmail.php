<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Enviar Correo - Optical All in One</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/overwrite.css" type="text/css" />
<link rel="stylesheet" href="css/site.css" type="text/css" />
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/bootstrap.js"></script>
</head>
<body>
    <div class="container body-content">
    	<?php	
			include("../database/conexion.php");
			include("class.phpmailer.php");
			
			$correo = $_POST["correoElectronico"];
			$asunto = "Confirmar Cuenta";
			$codigo = rand(1000000, 9999999);
			$tipo = "Confirmar Cuenta";
			$confirmMail= 0;
			
			$sql2="INSERT INTO codigo (numero,tipo)
			VALUES ('$codigo','$tipo')";
			$db->query($sql2);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
			$mail->SMTPSecure = "tls";
			$mail->Username = "opticaallinone@gmail.com"; // Correo completo a utilizar
			$mail->Password = "@Optica#123"; // Contraseña
			$mail->Port = 587; // Puerto a utiliazar
			$mail->From = "opticaallinone@gmail.com";
			$mail->FromName ="Optica All in One"; // Desde donde enviamos (Para mostrar)
			$mail->AddAddress($correo); // Esta es la dirección a donde enviamos
			$mail->IsHTML(true); // El correo se envía como HTML
			$mail->Subject = ($asunto); // Este es el titulo del email.
			$body = "Haga click en el enlace para: ".$asunto." http://localhost:8082/Optica/_lib/confirmarEmail.php?correo=$correo&codigo=$codigo";//en vez del correo se envia el id del login
			$mail->Body = $body; // Mensaje a enviar
			$mail->AltBody = "Haga click en el enlace para:".$asunto.$codigo; // Texto sin html
			$exito = $mail->Send(); // Envía el correo.
			
			
			if($exito){
				echo '<h2 class="text-success">El correo fue enviado correctamente.</h2>';
			}else{
				echo '<h2 class="text-danger">Hubo un inconveniente. Contacta a un administrador.</h2>';
			}
    	?>
    </div>	
</body>
</html>
