<div class="row">
  <div class="col-md-8" >
    <div id="conversation" style="height:100%; border: 1px solid #CCCCCC; padding: 2%;  border-radius: 5px; overflow-x: hidden;">
    <table class="table" border="0">
<?php 
session_start();
include("database/conexion.php");

function formatearFecha($fecha)
{
  return date('g:i a',strtotime($fecha));
} 
$sql = "SELECT * FROM mensaje ORDER BY id_mensaje DESC";
$resultado = $db->query($sql);
while($row = $resultado->fetch_assoc())
{
	$usuario = $_SESSION["nombre"]." ".$_SESSION["apellido"];
	if($usuario == $row["emisor"])
	{
		$padding = "1%";
		$color = "blue";
	}
	else
	{
		$padding = "2%";
		$color = "#1c62c4";
	}
?>
		
		<tr>
			<td><span style="color:<?php echo $color;?>"><?php echo $row["emisor"];?></span></td>
			<td><span style="color:#848484"><?php echo $row["texto"];?></span></td>
			<td><span style="float:right;opacity:0.7;"><?php echo formatearFecha($row["fecha"]);?></span></td>
		</tr>
<?php } ?>
	</table>
    </div>
  </div>
</div>
