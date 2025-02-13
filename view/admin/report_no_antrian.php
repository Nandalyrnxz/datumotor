<?php
include "../../koneksi.php";
// memanggil library FPDF
require('../../dist/fpdf181/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('logo.png');
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(40, 10, 'No Antrian Bengkel Datu Motor');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 8);
date_default_timezone_set('Asia/Jakarta');
$pdf->Cell(35, 6, 'Tanggal :' . date('d-M-Y'), 0, 0);
$pdf->Cell(10, 6, 'Jam :' . date('h:ia'), 0, 1);
$pdf->Cell(10, 9, '', 0, 1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 6, 'Id Booking', 1, 0);
$pdf->Cell(25, 6, 'Hari', 1, 0);
$pdf->Cell(25, 6, 'Jam', 1, 0);
$pdf->Cell(25, 6, 'Tanggal', 1, 0);
$pdf->Cell(25, 6, 'Status', 1, 0);


$pdf->SetFont('Arial', '', 8);

include '../../koneksi.php';
$no = $_GET['no'];
$rm = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN jadwal ON jadwal.id_jadwal=booking.id_jadwal WHERE booking.id_booking ='$_GET[id_booking]' and booking.id_booking ='$no' booking.status = 'WAIT' ");
$data  = mysqli_fetch_array($query);

$pdf->Cell(25, 6, $data['id_booking'], 1, 0);
$pdf->Cell(25, 6, $data['hari'], 1, 0);
$pdf->Cell(25, 6, $data['jam'], 1, 0);
$pdf->Cell(25, 6, $data['tgl_booking'], 1, 0);
$pdf->Cell(25, 6, $data['status'], 1, 0);



$pdf->Output();
