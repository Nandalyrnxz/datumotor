<?php
$id_pelanggan=$_GET['id_pelanggan'];
$query=mysqli_query($conn,"select * from pelanggan where id_pelanggan='$id_pelanggan'");
$data=mysqli_fetch_assoc($query);
?>

<div class="col-sm-12 col-md-12">
	   <h4 class="section-header" style="font-family:times new roman; text-align: center;">Ubah Data Pelanggan</h4>
			
	<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
		<input type="hidden" name="id_pelanggan" class="form-control" value="<?php echo $data['id_pelanggan']; ?>" readonly>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>"  required></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>"  required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="hidden" name="password_old" class="form-control" value="<?php echo $data['password']; ?>">
			<input type="password" name="password" class="form-control">
			</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><select name="jk"class="form-control">
					<option value="<?php echo $data['jk']; ?>" ><?php echo $data['jk']; ?> </option>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>"  required></td>
			</tr>
			<tr>
				<td>No Wa</td>
				<td><input type="text" name="no_wa" class="form-control" value="0<?php echo $data['no_wa']; ?>"  required></td>
			</tr>
			<tr>
				<td>Aktif</td>
				<td><select name="aktif"class="form-control">
					<option value="ya" <?php if($data['aktif']=='ya') echo 'selected'; ?>>Ya</option>
					<option value="tidak" <?php if($data['aktif']=='tidak') echo 'selected'; ?>>Tidak</option>
				</select>
				</td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="update" value="Simpan" class="btn btn-block btn-success" required></td>
			</tr>
		</table>

	</form>

	<?php
	if(isset($_POST['update'])){
		if($_POST['password']!=null){
			$pw=md5($_POST['password']);
		}else{
			$pw=$_POST['password_old'];
		}

		$id_pelanggan=$_POST['id_pelanggan'];
		$nama=$_POST['nama'];
		$jk=$_POST['jk'];
		$alamat=$_POST['alamat'];
		$email=$_POST['email'];
		$no_wa=substr($_POST['no_wa'],1,11);
		$aktif=$_POST['aktif'];

	

		$update=mysqli_query($conn,"UPDATE pelanggan SET nama='$nama',email='$email',password='$pw',jk='$jk',alamat='$alamat',no_wa='$no_wa',aktif='$aktif' WHERE id_pelanggan='$id_pelanggan' ");
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
				   window.location.replace('index.php?hl=pelanggan');
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
				   window.location.replace('index.php?hl=pelanggan');
				  } ,1000); 
 				</script>";
		}

	}