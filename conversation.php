<div class="row">
  <div class="col-md-8" >
    <div id="conversation" style="height:100%; border: 1px solid #CCCCCC; padding: 2%;  border-radius: 5px; overflow-x: hidden;">
    <table class="table" border="0">
<?php 
function formatearFecha($fecha)
{
  return date('g:i a',strtotime($fecha));
} 
$emisorXReceptor = $_SESSION["id_usuario"];
$sqlEmisor = "SELECT * FROM mensaje m INNER JOIN usuario u ON m.emisor = u.id_usuario  WHERE emisor = '$emisorXReceptor' OR receptor = '$emisorXReceptor' ORDER BY fecha DESC";

$resultadoEmisor = $db->query($sqlEmisor);
while($row = $resultadoEmisor->fetch_assoc())
{

	$usuario = $_SESSION["nombre"];
	$nombreEmisor = $row["nombre"];
	$texto = $row["texto"];
	if($usuario == $nombreEmisor)
	{
		$padding = "0%";
		$color = "blue";
	}
	else
	{
		$padding = "5%";
		$color = "#1c62c4";
	}
?>
		
		<tr>
			<td><span style="color:<?php echo $color?>;padding: <?php echo $padding;?>"><?php echo $nombreEmisor;?></span></td>
			<td><span style="color:#848484"><?php echo $texto;?></span></td>
			<td><span style="float:right;opacity:0.7;"><?php echo formatearFecha($row["fecha"]);?></span></td>
		</tr>
<?php 
}
?>
	</table>
    </div>
  </div>
</div>
