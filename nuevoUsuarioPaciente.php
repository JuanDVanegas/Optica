<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/componente.css" />
<link rel="stylesheet" type="text/css" href="css/principal.css" />
<title>Documento sin título</title>
</head>
<script>
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["continuar"].submit();
    }
</script>
<body>
<?php
session_start();
include('database.php');
include('claseUsuario.php');
$Nombre = $_POST["Nombre"];
$Apellidos = $_POST["Apellidos"];
$CorreoElectronico = $_POST["CorreoElectronico"];
$Fecha = $_POST["Fecha"];
$tipoDocumento = $_POST["tipoDocumento"];
$Documento = $_POST["Documento"];
$Contrasena = $_POST["Contrasena"];
$rol = $_POST["rol"];

$objetoUsuario -> chequearUsuario($CorreoElectronico,$tipoDocumento,$Documento);

if($rol == 'Paciente' && !isset($documentoExist) && !isset($emailExist) && !isset($nonSelected))
{
	echo "<form action=nuevoUsuarioPaciente.php method=post name=continuar>
        	<input type=hidden name=nombre value=$Nombre />
            </td>
          </tr>
          <tr>
            <td>
            <input type=hidden name=apellido value=$Apellidos />
            </td>
          </tr>
          <tr>
            <td>
            <input type=hidden name=mail value=$CorreoElectronico />
            </td>
          </tr>
          <tr>
            <td>
            <input type=hidden name=fecha value=$Fecha />
            </td>
          </tr>
          <tr>
            <td>
            <input type=hidden name=tipo value='$tipoDocumento' />
            </td>
          </tr>
          <tr>
            <td>
            <input type=hidden name=documento value=$Documento />
            </td>
          </tr>
          <tr>
            <td>
            <input type=hidden name=password value=$Contrasena />
            </td>
          </tr>
          <tr>
            <td>
    
            <input type=hidden name=rol value=$rol />
            </td>
          </tr>
    </form>";
}
else;
if($rol == 'Medico' && !isset($documentoExist) && !isset($emailExist) && !isset($nonSelected) )
{
	
}
else;

?>


</body>
</html>