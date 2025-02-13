<?php
$id=$_GET['idkp'];
$query=mysqli_query($conn,"SELECT * FROM konsultasi_publik where id_kp='$id'");
$data=mysqli_fetch_assoc($query);
?>

<div class="col-sm-12 col-md-12">
	<div class="card">
		<h3>Respon Konsultasi Publik</h3>
	</div>
	<div class="card-body">
		<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Tanggal</td>
				<td>
					<input type="hidden" name="id_kp" value="<?= $data['id_kp'] ?>">
					<input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal_kp']; ?>"></td>
			</tr>
			<tr>
				<td>Pelanggan</td>
				<td>
					<input type="text" class="form-control" name="nama" value="<?= $data['nama_kp'] ?>">
			</tr>
			<tr>
				<td>Mobil</td>
				<td>
					<select name="id_mobil" class="form-control">
						<?php
						$cek_mobil=mysqli_query($conn,"SELECT * FROM mobil");
						while ($dm=mysqli_fetch_assoc($cek_mobil)) { ?>
						<option value="<?= $dm['id_mobil'] ?>" <?php if($dm['id_mobil']==$data['id_mobil']) echo "selected"; ?>><?= $dm['merk_mobil'].' '.$dm['tipe_mobil'] ?></option>
						<?php } ?>	
					</select>
				</td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td>
					<input type="text" name="tahun" value="<?= $data['tahun_produksi_mobil'] ?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>Keluhan</td>
				<td>
					<textarea name="keluhan" cols="30" rows="5" class="form-control"><?= $data['keluhan'] ?></textarea>
				</td>
			</tr>
			<tr>
				<td>Solusi</td>
				<td>
					<textarea name="solusi" cols="30" rows="5" class="form-control"><?= $data['solusi'] ?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="update" value="Update" class="btn btn-block btn-success" required>
				</td>
			</tr>
		</table>
	</form>

	</div>
			
	<?php
	if(isset($_POST['update'])){
		$id=$_POST['id_kp'];
		$tgl=$_POST['tanggal'];
		$nm=$_POST['nama'];
		$id_mobil=$_POST['id_mobil'];
		$keluhan=$_POST['keluhan'];
		$solusi=$_POST['solusi'];
		$update=mysqli_query($conn,"UPDATE konsultasi_publik SET tanggal_kp='$tgl',nama_kp='$nm',id_mobil='$id_mobil',keluhan='$keluhan',solusi='$solusi' WHERE id_kp='$id'");
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
				   window.location.replace('index.php?hl=konsultasi_publik');
				  } ,1000); 
 				</script>"; 
		}else{
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
				   window.location.replace('index.php?hl=konsultasi_publik');
				  } ,1000); 
 				</script>";
		}

	}