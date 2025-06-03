<?php 
include '../assets/fpdf.php';
include '../config/koneksi.php';

$pdf = new FPDF("P", "cm", "A4");
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', '11');
$pdf->Cell(19, 1, 'Koperasi Mamang Ajang', 0, 1, 'C');
$pdf->SetFont('Arial','','11');
$pdf->Cell(19,1,'Alamat: jl. Pandawa 5 No.1',0,1,'C');
$pdf->Line(1,3,19,3);
$pdf->SetFont('Arial','B','11');
$pdf->Ln();
$pdf->Cell(19,1,'Laporan Data Anggota Koperasi',0,1,'C');
$pdf->Cell(1,1,'No',1,0,'C');
$pdf->Cell(4,1,'NIK KTP',1,0,'C');
$pdf->Cell(6,1,'Nama Lengkap',1,0,'C');
$pdf->Cell(5,1,'Alamat',1,0,'C');

?>