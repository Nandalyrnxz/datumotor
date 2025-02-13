<div class="col-sm-12 col-md-12">
	<h4 class="section-header" style="font-family:times new roman;text-align: center;">Tambah Pelanggan Baru</h4>
	<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Id Pelanggan</td>
				<td><?php
					$th=date('Ym');
					$query = mysqli_query($conn, "SELECT max(right(id_pelanggan,1)) as id_pelanggan from pelanggan");
					$data  = mysqli_fetch_array($query);
					$id_pelanggan	= $data['id_pelanggan'];
					if($id_pelanggan == ''){
						$no = '11';
					}
					else{
						$no = $id_pelanggan + 1;
					}
					?>
					<input type="text" name="norm" class="form-control" required value="<?php echo 'id_pelanggan.'.$th.'.'.$no;?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" class="form-control" required></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td><input type="text" name="tempatlahir" class="form-control" required></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input type="date" name="tanggallahir" class="form-control" required></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><select name="jenkel"class="form-control">
					<option>- Pilih -</option>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" class="form-control" required></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="text" name="email" class="form-control" required></td>
			</tr>
			<tr>
				<td>No Hp</td>
				<td><input type="text" name="no_hp" class="form-control" required></td>
			</tr>
			<tr>
				<td>No Wa</td>
				<td><input type="text" name="no_wa" class="form-control" required></td>
			</tr>
			<tr>
				<td>Status Member</td>
				<td><select name="member"class="form-control">
					<option>- Pilih -</option>
					<option value="AKTIF">AKTIF</option>
					<option value="NON-AKTIF">NON-AKTIF</option>
				</select>
				</td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="simpan" value="Simpan" class="btn btn-outline-success btn-block" required></td>
			</tr>
		</table>

	</form>

	<?php
	if(isset($_POST['simpan'])){

		$id_pelanggan=$_POST['id_pelanggan'];
		$nama=$_POST['nama'];
		$tempatlahir=$_POST['tempatlahir'];
		$tanggallahir=$_POST['tanggallahir'];
		$jenkelk=$_POST['jenkel'];
		$alamat=$_POST['alamat'];
		$email=$_POST['email'];
		$no_hp=$_POST['no_hp'];
		$no_wa=$_POST['no_wa'];
		$member=$_POST['member'];

	

		$simpan=mysqli_query($conn,"INSERT INTO pelanggan VALUES('$id_pelanggan','$nama','$tempatlahir','$tanggallahir','$jenkel','$alamat','$email','$no_hp','$no_wa','$member')");
		$user=mysqli_query($conn,"INSERT INTO user VALUES('$id_pelanggan','$id_pelanggan','$nama','PELANGGAN','ya')");
		if ($simpan&&$user) {
			echo "<script type='text/javascript'>
				  setTimeout(function () {  
				   swal({
				    title: 'Sukses',
				    text:  'Data Pasien ditambahkan !',
				    icon: 'success',
				    timer: 3000,
				    showConfirmButton: true
				   });  
				  },10); 
				  window.setTimeout(function(){ 
				   window.location.replace('index.php?hl=pelanggan');
				  } ,3000); 
		 		</script>"; 
		}else{
			echo "<script type='text/javascript'>
				  setTimeout(function () {  
				   swal({
				    title: 'Failed',
				    text:  'Data Pelanggan gagal ditambahkan !',
				    icon: 'error',
				    timer: 3000,
				    showConfirmButton: true
				   });  
				  },10); 
				  window.setTimeout(function(){ 
				   window.location.replace('index.php?hl=pelanggan');
				  } ,3000); 
		 		</script>"; 

		}

	}
	?>