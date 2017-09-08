<div class="col-md-2 hidden-sm hidden-xs"> 
	<?php if($_SESSION["rolUsuario"] == "Medico")
	{
		$photo = "medico";
	}
	else
	{
		if($_SESSION["rolUsuario"] == "Paciente")
		{
			$photo = "paciente";
		}
		else
		{
			$photo = "administrador";
		}
	}?>
	<img src="images/<?php echo $photo?>.png" width="100%" height="10%0" style="float: left; padding-right: 10px; padding-top:12px">
</div>
<div class="col-md-10"> 
    <h1><?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?></h1>
    <h3><?php echo $_SESSION["nombreEntidad"];?></h3>
</div>