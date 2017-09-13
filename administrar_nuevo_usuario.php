<?php include('seguridad_usuarioAdministrador.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Nuevo Usuario Optica All in One</title>
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
                            <h1>Nuevo Usuario</h1>
                            <?php 
                            if(isset($_SESSION["errorRegistro"]))
                            {
                                echo "<h3 class='text-danger'>".$_SESSION["errorRegistro"]."</h3>";unset($_SESSION["errorRegistro"]);
                            }
							if(isset($_SESSION["success"]))
                            {
                                echo "<h3 class='text-success'>".$_SESSION["success"]."</h3>";unset($_SESSION["success"]);
                            }
                            ?>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                            <form action="controlador_nuevoUsuarioAdmin.php" method="post" name="newUsuario">
                                <div class="col-md-5">
                                    <p>Nombre</p>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="nombre" id="textfield4" pattern="[A-Za-z ]+" required/>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Apellido</p>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="apellido" id="textfield5" pattern="[A-Za-z ]+" required/>
                                </div>
                            </div>
                            <br />
                             <div class="row">
                                <div class="col-md-5">
                                    <p>Genero</p>
                                </div>
                                <div class="col-md-7">
                                    <select class="form-control" name="genero" id="select_genre">
                                      <option value="M" selected="selected">Masculino</option>
                                      <option value="F" >Femenino</option>
                                      <option value="O">Otro</option>
                                  </select>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Rol de usuario<p>
                                </div>
                                <div class="col-md-7">
                                    <select class="form-control" name="rol" id="select">
                                      <option value="Null"  selected="selected" >Seleccionar</option>
                                      <option value="Medico">Medico</option>
                                      <option value="Paciente" >Paciente</option>
                                      <option value="Admin">Administrador</option>
                                  </select>
                                  
                                </div>
                            </div>
                            <br /> 
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Tipo de documento<p>
                                </div>
                                <div class="col-md-7">
                                    <select class="form-control" name="tipo" id="select">
                                      <option value="Null"  selected="selected">Seleccionar</option>
                                      <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                      <option value="Cedula de ciudadania" >Cedula de ciudadania</option>
                                      <option value="Cedula extrajera">Cedula extrajera</option>
                                      <option value="Pasaporte">Pasaporte</option>
                                      <option value="Libreta Militar">Libreta Militar</option>
                                  </select>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Numero de documento</p>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="documento" id="textfield8" pattern="[0-9]+" required/>
                                </div>
                            </div>
                            <br />                             
                        </div>
                        <div class="col-md-6">            	
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Fecha de nacimiento</p>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" type="date" name="fecha" id="textfield7" />
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Correo Electronico</p>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" type="email" name="mail" id="textfield6" required/>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Contraseña</p>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" type="password" name="password" id="textfield9" required/>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Confirmar contraseña</p>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" type="password" name="confirmar" id="textfield10" required/>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <?php
                                include('database/conexion.php');
                                $sql1 = "SELECT * FROM entidad";
                                if(!$result1 = $db->query($sql1))
                                {
                                    die('error al ejecutar la sentencia ['. $db->error.']');
                                }
                                echo "
                                <div class='col-md-5'>
                                    <p>Entidad Optica/Oftalmologica<p>
                                </div>
                                <div class='col-md-7'>
                                     <select class='form-control' name='entidad' id='seleccionar entidad'>";
                                while($row1 = $result1->fetch_assoc())
                                {
                                    $id_entidad = stripslashes($row1["id_entidad"]);
                                    $nombre = stripslashes($row1["nombreEntidad"]);
                                ?>	
                                    
                                          <option value="<?php echo $id_entidad;?>"><?php echo $nombre;?></option>
                                      
                                <?php			
                                }
                                ?>   
                                    </select>
                                 </div>                                     
                            </div>
                            <br />
                        </div>
                        <br />
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <input class="btn btn-primary" type="submit" name="registro" value="Registrar"/></form>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    <?php include ('modules/footer.php'); ?>
                    <?php 
                       if(isset($_SESSION["errorRegistro"])){unset($_SESSION["errorRegistro"]);}
                       if(isset($_SESSION["reg"])){unset($_SESSION["reg"]);}
                       if(isset($_SESSION["next"])){unset($_SESSION["next"]);}
                    ?> 
                    <!-- --------- -->
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>