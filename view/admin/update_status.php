<?php
$id_antrian = $_POST['id_antrian'];
$id_booking = $_POST['id_booking'];
$status = $_POST['status'];
$mekanik = $_POST['mekanik'];
$keterangan = $_POST['keterangan'];


$update = mysqli_query($conn, "UPDATE antrian SET id_status='$status',id_keterangan='$keterangan' where id_antrian='$id_antrian'");
$update2 = mysqli_query($conn, "UPDATE booking SET id_mekanik='$mekanik' where id_booking='$id_booking'");
$query = mysqli_query($conn, "SELECT * FROM antrian lEFT JOIN status_antrian ON antrian.id_status=status_antrian.id_status LEFT JOIN keterangan_antrian ON antrian.id_keterangan=keterangan_antrian.id_keterangan LEFT JOIN booking ON antrian.id_booking=booking.id_booking LEFT JOIN jadwal ON booking.id_jadwal=jadwal.id_jadwal LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan WHERE antrian.id_antrian='$id_antrian'");
$data = mysqli_fetch_assoc($query);
$waktu_booking = date('Y-m-d') . ' ' . $data['jam'] . ':00';
$waktu_sekarang = date('Y-m-d H:i:s');
$awal  = strtotime($waktu_sekarang);
$akhir = strtotime($waktu_booking);

$diff  = $akhir - $awal;

$jam   = floor($diff / (60 * 60));

$menit = $diff - $jam * (60 * 60);

$waktu_tunggu = $jam .  ' jam, ' . floor($menit / 60) . ' menit';

$phone = '62' . $data['no_wa'];
if ($data['status_antrian'] == 'MENUNGGU') {
	$pesan = 'Status Antrian *' . $data['status_antrian'] . '* . Keterangan : ' . $data['keterangan'] . ' Waktu Tunggu : ' . $waktu_tunggu . '. Tertanda : *Datu Motor*';
} else {
	$pesan = 'Status Antrian *' . $data['status_antrian'] . '* . Keterangan : ' . $data['keterangan'] . '. Tertanda : *Datu Motor*';
}

if ($data['status_antrian'] == 'SELESAI') {
	$select = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_booking = '$data[id_booking]'");
	$hasil = mysqli_fetch_assoc($select);

	$pesan = 'Status Antrian *' . $data['status_antrian'] . '* . Keterangan : ' . $data['keterangan'] . ' Jenis Pelayanan : ' . $hasil['jenis_pelayanan'] . 'Biaya : ' . $hasil['biaya'] . '. Tertanda : *Datu Motor*' . 'Note: Silahkan lakukan service 4 bulan sekali';
}

$token = "93RgRMXwG48TSs7uLJrN";

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://api.fonnte.com/send',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => array(
		'target' => $phone,
		'message' => $pesan,

	),
	CURLOPT_HTTPHEADER => array(
		"Authorization: $token"
	),
	CURLOPT_SSL_VERIFYPEER => false, // Nonaktifkan verifikasi SSL

));

$response = curl_exec($curl);

curl_close($curl);


if ($update) {

	echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Sukses',
				text:  'Status Antrian diperbarui !',
				icon: 'success',
				timer: 1000,
			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=antrian');
			} ,1000); 
			</script>";
} else {
	echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Failed',
				text:  'Update Status Gagal !',
				icon: 'error',
				timer: 1000,

			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=antrian');
			} ,1000); 
			</script>";
}
