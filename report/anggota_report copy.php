<?php 
include '../assets/fpdf.php';
include '../config/koneksi.php';

$pdf = new FPDF("P", "cm", "A4");
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', '11');
$pdf->Cell(19, 1, 'Koperasi Mamang Ajang', 0, 1, 'C');
$pdf->SetFont('Arial', '', '11');
$pdf->Cell(19, 1, 'Alamat: Jl. A. Yani Sebelah Richeese', 0, 1, 'C');
$pdf->Line(1, 3, 19, 3);
$pdf->SetFont('Arial', 'B', '11');
$pdf->Ln();
$pdf->Cell(19, 1, 'Laporan Data Anggota Koperasi', 0, 1, 'C');
$pdf->Cell(1, 1, 'No', 1, 0, 'C');
$pdf->Cell(4, 1, 'NIK KTP', 1, 0, 'C');
$pdf->Cell(6, 1, 'Nama Lengkap', 1, 0, 'C');
$pdf->Cell(5, 1, 'Alamat', 1, 0, 'C');
$pdf->Cell(3, 1, 'No Hp', 1, 1, 'C');
$query = $connect->query("SELECT * FROM anggota");
$no = 1;
$pdf->SetFont('Arial', '', '11');
while ($row = $query->fetch_assoc()) {
    $pdf->Cell(1, 1, $no++, 1, 0, 'C');
    $pdf->Cell(4, 1, $row['nik_ktp'], 1, 0, 'C');
    $pdf->Cell(6, 1, $row['nama_lengkap'], 1, 0, 'C');
    $pdf->Cell(5, 1, $row['alamat'], 1, 0, 'C');
    $pdf->Cell(3, 1, $row['no_hp'], 1, 1, 'C');
}
$pdf->Output("I", 'laporan_anggota');

?>