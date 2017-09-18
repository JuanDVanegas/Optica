<div class="vertical-menu">
 <a href="noticias" target="_parent">Noticias<span class="glyphicon glyphicon-globe pull-right" aria-hidden="true" /></a>
 <?php 
 	if($_SESSION["rolUsuario"] == "Medico")
	{
		$target = md5('Medico');
			echo "<a href='historial?target_user=".$target."' target='_parent'>Historial<span class='glyphicon glyphicon-list-alt pull-right'
			 aria-hidden='true' /></a>";
	}
	else
	{
		if($_SESSION["rolUsuario"] == "Paciente")
		{
			$target = md5('Paciente');
			echo "<a href='historial?target_user=".$target."' target='_parent'>Historial<span class='glyphicon glyphicon-list-alt pull-right'
			 aria-hidden='true' /></a>";
		}
		else
		{
			echo "<a href='entidad' target='_parent'>Entidades<span class='glyphicon glyphicon-plus pull-right'
			 aria-hidden='true' /></a>
			 <a href='administrar_nuevo_usuario' target='_parent'>Nuevo Usuario<span class='glyphicon glyphicon-user pull-right' 
			 aria-hidden='true' /></a>
 			<a href='administrar_estado' target='_parent'>Estado Usuario<span class='glyphicon glyphicon-user pull-right'
			aria-hidden='true' /></a>";
		}
	}?>
 
 <a href="datos_personales" target="_parent">Configuración<span class="glyphicon glyphicon-cog pull-right" aria-hidden="true" /></a>
</div>
