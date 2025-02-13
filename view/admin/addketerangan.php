<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Status Antrian</h3>
        </div>
        <div class="card-body">
        <form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Status</td>
				<td>
					<select name="id_status" id="" class="form-control">
						<option value="">- Pilih Status Antrian -</option>
						<?php
						$query=$conn->query("SELECT * FROM status_antrian");
						while ($data=mysqli_fetch_assoc($query)) {
							echo "<option value='$data[id_status]'>$data[status_antrian]</option>";
						} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td><input type="text" class="form-control" name="keterangan"></td>
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
		$id_status=$_POST['id_status'];
		$keterangan=$_POST['keterangan'];
		$simpan=mysqli_query($conn,"INSERT INTO keterangan_antrian VALUES(NULL,'$id_status','$keterangan')");
					if ($simpan) {
						echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Sukses',
							    text:  'Keterangan Antrian ditambahkan !',
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
							    text:  'Keterangan gagal ditambahkan !',
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