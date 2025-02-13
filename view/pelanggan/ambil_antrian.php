<?php
$query = mysqli_query($conn, "SELECT * from pelanggan where id_pelanggan ='$_SESSION[username]'");
$data  = mysqli_fetch_array($query);
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
	<div class="col-sm-12 col-md-12">


		<div class="card">
			<h3 class="card-header">Pendaftaran Mobil</h3>
			<div class="card-body">
				<form method="POST" action="" enctype="multipart/form-data">
					<div class="row mb-3">
						<input type="hidden" name="id_jadwal" value="<?= $_GET['id_jadwal'] ?>">
						<input type="hidden" name="tgl_booking" value="<?= $_GET['tgl'] ?>">
						<div class="col-3">
							<label for="id_motor" class="form-label">Merk Mobil</label>
							<input name="id_motor" type="text" class="form-control" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-3">
							<label for="" class="form-label">No Plat</label>
							<input name="no_plat" type="text" class="form-control" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-3">
							<label for="" class="form-label">Type Mobil</label>
							<select name="seri_mobil" class="form-control">
								<option selected>Pilih type mobil</option>
								<option value="matic">Matic</option>
								<option value="manual">Manual</option>
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-3">
							<label for="" class="form-label">Tahun Keluaran</label>
							<input name="tahun_keluaran" type="number" class="form-control" required>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-3">
							<label for="" class="form-label">Keluhan</label>
							<textarea name="keluhan" class="form-control" required></textarea>
						</div>
					</div>

					<div class="col-12">
						<input type="submit" value="Daftar" name="daftar" class="btn btn-success">
						<a href="?hl=booking" class="btn btn-secondary">Kembali</a>
					</div>

				</form>
			</div>

		</div>

	</div>




	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
	</script>
</body>

</html>



<?php
if (isset($_POST['daftar'])) {

	$query_id = mysqli_query($conn, "SELECT MAX(id_booking) AS last_id FROM booking");
	$last_id = mysqli_fetch_assoc($query_id)['last_id'];
	if ($last_id) {
		$last_digit = (int) substr($last_id, -3);
		$new_digit = $last_digit + 1;
		$digit = str_pad($new_digit, 3, '0', STR_PAD_LEFT);
	} else {
		$digit = '001';
	}

	$id_booking = 'BK' . $digit;
	$id_pelanggan = $_SESSION['id_pelanggan'];
	$tgl_booking = $_POST['tgl_booking'];
	$id_jadwal = $_POST['id_jadwal'];
	$id_motor = $_POST['id_motor'];
	$no_plat = $_POST['no_plat'];
	$seri_mobil = $_POST['seri_mobil'];
	$tahun_keluaran = $_POST['tahun_keluaran'];
	$keluhan = $_POST['keluhan'];

	$simpan = mysqli_query($conn, "INSERT INTO booking VALUES ('$id_booking','$id_pelanggan', '$id_jadwal', '$id_motor', '$tgl_booking',0,'$keluhan','PENDING', '$no_plat', '$seri_mobil', '$tahun_keluaran', NULL)");

	if ($simpan) {

		echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Sukses',
				text:  'Tunggu Verifikasi Admin !',
				icon: 'success',
				timer: 1000,
				showConfirmButton: true
			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=buktidaftar&id_booking=$id_booking');
			} ,1000); 
			</script>";
	} else {
		echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Failed',
				text:  'Booking Gagal !',
				icon: 'error',
				timer: 1000,
				showConfirmButton: true
			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=booking');
			} ,1000); 
			</script>";
	}
}

?>