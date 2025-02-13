<?php
$hl = $_GET['hl'];

if ($hl == 'home') {
	include "homepage.php";
} else if ($hl == 'konsultasi') {
	include "konsultasi.php";
} else if ($hl == 'antrian') {
	include "antrian.php";
} else if ($hl == 'rekammedik') {
	include "cekrekammedik.php";
} else if ($hl == 'detailrekammedik') {
	include "detailrekammedik.php";
} else if ($hl == 'booking') {
	include "booking.php";
} else if ($hl == 'antrian') {
	include "cekantrian.php";
} else if ($hl == 'resultantrian') {
	include "antrian.php";
} else if ($hl == 'buktidaftar') {
	include "buktidaftar.php";
} else if ($hl == 'buktidaftar2') {
	include "buktidaftar2.php";
} else if ($hl == 'editkonsultasi') {
	include "editkonsultasi.php";
} else if ($hl == 'addkonsultasi') {
	include "addkonsultasi.php";
} else if ($hl == 'hapuskonsultasi') {
	include "hapuskonsultasi.php";
} else if ($hl == 'responkonsultasi') {
	include "responkonsultasi.php";
} else if ($hl == 'save_respon') {
	include "save_respon.php";
} else if ($hl == 'ambil_data') {
	include "ambil_data.php";
} else if ($hl == 'ambil_antrian') {
	include "ambil_antrian.php";
} else if ($hl == 'ambil_konsul') {
	include "ambil_konsul.php";
} else if ($hl == 'riwayatbooking') {
	include "riwayat.php";
} else if ($hl == 'detailriwayat') {
	include "detailriwayat.php";
} else if ($hl == 'profil') {
	include "profil.php";
} else if ($hl == 'ubah_profil') {
	include "ubah_profil.php";
} else if ($hl == 'konfirmasi_jemput') {
	include "konfirmasi_jemput.php";
} else if ($hl == 'konfirmasi_inap') {
	include "konfirmasi_inap.php";
} else if ($hl == 'detail_booking') {
	include "detail_booking.php";
} else if ($hl == 'motor') {
	include "motor.php";
} else if ($hl == 'editmotor') {
	include "ubah_motor.php";
} else if ($hl == 'addmotor') {
	include "addmotor.php";
} else if ($hl == 'hapusmotor') {
	include "delete_motor.php";
} else if ($hl == 'suku_cadang') {
	include "suku_cadang.php";
} else if ($hl == 'jumlah_pembelian') {
	include "jumlah_pembelian.php";
} else if ($hl == 'pembayaran') {
	include "pembayaran.php";
} else if ($hl == 'delete_pembayaran') {
	include "delete_pembayaran.php";
} else if ($hl == 'checkout') {
	include "checkout.php";
}