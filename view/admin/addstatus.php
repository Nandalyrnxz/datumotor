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
				<td><input type="text" name="status" class="form-control" required="yes">
				</td>
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

		$status=STRTOUPPER($_POST['status']);
		$simpan=mysqli_query($conn,"INSERT INTO status_antrian VALUES(NULL,'$status')");
					if ($simpan) {
						echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Sukses',
							    text:  'Status Antrian ditambahkan !',
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
							    text:  'Status gagal ditambahkan !',
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