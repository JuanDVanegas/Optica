<?php
include('lib/fpdf.php');

class PDF extends FPDF
{
	function Header()
	{
		// Logo
		$this->Image('images/logo.png',10,8,33);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Movernos a la derecha
		$this->Cell(80);
		// Título
		$this->Cell(30,10,'Optica All in One',0,0,'C');
		// Salto de línea
		$this->Ln(20);
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,20,utf8_decode('Pagina '.$this->PageNo().' / {nb}'),0,0,'C');
		$this->Cell(0,20,utf8_decode('Fecha de expedición: '.date('d:m:Y')),0,0,'R'); 
		$this->SetY(-15);
		$this->Cell(0,20,utf8_decode('http://www.optica-all.com/menuAcercade.php'),0,0,'L'); 
	}
	// Cargar los datos
	function LoadData($file)
	{
		// Leer las líneas del fichero
		$lines = file($file);
		$data = array();
		foreach($lines as $line)
			$data[] = explode(';',trim($line));
		return $data;
	}
	// Tabla coloreada
	function FancyTable($id_registro,$id_medico)
	{
		include('database/conexion.php');

		$sql2 = "SELECT * FROM historial INNER JOIN registro ON historial.fk_registro=registro.id_registro WHERE fk_medico='$id_medico' AND fk_registro='$id_registro'";
		if(!$result2 = $db->query($sql2))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
		}
		else;
		if($row2 = $result2->fetch_assoc())
		{
			$id_historial = stripslashes($row2["id_historial"]);
			$fk_paciente = stripslashes($row2["fk_paciente"]);
			$lugar = stripslashes($row2["lugar"]);
			$fecha = stripslashes($row2["fecha"]);
			$id_registro = stripslashes($row2["id_registro"]);
			$descripcion = stripslashes($row2["descripcion"]);
			$resultado = stripslashes($row2["resultados"]);
			$tratamiento = stripslashes($row2["tratamiento"]);
		}
		else
		{
			header("Location: index.php");
		}

		$sql3 = "SELECT * FROM usuario WHERE id_usuario='$fk_paciente'";
		if(!$result3 = $db->query($sql3))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
		}
		else;
		if($row3 = $result3->fetch_assoc())
		{
			$nombreP = stripslashes($row3["nombre"]);
			$apellidoP = stripslashes($row3["apellido"]);
			$tipoP = stripslashes($row3["tipoDocumento"]);
			$documentoP = stripslashes($row3["numeroDocumento"]);
		}
		else;

		$sql4 = "SELECT * FROM usuario INNER JOIN entidad ON usuario.entidad = entidad.id_entidad WHERE id_usuario='$id_medico'";
		if(!$result4 = $db->query($sql4))
		{
			die('error al ejecutar la sentencia ['. $db->error.']');
		}
		else;
		if($row4 = $result4->fetch_assoc())
		{
			$nombreEntidad = stripslashes($row4["nombreEntidad"]);
			$address = stripslashes($row4["address"]);
			$nombreM = stripslashes($row4["nombre"]);
			$apellidoM = stripslashes($row4["apellido"]);
			$tipoM = stripslashes($row4["tipoDocumento"]);
			$documentoM = stripslashes($row4["numeroDocumento"]);
		}
		else;
		
		$this->SetFillColor(102,173,255);
		$this->SetTextColor(255,255,255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		
		$w = array(90,90);

		$this->Cell(180,7,'Detalles del registro',0,0,'C',true);
		$this->Ln();
		$this->Ln();
		// Restauración de colores y fuentes
		$this->SetFillColor(207,238,253);
		$this->SetTextColor(0);
		$this->SetFont('Arial','');
		// Datos
		$ancho1 = 60;
		$ancho = 120;
		$this->Cell($ancho1,6,'Fecha',1,'','L',true);
		$this->Cell($ancho,6,$fecha,1,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,'Lugar',1,'','L',true);
		$this->Cell($ancho,6,$lugar,1,'','L',false);
		$this->Ln();
		$this->Ln();
		$this->Cell($ancho1,6,utf8_decode('Información del Paciente'),0,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,'Nombre',1,'','L',true);
		$this->Cell($ancho,6,$nombreP,1,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,'Apellidos',1,'','L',true);
		$this->Cell($ancho,6,$apellidoP,1,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,'Tipo de Documento',1,'','L',true);
		$this->Cell($ancho,6,$tipoP,1,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,'Numero de Documento',1,'','L',true);
		$this->Cell($ancho,6,$documentoP,1,'','L',false);
		$this->Ln();
		$this->Ln();
		$this->Cell($ancho1,6,utf8_decode('Información del Medico'),0,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,'Nombre',1,'','L',true);
		$this->Cell($ancho,6,$nombreM,1,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,'Apellidos',1,'','L',true);
		$this->Cell($ancho,6,$apellidoM,1,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,'Tipo de Documento',1,'','L',true);
		$this->Cell($ancho,6,$tipoM,1,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,'Numero de Documento',1,'','L',true);
		$this->Cell($ancho,6,$documentoM,1,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,utf8_decode('Entidad Óptica u Oftalmologíca'),1,'','L',true);
		$this->Cell($ancho,6,$nombreEntidad,1,'','L',false);
		$this->Ln();
		$this->Cell($ancho1,6,utf8_decode('Dirección Entidad'),1,'','L',true);
		$this->Cell($ancho,6,$address,1,'','L',false);
		$this->Ln();
		$this->Ln();
		$this->MultiCell($ancho1,6,'Descripcion',1,'J',true);
		$this->MultiCell(180,6,utf8_decode($descripcion),1,'J',false);
		$this->Ln();
		$this->MultiCell($ancho1,6,'Resultado',1,'J',true);
		$this->MultiCell(180,6,utf8_decode($resultado),1,'J',false);
		$this->Ln();
		$this->MultiCell($ancho1,6,'Tratamiento',1,'J',true);
		$this->MultiCell(180,6,utf8_decode($tratamiento),1,'J',false);
		$this->Ln();
		// Línea de cierre
		$this->Cell(array_sum($w),0,'','T');
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->FancyTable($_GET["id_registro"],$_GET["id_medico"]);
if($_GET['action'] == 'download')
{
	$action = 'D';
}
if($_GET['action'] == 'view')
{
	$action = 'I';
}
$pdf->Output($action,'Reporte_'.$_GET['id_registro'].$_GET['id_medico'].'_'.date('d:m:Y').'_optica-all.com.pdf','utf8_decode');
?>
