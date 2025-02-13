<?php
$id=$_GET['id_keterangan'];
$query=mysqli_query($conn,"SELECT * FROM keterangan_antrian where id_keterangan='$id'");
$data=mysqli_fetch_assoc($query);
?>

<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Ubah Keterangan Antrian</h3>
        </div>
        <div class="card-body">
        <form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Status</td>
				<td>
					<input type="hidden" name="id_keterangan" value="<?= $data['id_keterangan'] ?>">
					<select name="id_status" id="" class="form-control">
						<option value="">- Pilih Status Antrian -</option>
						<?php
						$query2=$conn->query("SELECT * FROM status_antrian");
						while ($data2=mysqli_fetch_assoc($query2)) { ?>
							<option value="<?= $data2['id_status'] ?>" <?php if($data2['id_status']==$data['id_status']) echo "selected"; ?>><?= $data2['status_antrian'] ?></option>";
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td><input type="text" class="form-control" name="keterangan" value="<?= $data['keterangan'] ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="simpan" value="Simpan" class="btn btn-block btn-success" required></td>
			</tr>
		</table>

	</form>

        </div>
    </div>
	
	<?php
	if(isset($_POST['simpan'])){
		$id_keterangan=$_POST['id_keterangan'];
		$id_status=$_POST['id_status'];
		$keterangan=$_POST['keterangan'];
		$simpan=mysqli_query($conn,"UPDATE keterangan_antrian SET id_status='$id_status',keterangan='$keterangan' WHERE id_keterangan='$id_keterangan'");
					if ($simpan) {
						echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Sukses',
							    text:  'Keterangan Antrian diubah !',
							    icon: 'success',
							    timer: 1000,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php?hl=keterangan');
							  } ,1000); 
					 		</script>"; 
					}else{
						echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Failed',
							    text:  'Keterangan gagal diubah !',
							    icon: 'error',
							    timer: 1000,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php?hl=keterangan');
							  } ,1000); 
					 		</script>"; 

					}
		
	}
	?>