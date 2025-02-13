<!-- <div class="card">
    <div class="card-header">
        <h3>Pilih Mekanik</h3>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <input type="hidden" name="id_booking" value="<?= $_GET['id_booking'] ?>">
            <label for="" class="form-label">Mekanik</label>
            <select name="id_mekanik" class="form-control mb-3">
                <option value="">- Pilih Mekanik -</option>
                <?php
				$cek_mekanik = $conn->query("select * from mekanik where aktif='ya'");
				while ($data_mekanik = mysqli_fetch_assoc($cek_mekanik)) { ?>
                <option value="<?= $data_mekanik['id_mekanik'] ?>"><?= $data_mekanik['nama_mekanik'] ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="verify" class="btn btn-primary" value="Verify">
        </form>
    </div>
</div> -->

<?php
// if (isset($_POST['verify'])) {
// $id_booking = $_POST['id_booking'];
$id_booking = $_GET['id_booking'];
$id_mekanik = $_POST['id_mekanik'];
// $status = $antrian_baru['id_status'];
// $keterangan = $antrian_baru['id_keterangan'];

// $update = mysqli_query($conn, "UPDATE booking SET id_mekanik='$id_mekanik', status='DISETUJUI' where id_booking='$id_booking'");
$update = mysqli_query($conn, "UPDATE booking SET status='DISETUJUI' where id_booking='$id_booking'");
$query1 = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN jadwal ON booking.id_jadwal=jadwal.id_jadwal LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan WHERE booking.id_booking='$id_booking'");
$data = mysqli_fetch_assoc($query1);
// $insert = mysqli_query($conn, "INSERT INTO antrian VALUES ('$id_booking',0,0)");

$phone = '62' . $data['no_wa'];

$pesan = 'Booking anda dengan ID ' . $data['id_booking'] . ' *Berhasil*. Silahkan datang pada hari ' . $data['hari'] . ' tanggal ' . date('d-m-Y', strtotime($data['tgl_booking'])) . ' Jam ' . $data['jam'] . ' Tertanda : *Dean Motor*';


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
	$query = mysqli_query($conn, "INSERT INTO antrian (id_antrian, id_booking, id_status, id_keterangan) VALUES (NULL,'$id_booking',0,0)");

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
			window.location.replace('index.php?hl=booking');
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
			window.location.replace('index.php?hl=booking');
			} ,1000); 
			</script>";
}
// }

?>