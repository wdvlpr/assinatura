<?php
$assinatura = $_POST['image'];
$assinatura = str_replace('data:image/png;base64,', '', $assinatura);
$assinatura = str_replace(' ', '+', $assinatura);
$data = base64_decode($assinatura);
$time = time();
file_put_contents($time.'.png', $data);

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Recibo!',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'Texto do recibo.',0,1,'L');

$pdf->Image($time.'.png', 0, 0, 300, 150);

$pdf->Cell(0,10,'_________________________');
//$pdf->Output();
$pdf->Output('F', $time.'.pdf');

echo $time;

?>