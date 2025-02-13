<?php
$id=$_GET['id_admin'];
$query=mysqli_query($conn,"SELECT * FROM admin where id_admin='$id'");
$data=mysqli_fetch_assoc($query);
?>

<div class="col-sm-12 col-md-12">
	<div class="card">
		<h3>Ubah Admin</h3>
	</div>
	<div class="card-body">
		<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Email</td>
				<td>
					<input type="hidden" name="id_admin" value="<?= $data['id_admin'] ?>">
					<input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="hidden" name="password_old" value="<?= $data['password'] ?>">
					<input type="text" name="password" class="form-control"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>"  required></td>
			</tr>
			<tr>
				<td>Aktif</td>
				<td><select name="aktif" class="form-control">
					<option value="ya" <?php if($data['aktif']=='ya') echo 'selected'; ?>>ya</option>
					<option value="tidak" <?php if($data['aktif']=='tidak') echo 'selected'; ?>>tidak</option>
					
				</select>
				</td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="update" value="Update" class="btn btn-block btn-success" required></td>
			</tr>
		</table>
	</form>

	</div>
			
	<?php
	if(isset($_POST['update'])){
		$id=$_POST['id_admin'];
		$em=$_POST['email'];
		$nm=$_POST['nama'];
		$aktif=$_POST['aktif'];
		if($_POST['password']==null){
			$pw=$_POST['password_old'];
		}else{
			$pw=md5($_POST['password']);
		}
		
		$update=mysqli_query($conn,"UPDATE admin SET email='$em',password='$pw',nama='$nm',aktif='$aktif' WHERE id_admin='$id'");
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
				   window.location.replace('index.php?hl=admin');
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
				   window.location.replace('index.php?hl=admin');
				  } ,1000); 
 				</script>";
		}

	}