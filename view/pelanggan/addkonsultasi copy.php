<?php
$query = mysqli_query($conn, "SELECT * from pelanggan where id_pelanggan = '$_SESSION[id_pelanggan]'");
$data1  = mysqli_fetch_assoc($query);
?>
<div class="col-sm-12 col-md-12">
	<div class="card">
		<div class="card-header">
			<h3>Tambah Konsultasi</h3>
		</div>
		<div class="card-body">
			<form method="post" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-6">
						<label for="">Merk Mobil</label>
						<input type="text" name="id_mobil" class="form-control mb-3">
					</div>
					<div class="col-lg-6">
						<label for="">Tahun Keluaran</label>
						<input type="text" name="tahun" class="form-control mb-3">
					</div>
					<div class="col-lg-6 mb-3">
						<label for="">Tingkat Kerusakan</label>
						<select name="kerusakan" id="" class="form-control">
							<option selected>Pilih tingkat kerusakan</option>
							<option value="ringan">Ringan</option>
							<option value="sedang">Sedang</option>
							<option value="berat">Berat</option>
						</select>
					</div>
					<div class="col-lg-12">
						<label for="">Keluhan</label>
						<textarea name="keluhan" cols="30" rows="5" class="form-control mb-3"></textarea>
					</div>
					<div class="col-lg-12">
						<input type="submit" value="Simpan" name="konsul" class="btn btn-sm btn-success">
						<a href="?hl=konsultasi" class="btn btn-sm btn-secondary">Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
if (isset($_POST['konsul'])) {
	$id_mobil = $_POST['id_mobil'];
	$keluhan = $_POST['keluhan'];
	$kerusakan = $_POST['kerusakan'];
	$tahun = $_POST['tahun'];
	$tgl = date('Y-m-d');
	$id_pelanggan = $_SESSION['id_pelanggan'];
	$status = 'BELUM DIRESPON';

	$simpan = mysqli_query($conn, "INSERT INTO konsultasi VALUES (NULL, '$id_pelanggan', '$id_mobil', '$tahun', '$tgl', '$keluhan', '$kerusakan', '$fileName', '$status')");

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

	if ($simpan) {

		echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Sukses',
				text:  'Tunggu Jawaban Admin !',
				icon: 'success',
				timer: 1000,
				showConfirmButton: true
			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=konsultasi');
			} ,1000); 
			</script>";
	} else {
		echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Gagal',
				text:  'Konsultasi gagal disimpan !',
				icon: 'error',
				timer: 1000,
				showConfirmButton: true
			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=konsultasi');
			} ,1000); 
			</script>";
	}
}

?>