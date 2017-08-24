<?php include('seguridad_usuarioAdministrador.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Medico <?php $_SESSION["nombre"];?> Optica All in One</title>
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
         	<?php include('cuentaAdminBanner.php');?>
         </div>
        <div class="row">
            <div class="col-md-3">
                <br />
                <?php include('cuentaAdminMenu.php')?>
            </div>
            <div class="col-md-9"> 
                <!--Nueva Insersion-->
                    <form action="actualizarDatos.php" method="post" name="formActualizarDatos">
                        <div class="row">
                            <div class="col-sm-offset-3 col-sm-4">
                                <p class="text-danger"><?php if(isset($_SESSION["resultActualizar"])){echo $_SESSION["resultActualizar"];unset($_SESSION["resultActualizar"]);}?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Nombre</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="nombre" value="<?php echo $_SESSION["nombre"];?>" required/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Apellido</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="apellido" value="<?php echo $_SESSION["apellido"];?>" required/>
                            </div>
                        </div>
                        <br />
                         <div class="row">
                            <div class="col-sm-3">
                                <p>Tipo de documento</p>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-control" name="tipoDocumento" id="select">
                                              <option value="<?php echo $_SESSION["tipoDocumento"];?>"  selected="selected"><?php echo $_SESSION["tipoDocumento"];?></option>
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
                            <div class="col-sm-3">
                                <p>Documento</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="numeroDocumento" pattern="+[0-9]" value="<?php echo $_SESSION["numeroDocumento"];?>" required/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Fecha de nacimiento</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="date" name="nacimiento" value="<?php echo $_SESSION["nacimiento"];?>" required/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Correo electronico</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="mail" name="correo" value="<?php echo $_SESSION["correoElectronico"];?>" readonly="readonly"/>
                            </div>
                        </div>
                        <br />
                         <div class="row">
                            <div class="col-sm-3">
                                <p>Telefono</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="telefono" pattern="+[0-9]" value="<?php echo $_SESSION["telefono"];?>"required/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="cuentaAdminPerfilPassword.php" target="_parent">Cambiar Contraseña</a><br />
                                <a href="cuentaAdminPerfilEmail.php" target="_parent">Modificar Correo Electronico</a>
                            </div>
                            <div class="col-sm-4">
                                <br />
                                <input class="btn btn-primary" type="submit" name="correo" value="Actualizar" />
                            </div>
                        </div>
                    </form> 
                    <!-- --------- -->
            </div>
        </div><?php include ('modules/footer.php'); ?>
     </div>     
  </body>
</html>
