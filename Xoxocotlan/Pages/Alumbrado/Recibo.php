<?php
	// Indicacion que solita el doc fpdf de la libreria fpdf
	require('../ReciboPDF/fpdf.php');
	// creacion de la clase para el diseño del ticket
	class PDF extends FPDF
	{
		// Cabecera de página
		function Header()
		{
			// Arial bold 15
			$this->SetFont('Times','B',15);
			// Título
			$this->SetTextColor(80,7,63,255);
			$this->Image('../../Images and icons/logo.jpg',175,0,35,38,'JPG');
			$this->Ln(10);
			$this->Cell(0,10,'****Municipio de San Nazareno****',0,0,'C');
			$this->Ln();
			$this->Cell(0,10,'Direccion: Nazareno Xoxocotlan',0,0,'C');
			$this->Ln();
			$this->Cell(0,10,'NIF:B-0000000',0,0,'C');
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
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
	

	// Lineas del pdf que con permite imprimir el encabezado y un poco más el diseño 
	$pdf = new PDF();
	$pdf->SetFont('Courier','B',13);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	require ("../cn.php");
	$sql="SELECT * FROM ayuda";
	$consulta=mysqli_query($conexion,$sql);
	if ($consulta) {
		// Conversion de la consulta a un tipo de dato
		$valor=mysqli_fetch_row($consulta);
	}
	// Impresion de folio de ticket, ticket final obtenido en la primer consulta
	$pdf->SetTextColor(173,37,45,255);
	$pdf->Cell(0,10,'Numero de toma: ',0,0,'C',0);
	$pdf->Ln();
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(0,10,''.$valor[0],0,0,'C',0);
	$pdf->Ln();
	$sql="SELECT * FROM habitantes WHERE num_toma='$valor[0]'";
	$consulta=mysqli_query($conexion,$sql);
	// Conversion de la consulta a un tipo de dato
	if($habitantes=mysqli_fetch_array($consulta)){
		$pdf->SetTextColor(173,37,45,255);
		$pdf->Cell(0,10,'Propietario: ',0,0,'C',0);
		$pdf->Ln();
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Cell(0,10,''.$habitantes['nombre'].' '.$habitantes['apellido_p'].' '.$habitantes['apellido_m'],0,0,'C',0);
		$pdf->Ln();
	}
	$sql="SELECT * FROM domicilio WHERE id_domicilio='$habitantes[id_domicilio]'";
    $consulta=mysqli_query($conexion,$sql);
	if ($consulta) {
		if($domicilio=mysqli_fetch_array($consulta)){
			$pdf->SetTextColor(173,37,45,255);
			$pdf->Cell(0,10,'Domicilio: ',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetTextColor(0, 0, 0);
			$pdf->Cell(0,10,''.$domicilio['colonia'].', '.$domicilio['calle'].', No.'.$domicilio['num_casa'],0,0,'C',0);
			$pdf->Ln();
		}
	}
	$pdf->SetTextColor(173,37,45,255);
	$pdf->Cell(0,10,'Pago del año: ',0,0,'C',0);
	$sql="SELECT anio FROM alumbrado WHERE num_toma='$valor[0]' ORDER BY num_toma DESC LIMIT 1";
	$consulta=mysqli_query($conexion,$sql);
	$anio=mysqli_fetch_row($consulta);
	$pdf->Ln();
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(0,10,''.$anio[0],0,0,'C',0);
	$pdf->Ln();
	$pdf->SetTextColor(173,37,45,255);
	$pdf->Cell(0,10,'Cantidad a pagar: ',0,0,'C',0);
	$sql="SELECT cantidad FROM alumbrado WHERE num_toma='$valor[0]' ORDER BY num_toma DESC LIMIT 1";
	$consulta=mysqli_query($conexion,$sql);
	$pagado=mysqli_fetch_row($consulta);
	$pdf->Ln();
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(0,10,''.$pagado[0],0,0,'C',0);
	$pdf->Ln();
	$pdf->SetTextColor(173,37,45,255);
	$pdf->Cell(0,10,'Cantidad recibida: ',0,0,'C',0);
	$sql="SELECT pagado FROM alumbrado WHERE num_toma='$valor[0]' ORDER BY num_toma DESC LIMIT 1";
	$consulta=mysqli_query($conexion,$sql);
	$recibida=mysqli_fetch_row($consulta);
	$pdf->Ln();
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(0,10,''.$recibida[0],0,0,'C',0);
	$pdf->Ln();
	$pdf->SetTextColor(173,37,45,255);
	$pdf->Cell(0,10,'Cambio: ',0,0,'C',0);
	$sql="SELECT cambio FROM alumbrado WHERE num_toma='$valor[0]' ORDER BY num_toma DESC LIMIT 1";
	$consulta=mysqli_query($conexion,$sql);
	$cambio=mysqli_fetch_row($consulta);
	$pdf->Ln();
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(0,10,''.$cambio[0],0,0,'C',0);
	$pdf->Ln();
	$pdf->SetTextColor(173,37,45,255);
	$pdf->Cell(0,10,'Fecha de pago: ',0,0,'C',0);
	$sql="SELECT fecha FROM alumbrado WHERE num_toma='$valor[0]' ORDER BY num_toma DESC LIMIT 1";
	$consulta=mysqli_query($conexion,$sql);
	$fecha=mysqli_fetch_row($consulta);
	$pdf->Ln();
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(0,10,''.$fecha[0],0,0,'C',0);
	$pdf->Ln();
	$sql="DELETE FROM ayuda";
    $consulta=mysqli_query($conexion,$sql);
	// Salida de todo lo que se espera imprimir
	$pdf->Output();
?>