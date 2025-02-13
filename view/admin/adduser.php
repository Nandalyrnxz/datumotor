<div class="col-sm-12 col-md-12">
	<h4 class="section-header" style="font-family:times new roman;text-align: center;">Tambah User</h4>
	<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" class="form-control" id=username required="yes">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" class="form-control" required="yes">
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" class="form-control" required="yes">
				</td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select name="status" class="form-control">
					<option>- Pilih Status -</option>
					<option value="PELANGGAN">PELANGGAN</option>
					<option value="ADMIN">ADMIN</option>
				</select>
				</td>
			</tr>
			<tr>
				<td>Aktif</td>
				<td><select name="aktif" class="form-control">
					<option>- Pilih -</option>
					<option value="ya">ya</option>
					<option value="tidak">tidak</option>
					
				</select>
				</td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="simpan" value="Simpan" class="btn btn-block btn-success" required></td>
			</tr>
		</table>

	</form>

	<?php
	if(isset($_POST['simpan'])){

		$username=$_POST['username'];
		$password=$_POST['password'];
		$nama=$_POST['nama'];
		$status=$_POST['status'];
		$aktif=$_POST['aktif'];

		$cek=mysqli_query($conn,"select username,password from user where username='$username' and password='$password'");
		$has=mysqli_num_rows($cek);
		if($has>0){
			echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Failed',
							    text:  'Username atau password sudah ada !',
							    icon: 'error',
							    timer: 3000,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php?hl=adduser');
							  } ,2500); 
					 		</script>"; 


		}else{

			 $simpan=mysqli_query($conn,"INSERT INTO user VALUES('$username','$password','$nama','$status','$aktif')");
					if ($simpan) {
						echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Sukses',
							    text:  'User ditambahkan !',
							    icon: 'success',
							    timer: 3000,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php?hl=user');
							  } ,2500); 
					 		</script>"; 
					}else{
						echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Failed',
							    text:  'User gagal ditambahkan !',
							    icon: 'error',
							    timer: 3000,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php?hl=user');
							  } ,2500); 
					 		</script>"; 

					}

		}

				

			

		
	}
	?>