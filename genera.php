<?php
use \setasign\Fpdi\Fpdi;

require_once('assets/fpdf/fpdf.php');
require_once('assets/fpdi2/src/autoload.php');

$rutPac = $_POST['rutpaciente'];
$nomPac = utf8_decode($_POST['nombrepaciente']);
$apePac = utf8_decode($_POST['apellidopaciente']);
$rutRep = $_POST['rutrepresentante'];
$nomRep = utf8_decode($_POST['nombrerepresentante']);
$apeRep = utf8_decode($_POST['apellidorepresentante']);
$celRep = $_POST['celularrepresentante'];
$emaRep = utf8_decode($_POST['emailrepresentante']);
$nacRep = $_POST['nacionrepresentante'];

$fechaAcc = date_create($_POST['fechaaccidente']);
$fechaAcc = date_format($fechaAcc,"d/m/Y");
$horaAcc = $_POST['horaaccidente'];

$fechaDec = date_create($_POST['fechadeclaracion']);
$fechaDec = date_format($fechaDec,"d/m/Y");

$descAccL1 = utf8_decode($_POST['descripcionl1']);
$descAccL2 = utf8_decode($_POST['descripcionl2']);
$descAccL3 = utf8_decode($_POST['descripcionl3']);

// initiate FPDI
$pdf = new Fpdi();

// get the page count
$pdf->setSourceFile('declaracion.pdf');
$pdf->SetTextColor(4, 11, 240);
$pdf->SetFont('Helvetica');

$templateId = $pdf->importPage(1);
$pdf->AddPage();
$pdf->useTemplate($templateId, ['adjustPageSize' => true]);

$pdf->SetXY(92, 38);
$pdf->Write(3,$nomPac . " " . $apePac);

$pdf->SetXY(92, 42.2);
$pdf->Write(3,$rutPac);

$pdf->SetXY(92, 46.5);
$pdf->Write(3,$fechaAcc);

$pdf->SetXY(92, 50.8);
$pdf->Write(3,$horaAcc);

$pdf->SetXY(31, 124);
$pdf->Write(3,$descAccL1);

$pdf->SetXY(31, 130);
$pdf->Write(3,$descAccL2);

$pdf->SetXY(31, 136);
$pdf->Write(3,$descAccL3);


$pdf->SetXY(100, 205);
$pdf->Write(3, $nomRep ." " . $apeRep);

$pdf->SetXY(100, 211);
$pdf->Write(3, $rutRep);

$pdf->SetXY(100, 217);
$pdf->Write(3, $celRep);

$pdf->SetXY(100, 223);
$pdf->Write(3, $emaRep);

$pdf->SetXY(100, 229);
$pdf->Write(3, $fechaDec);


$templateId = $pdf->importPage(2);
$pdf->AddPage();
$pdf->useTemplate($templateId, ['adjustPageSize' => true]);

$pdf->SetXY(38, 44.5);
$pdf->Write(3, $nomRep . " " . $apeRep);

$pdf->SetXY(59, 53);
$pdf->Write(3, $nacRep);

$pdf->SetXY(137, 53);
$pdf->Write(3, $rutRep);

$templateId = $pdf->importPage(3);
$pdf->AddPage();
$pdf->useTemplate($templateId, ['adjustPageSize' => true]);

$pdf->SetXY(92, 48.5);
$pdf->Write(3, $nomRep . " " . $apeRep);

$pdf->SetXY(92, 56.5);
$pdf->Write(3, $rutRep);

$pdf->SetXY(92, 64.5);
$pdf->Write(3, $celRep);

$pdf->SetXY(92, 80.5);
$pdf->Write(3, $emaRep);


$pdf->Output('F','pdfs/seguro.pdf');

header('Location:index.php');