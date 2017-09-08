<div class="vertical-menu">
 <a href="noticias.php" target="_parent">Noticias<span class="glyphicon glyphicon-home pull-right" aria-hidden="true" /></a>
 <?php 
 	if($_SESSION["rolUsuario"] == "Medico")
	{
		$target = md5('Medico');
			echo "<a href='historial.php?target_user=".$target."' target='_parent'>Historial<span class='glyphicon glyphicon-edit pull-right'
			 aria-hidden='true' /></a>";
	}
	else
	{
		if($_SESSION["rolUsuario"] == "Paciente")
		{
			$target = md5('Paciente');
			echo "<a href='historial.php?target_user=".$target."' target='_parent'>Historial<span class='glyphicon glyphicon-edit pull-right'
			 aria-hidden='true' /></a>";
		}
		else
		{
			echo "<a href='entidad.php' target='_parent'>Entidades<span class='glyphicon glyphicon-edit pull-right'
			 aria-hidden='true' /></a>
			 <a href='administrar_nuevo_usuario.php' target='_parent'>Nuevo Usuario<span class='glyphicon glyphicon-edit pull-right' 
			 aria-hidden='true' /></a>
 			<a href='administrar_estado.php' target='_parent'>Estado Usuario<span class='glyphicon glyphicon-edit pull-right'
			aria-hidden='true' /></a>";
		}
	}?>
 
 <a href="datos_personales.php" target="_parent">Configuración<span class="glyphicon glyphicon-user pull-right" aria-hidden="true" /></a>
</div>
