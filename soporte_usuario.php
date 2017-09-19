<?php include('seguridad_usuario.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Soporte Tecnico - Optica All in One</title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/overwrite.css" type="text/css" />
  <link rel="stylesheet" href="css/site.css" type="text/css" />
	<script type="text/javascript" src="javascript/jquery.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.js"></script>
  <script type="text/javascript">
  function ajax()
  {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
      if(req.readyState == 4 && req.status == 200)
      {
        document.getElementById("chat").innerHTML = req.responseText;
      }
    }
    req.open("GET","conversation.php",true);
    req.send();
  }
  setInterval(function(){ajax();}, 1000);

  </script>
  </head>
  <body onLoad="ajax();">
    <?php include ('modules/navbar.php'); ?>
    <div class="body-content container">
         <div class="row">
         	<?php include('configuracion_banner.php');?>
         </div>
        <div class="row">
            <div class="col-md-3">
                <br />
                <?php include('configuracion_menu.php');
                include("database/conexion.php");
                ?>
            </div>
            <div class="col-md-9"> 
                <!--Nueva Insersion-->
                    <section  style="padding: 10%;">
                      <div class="row">
                          <div class="form-group" id="chat">
                          </div><br/>
                          <form  method="POST" action="soporte_usuario">
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="texto" placeholder="Escriba Mensaje"/>
                          </div>
                          <div class="col-md-6">
                           <input type="submit" class="btn btn-primary" id="send" name="enviar" value="Enviar"/>     
                           </div>    
                        </form>
                      </div>
                    </section>
                <?php
                if(isset($_POST["enviar"]))
                {
                    $emisor = $_SESSION["nombre"]." ".$_SESSION["apellido"];
                    $texto = $_POST["texto"];

                    $sql2 = "INSERT INTO mensaje(emisor,texto,fecha) VALUES ('$emisor','$texto',NOW())";
                    $ejecutar = $db->query($sql2);
                    if($ejecutar == true)
                    {
                      echo "<embed loop='false' src='modules/beep.mp3' hidden='true' autoplay='true'";
                    }
                }

                  ?>
                  
                  <!--Termina Insercion -->
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
