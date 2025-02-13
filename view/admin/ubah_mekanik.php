<?php
$id=$_GET['id_mekanik'];
$query=mysqli_query($conn,"SELECT * FROM mekanik where id_mekanik='$id'");
$data=mysqli_fetch_assoc($query);
?>

<div class="col-sm-12 col-md-12">
	<div class="card">
		<h3>Ubah Mekanik</h3>
	</div>
	<div class="card-body">
	<form action="" method="POST" enctype="multipart/form-data">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id_mekanik" value="<?= $data['id_mekanik'] ?>">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama_mekanik']; ?>"></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td>
					<img src="../../dist/img/mekanik/<?= $data['foto'] ?>" height="100px" class="m-3"><br>
					<input type="text" name="foto_old" value="<?= $data['foto'] ?>">
					<input type="file" name="foto" class="form-control"></td>
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
		$id=$_POST['id_mekanik'];
		$nm=$_POST['nama'];
		$aktif=$_POST['aktif'];
		if($_FILES['foto']['name']){
			$fileName = $_FILES['foto']['name']; //get the file name
			$fileSize = $_FILES['foto']['size']; //get the size
			$fileError = $_FILES['foto']['error']; //get the error when upload
			if($fileSize > 0 || $fileError == 0){ //check if the file is corrupt or error
			$move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../dist/img/mekanik/'.$fileName);
			}
			
		}else{
			$fileName=$_POST['foto_old'];
		}
		
		$update=mysqli_query($conn,"UPDATE mekanik SET nama_mekanik='$nm',foto='$fileName',aktif='$aktif' WHERE id_mekanik='$id'");
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
				   window.location.replace('index.php?hl=mekanik');
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
				   window.location.replace('index.php?hl=mekanik');
				  } ,1000); 
 				</script>";
		}

	}