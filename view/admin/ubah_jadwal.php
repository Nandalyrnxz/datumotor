<?php
$id_jadwal=$_GET['id_jadwal'];
$query=mysqli_query($conn,"SELECT * FROM jadwal where id_jadwal='$id_jadwal'");
$data=mysqli_fetch_array($query);
?>

<div class="col-sm-12 col-md-12">
	   <h4 class="section-header" style="font-family:times new roman; text-align: center;">Ubah Jadwal Booking</h4>
			
	<form action="" method="POST">
	<div class="table-responsive">
		<table class="table">
	
			<tr>
				<td>Id Jadwal</td>
				<td><input type="text" name="id_jadwal" class="form-control" value="<?php echo $data[0]; ?>" readonly></td>
			</tr>
			<tr>
				<td>Hari</td>
				<td><select name="hari" class="form-control">
					<option>- Pilih Hari Booking -</option>
					<option value="SENIN">SENIN</option>
					<option value="SELASA">SELASA</option>
					<option value="RABU">RABU</option>
					<option value="KAMIS">KAMIS</option>
					<option value="JUM'AT">JUM'AT</option>
					<option value="SABTU">SABTU</option>

				</select>
				</td>
			</tr>
			<tr>
				<td>Jam</td>
				<td><select name="jam" class="form-control">
					<option>- Pilih Jam Booking -</option>
					<option value="08.00 WIB">08.00 WIB</option>
					<option value="09.00 WIB">09.00 WIB</option>
					<option value="10.00 WIB">10.00 WIB</option>
					<option value="11.00 WIB">11.00 WIB</option>
					<option value="13.30 WIB">13.30 WIB</option>
					<option value="14.00 WIB">14.00 WIB</option>
					<option value="15.00 WIB">15.00 WIB</option>
					<option value="16.00 WIB">16.00 WIB</option>
					<option value="17.00 WIB">17.00 WIB</option>

				</select>
				</td>
			</tr>
			
			<tr>
				
				<td colspan="2"><input type="submit" name="update" value="Update" class="btn btn-block btn-success" required></td>
			</tr>
		</table>

	</form>

	<?php
	if(isset($_POST['update'])){

		$id_jadwal=$_POST['id_jadwal'];
		$hari=$_POST['hari'];
		$jam=$_POST['jam'];
		
	

		$update=mysqli_query($conn,"UPDATE jadwal SET hari='$hari',jam='$jam' WHERE id_jadwal='$id_jadwal' ");
		if ($update) {
			echo "<script type='text/javascript'>
				  setTimeout(function () {  
				   swal({
				    title: 'Sukses',
				    text:  'Data Berhasil Diubah !',
				    icon: 'success',
				    timer: 3000,
				    showConfirmButton: true
				   });  
				  },10); 
				  window.setTimeout(function(){ 
				   window.location.replace('index.php?hl=jadwal');
				  } ,3000); 
 				</script>"; 
		}else{
			echo "<script type='text/javascript'>
				  setTimeout(function () {  
				   swal({
				    title: 'Failed',
				    text:  'Data gagal Diubah !',
				    icon: 'error',
				    timer: 3000,
				    showConfirmButton: true
				   });  
				  },10); 
				  window.setTimeout(function(){ 
				   window.location.replace('index.php?hl=jadwal');
				  } ,3000); 
 				</script>";
		}

	}