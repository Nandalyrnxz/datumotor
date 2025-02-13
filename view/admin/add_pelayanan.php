<div class="col-sm-12 col-md-12">
	<div class="card">
		<div class="card-header">
			<h3>Tambah Pelayanan</h3>
		</div>
		<div class="card-body">
			<form action="" method="POST">
				<div class="table-responsive">
					<table class="table">
						<tr>
							<td>Jenis Pelayanan</td>
							<input type="hidden" name="id_booking" value="<?= $_GET['id'] ?>">
							<td><textarea name="jenis" class="form-control" cols="30" rows="6"></textarea>
							</td>
						</tr>

						<tr>
							<td>Total Biaya</td>
							<td><input type="number" name="biaya" class="form-control">
							</td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="simpan" value="Simpan" class="btn btn-block btn-success" required></td>
						</tr>
					</table>

			</form>

		</div>
	</div>



	<?php
	if (isset($_POST['simpan'])) {

		$id = $_POST['id_booking'];
		$jenis = $_POST['jenis'];
		$biaya = $_POST['biaya'];
		$cek = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_booking = '$id'");

		if (mysqli_num_rows($cek) == empty($cek)) {

			$simpan = mysqli_query($conn, "INSERT INTO pelayanan VALUES (NULL,'$id','$jenis','$biaya')");

			if ($simpan) {
				echo "<script type='text/javascript'>
								setTimeout(function () {  
								swal({
									title: 'Sukses',
									text:  'Pelayanan ditambahkan !',
									icon: 'success',
									timer: 1000,
									showConfirmButton: true
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
									text:  'Pelayanan gagal ditambahkan!',
									icon: 'error',
									timer: 1000,
									showConfirmButton: true
								});  
								},10); 
								window.setTimeout(function(){ 
								window.location.replace('index.php?hl=antrian');
								} ,1000); 
								</script>";
			}
		} else {
			$query = $conn->query("UPDATE pelayanan SET jenis_pelayanan='$jenis', biaya='$biaya' WHERE id_booking='$id'");
			if ($query) {
				echo "<script type='text/javascript'>
								setTimeout(function () {  
								swal({
									title: 'Sukses',
									text:  'Pelayanan berhasil diperbarui!',
									icon: 'success',
									timer: 1000,
									showConfirmButton: true
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
									text:  'gagal mengubah jenis pelayanan !',
									icon: 'error',
									timer: 1000,
									showConfirmButton: true
								});  
								},10); 
								window.setTimeout(function(){ 
								window.location.replace('index.php?hl=antrian');
								} ,1000); 
								</script>";
			}
		}
	}
	?>