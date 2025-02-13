<html>
<body>
<div class="col-sm-12 col-md-12">
	<h4 class="section-header" style="font-family:times new roman;text-align: center;">Tambah Jadwal Booking</h4>
	<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Hari</td>
				<td><select name="hari" class="form-control">
					<option>- Pilih Hari Booking -</option>
					<option value="SENIN">SENIN</option>
					<option value="SELASA">SELASA</option>
					<option value="RABU">RABU</option>
					<option value="KAMIS">KAMIS</option>
					<option value="JUMAT">JUMAT</option>
					<option value="SABTU">SABTU</option>

				</select>
				</td>
			</tr>
			<tr>
				<td>Jam</td>
				<td><select name="jam" class="form-control">
					<option>- Pilih Jam Booking -</option>
					<option value="08:00">08:00</option>
					<option value="09:00">09:00</option>
					<option value="10:00">10:00</option>
					<option value="11:00">11:00</option>
					<option value="13:30">13:30</option>
					<option value="14:00">14:00</option>
					<option value="15:00">15:00</option>
					<option value="16:00">16:00</option>
					<option value="17:00">17:00</option>

				</select>
				</td>
			</tr>

			<tr>
				
				<td colspan="2"><input type="submit" name="simpan" value="Simpan" class="btn btn-block btn-success" required></td>
			</tr>
		</table>

	</form>
</body>
</html>



	<?php
	if(isset($_POST['simpan'])){
		$hari=$_POST['hari'];
		$jam=$_POST['jam'];
				$simpan=mysqli_query($conn,"INSERT INTO jadwal VALUES(NULL,'$hari','$jam')");
					if ($simpan) {
						echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Sukses',
							    text:  'Jadwal ditambahkan !',
							    icon: 'success',
							    timer: 1500,
							    
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php?hl=jadwal');
							  } ,1000); 
					 		</script>"; 
					}else{
						echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Failed',
							    text:  'jadwal gagal ditambahkan !',
							    icon: 'error',
							    timer: 1500,
							    
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php?hl=jadwal');
							  } ,1000); 
					 		</script>"; 

					}

		
	}
	?>