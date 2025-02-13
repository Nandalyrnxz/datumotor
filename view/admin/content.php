<?php
$hl = $_GET['hl'];

if ($hl == 'home') {
	include "homepage.php";
} else if ($hl == 'addpelanggan') {
	include "addpelanggan.php";
} else if ($hl == 'ubah_pelanggan') {
	include "ubah_pelanggan.php";
} else if ($hl == 'delete_pelanggan') {
	include "delete_pelanggan.php";
} else if ($hl == 'pelanggan') {
	include "pelanggan.php";
} else if ($hl == 'addstatus') {
	include "addstatus.php";
} else if ($hl == 'ubah_status') {
	include "ubah_status.php";
} else if ($hl == 'delete_status') {
	include "delete_status.php";
} else if ($hl == 'status') {
	include "status.php";
} else if ($hl == 'addketerangan') {
	include "addketerangan.php";
} else if ($hl == 'ubah_keterangan') {
	include "ubah_keterangan.php";
} else if ($hl == 'delete_keterangan') {
	include "delete_keterangan.php";
} else if ($hl == 'keterangan') {
	include "keterangan.php";
} else if ($hl == 'addmekanik') {
	include "addmekanik.php";
} else if ($hl == 'ubah_mekanik') {
	include "ubah_mekanik.php";
} else if ($hl == 'delete_mekanik') {
	include "delete_mekanik.php";
} else if ($hl == 'mekanik') {
	include "mekanik.php";
} else if ($hl == 'detail_pelanggan') {
	include "detail_pelanggan.php";
} else if ($hl == 'konsultasi') {
	include "konsultasi.php";
} else if ($hl == 'konsultasi_publik') {
	include "konsultasi_publik.php";
} else if ($hl == 'booking') {
	include "booking.php";
} else if ($hl == 'booking_all') {
	include "booking_all.php";
} else if ($hl == 'antrian') {
	include "antrian.php";
} else if ($hl == 'ambil_antrian') {
	include "ambil_antrian.php";
} else if ($hl == 'responkonsultasi') {
	include "responkonsultasi.php";
} else if ($hl == 'saverespon') {
	include "save_respon.php";
} else if ($hl == 'update_status') {
	include "update_status.php";
} else if ($hl == 'simpandata') {
	include "simpandata.php";
} else if ($hl == 'simpankonsul') {
	include "simpankonsul.php";
} else if ($hl == 'buktidaftar') {
	include "buktidaftar.php";
} else if ($hl == 'buktidaftar2') {
	include "buktidaftar2.php";
} else if ($hl == 'verifikasi') {
	include "verifikasi.php";
} else if ($hl == 'motor') {
	include "motor.php";
} else if ($hl == 'addmotor') {
	include "addmotor.php";
} else if ($hl == 'ubah_motor') {
	include "ubah_motor.php";
} else if ($hl == 'delete_motor') {
	include "delete_motor.php";
} else if ($hl == 'admin') {
	include "admin.php";
} else if ($hl == 'addadmin') {
	include "addadmin.php";
} else if ($hl == 'ubah_admin') {
	include "ubah_admin.php";
} else if ($hl == 'delete_admin') {
	include "delete_admin.php";
} else if ($hl == 'riwayatbooking') {
	include "riwayatbooking.php";
} else if ($hl == 'riwayatkonsul') {
	include "riwayatkonsul.php";
} else if ($hl == 'jadwal') {
	include "jadwal.php";
} else if ($hl == 'addjadwal') {
	include "addjadwal.php";
} else if ($hl == 'ubah_jadwal') {
	include "ubah_jadwal.php";
} else if ($hl == 'delete_jadwal') {
	include "delete_jadwal.php";
} else if ($hl == 'profil') {
	include "profil.php";
} else if ($hl == 'ubah_profil') {
	include "ubah_profil.php";
} else if ($hl == 'ubah_respon') {
	include "ubah_respon.php";
} else if ($hl == 'hapus_kp') {
	include "delete_konsul.php";
} else if ($hl == 'tambah_pelayanan') {
	include "add_pelayanan.php";
} else if ($hl == 'suku_cadang') {
	include "suku_cadang.php";
} else if ($hl == 'addsukucadang') {
	include "addsukucadang.php";
} else if ($hl == 'ubah_sukucadang') {
	include "ubah_sukucadang.php";
} else if ($hl == 'delete_sukucadang') {
	include "delete_sukucadang.php";
} else if ($hl == 'transaksi') {
	include "transaksi.php";
} else if ($hl == 'verifikasi_transaksi') {
	include "verifikasi_transaksi.php";
} else if ($hl == 'transaksi_bulanan') {
	include "transaksi_bulanan.php";
} else if ($hl == 'transaksi_harian') {
	include "transaksi_harian.php";
} else if ($hl == 'transaksi_tahunan') {
	include "transaksi_tahunan.php";
}
