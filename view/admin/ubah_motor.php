<?php
$id_mobil=$_GET['id_mobil'];
$query=mysqli_query($conn,"SELECT * FROM mobil where id_mobil='$id_mobil'");
$data=mysqli_fetch_array($query);
?>

<div class="col-sm-12 col-md-12">
	   <h4 class="section-header" style="font-family:times new roman; text-align: center;">Ubah Mobil</h4>
			
	<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
	
				<td><input type="hidden" name="id_mobil" class="form-control" value="<?php echo $data[0]; ?>" readonly></td>
			<tr>
				<td>Merk Mobil</td>
				<td><input type="text" name="merk" class="form-control" value="<?php echo $data[1]; ?>"  required></td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td><input type="text" name="tipe" class="form-control" value="<?php echo $data[2]; ?>"  required></td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="update" value="Update" class="btn btn-block btn-success" required></td>
			</tr>
		</table>

	</form>

	<?php
	if(isset($_POST['update'])){

		$id_mobil=$_POST['id_mobil'];
		$merk=$_POST['merk'];
		$tipe=$_POST['tipe'];

		$update=mysqli_query($conn,"UPDATE mobil SET merk_mobil='$merk',tipe_mobil='$tipe' WHERE id_mobil='$id_mobil' ");
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
				   window.location.replace('index.php?hl=mobil');
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
				   window.location.replace('index.php?hl=mobil');
				  } ,1000); 
 				</script>";
		}

	}