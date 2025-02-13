<?php

$id_booking = $_GET['id_booking'];


$update = mysqli_query($conn, "UPDATE pembayaran SET status='DISETUJUI' where id_booking='$id_booking'");
$query1 = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan WHERE booking.id_booking='$id_booking'");
$data = mysqli_fetch_assoc($query1);

$phone = '62' . $data['no_wa'];

$pesan = 'Pembayaran anda dengan ID BOOKING ' . $data['id_booking'] . ' *Distujui*. Terima Kasih Sudah Menggunakan Jasa Kami ' . ' Tertanda : *Zul Motor*';


$curl = curl_init();
$token = "1lFOZ632kZZC9X4xcDjJ6uSB7zoTh91MDhY65qtLPpUb4WBKAmMo3hjzEeEecFKx";
$random = true;
$payload = [
	"data" => [
		[
			'phone' => $phone,
			'message' => $pesan,
		]
	]
];
curl_setopt(
	$curl,
	CURLOPT_HTTPHEADER,
	array(
		"Authorization: $token",
		"Content-Type: application/json"
	)
);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($curl, CURLOPT_URL,  "https://kudus.wablas.com/api/v2/send-message");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($curl);
curl_close($curl);
// echo "<pre>";
// print_r($result);

if ($update) {

	echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Sukses',
				text:  'Verifikasi Berhasil !',
				icon: 'success',
				timer: 1000,
			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=transaksi');
			} ,1000); 
			</script>";
} else {
	echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Failed',
				text:  'Verifikasi gagal !',
				icon: 'error',
				timer: 1000,

			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=transaksi');
			} ,1000); 
			</script>";
}