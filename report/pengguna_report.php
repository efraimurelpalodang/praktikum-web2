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
$pdf->Ln(0.5); // Spasi sebelum tabel
$pdf->Cell(19, 1, 'Laporan Data Pengguna Koperasi', 0, 1, 'C');

// HEADER TABEL (4 KOLOM)
$pdf->Cell(2, 1, 'No', 1, 0, 'C');           // Lebar 2 cm
$pdf->Cell(5, 1, 'Username', 1, 0, 'C');      // Lebar 5 cm
$pdf->Cell(6, 1, 'Role', 1, 0, 'C');          // Lebar 6 cm
$pdf->Cell(6, 1, 'Login Terakhir', 1, 1, 'C'); // Lebar 6 cm (1 di akhir untuk new line)

// DATA TABEL
$query = $connect->query("SELECT username, role, login_terakhir FROM pengguna"); // Hanya ambil 3 field (+ No)
$no = 1;
$pdf->SetFont('Arial', '', '11');
while ($row = $query->fetch_assoc()) {
    $pdf->Cell(2, 1, $no++, 1, 0, 'C');
    $pdf->Cell(5, 1, $row['username'], 1, 0, 'C');
    $pdf->Cell(6, 1, $row['role'], 1, 0, 'C');
    $pdf->Cell(6, 1, $row['login_terakhir'], 1, 1, 'C'); // 1 di akhir untuk baris baru
}

$pdf->Output("I", 'laporan_pengguna.pdf');
?>