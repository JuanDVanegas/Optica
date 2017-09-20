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
  $(document).ready(function(){
   var refreshId = setInterval((#chat), 1000);
   $.ajaxSetup({ cache: false });
  });

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
                $usuario1 = $_SESSION["id_usuario"];
                $sqlAmigos = "SELECT * FROM amigo INNER JOIN usuario ON amigo.usuario1 = usuario.id_usuario WHERE usuario1 = '$usuario1' OR categoria = 'default'";
                $resultado = mysqli_query($db,$sqlAmigos);
                ?>
            </div>
            <div class="col-md-9"> 
                <!--Nueva Insersion-->
                      <div class="row">
                          <div class="col-md-4" style="float:right;">
                              <?php 
                              while($rowAmigo = $resultado->fetch_assoc())
                              {
                                $id = $rowAmigo["usuario2"];
                                $nombreAmigo = $rowAmigo["nombreAmigo"];
                                echo "<a class='btn btn-default' href='soporte_usuario?target=$id'>$nombreAmigo</a><br/>";
                              }
                              ?>
                          </div>
                          <div class="col-md-9" id="chat">
                              <?php include('conversation.php');?>
                          </div>
                          <form  method="POST" action="soporte_usuario?target=<?php echo $_GET["target"];?>">
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="texto" placeholder="Escriba Mensaje"/>
                          </div>
                          <div class="col-md-6">
                           <input type="submit" class="btn btn-primary" id="send" name="enviar" value="Enviar"/>     
                           </div>    
                        </form>
                      </div>
                <?php
                if(isset($_POST["enviar"]) && $_POST["texto"] != "")
                {
                    $emisor = $_SESSION["id_usuario"];
                    $texto = $_POST["texto"];
                    $receptor = $_GET['target'];
                    $sql2 = "INSERT INTO mensaje(emisor,receptor,texto,fecha) VALUES ('$emisor','$receptor','$texto',NOW())";
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
