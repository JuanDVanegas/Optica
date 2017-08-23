<div class="col-md-2 hidden-sm hidden-xs"> 
	<?php if($_SESSION["genero"] == "M"){$photo="images/paciente_man.png";}
	if($_SESSION["genero"] == "F"){$photo="images/paciente_woman.png";}?>
	<img src="<?php echo $photo;?>" width="100%" height="10%0" style="float: left; padding-right: 10px; padding-top:12px">
</div>
<div class="col-md-10"> 
    <h1><?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?></h1>
</div>