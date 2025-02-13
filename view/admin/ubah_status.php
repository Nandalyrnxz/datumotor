<?php
$id=$_GET['id_status'];
$query=mysqli_query($conn,"SELECT * FROM status_antrian where id_status='$id'");
$data=mysqli_fetch_assoc($query);
?>

<div class="col-sm-12 col-md-12">
	<div class="card">
		<div class="card-header">
			<h3>Ubah Status Antrian</h3>
		</div>
	<div class="card-body">
		<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Status</td>
				<td>
					<input type="hidden" name="id_status" value="<?= $data['id_status'] ?>">
					<input type="text" name="status" class="form-control" value="<?php echo $data['status_antrian']; ?>"></td>
</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="update" value="Update" class="btn btn-block btn-success" required></td>
			</tr>
		</table>
	</form>

	</div>
			
	<?php
	if(isset($_POST['update'])){
		$id=$_POST['id_status'];
		$status=STRTOUPPER($_POST['status']);
		$update=mysqli_query($conn,"UPDATE status_antrian SET status_antrian='$status' WHERE id_status='$id'");
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
				   window.location.replace('index.php?hl=status');
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
				   window.location.replace('index.php?hl=status');
				  } ,1000); 
 				</script>";
		}

	}
	?>