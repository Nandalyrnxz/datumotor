<!--<?php
	// $id=$_GET['id_antrian'];
	// $query=mysqli_query($conn,"SELECT * FROM antrian where id_antrian='$id'");
	// $data=mysqli_fetch_assoc($query);
	// 
	?>

<div class="col-sm-12 col-md-12">
	<div class="card">
		<h3>Konfirmasi</h3>
	</div>
	<div class="card-body">
		<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
			<input type="hidden" name="id_antrian" value="<?= $data['id_antrian'] ?>">

			<tr>
				<td>Keterangan</td>
				<td>
					<select name="id_keterangan" class="form-control">
						<?php
						$cek_motor = mysqli_query($conn, "SELECT * FROM keterangan_antrian LEFT JOIN status_antrian ON keterangan_antrian.id_status=status_antrian.id_status WHERE status_antrian='SELESAI'");
						while ($dm = mysqli_fetch_assoc($cek_motor)) { ?>
						<option value="<?= $dm['id_keterangan'] ?>" <?php if ($dm['keterangan'] == $data['di_keterangan']) echo "selected"; ?>><?= $dm['keterangan'] ?></option>
						<?php } ?>	
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<input type="submit" name="update" value="Update" class="btn btn-block btn-success" required>
				</td>
			</tr>
		</table>
	</form>

	</div>-->

<?php
$id = $_GET['id_antrian'];
//$ket=$_POST['id_keterangan'];

$update = mysqli_query($conn, "UPDATE antrian SET id_keterangan='17' WHERE id_antrian='$id'");
if ($update) {

	echo "<script type='text/javascript'>
					setTimeout(function () {  
					swal({
						title: 'Sukses',
						text:  'Data Berhasil Diubah !',
						icon: 'success',
						timer: 1000,
						showConfirmButton: true
					});  
					},10); 
					window.setTimeout(function(){ 
					window.location.replace('index.php?hl=antrian&bag=pending');
					} ,1000); 
					</script>";
} else {
	echo "<script type='text/javascript'>
					setTimeout(function () {  
					swal({
						title: 'Failed',
						text:  'Data gagal Diubah !',
						icon: 'error',
						timer: 1000,
						showConfirmButton: true
					});  
					},10); 
					window.setTimeout(function(){ 
					window.location.replace('index.php?hl=antrian&bag=pending');
					} ,1000); 
					</script>";
}

//}
?>