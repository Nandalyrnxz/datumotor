<div class="col-sm-12 col-md-12">
    
<h4  class="section-header" style="font-family:times new roman; text-align: center;">Pendaftaran Konsultasi</h4>
			<br>
			<?php
			$id_mobil=$_GET['id_mobil'];
			$jenismobil=$_GET['jenismobil'];
			$query2=mysqli_query($conn,"SELECT * FROM mobil where id_mobil='$id_mobil' and jenismobil='$jenismobil'");
			$res=mysqli_fetch_array($query2);
			$id_mobil=$res['id_mobil'];
			$jenismobil=$_POST['jenismobil'];
				if($jenismobil=="MINIBUS");
				else if($jadwal=="SEDAN");
			$merk=$_POST['merk'];


		

			?>
			

			<form method="POST" action="index.php?hl=simpankonsul" enctype="multipart/form-data">
			<div class="table-responsive">
			<table class="table">
				<tr>
			
					<td>Id Pelanggan </td>
					<td><input class="form-control" type="text" id="id_pelanggan" name="id_pelanggan" autofocus="yes" required="yes" /></td>
				</tr>
			
				<tr>
					<td>Nama </td>
					<td>
						<?php 
						$id_pelanggan=$_SESSION['username'];
						$carinama=mysqli_query($conn,"select nama from pelanggan where id_pelanggan='$id_pelanggan'");
						$res=mysqli_fetch_array($carinama);
						$nama=$res['nama'];


						if($nama){
							echo "<input class='form-control' type='text' id='nama' name='nama' 
						value='$nama'  readonly>";
						}else{
							echo "<input class='form-control' type='text' id='nama' name='nama' 
						value=''  required autofocus>";
						}
						
						?>

						</td>
				</tr>

				<tr>
					<td>Tanggal Konsultasi </td>
					<td><input class="form-control" type="date" id="tgl_konsultasi" name="tgl_konsultasi" required /></td>
				</tr>

				<tr>
					<td>Keluhan </td>
					<td><textarea class="form-control" size="4" name="keluhan" id="keluhan" required ></textarea>
				</tr>

			
				<tr>
					<td></td>
					<td><input class="btn btn-success btn-sm" type="submit" id="simpankonsul" name="simpankonsul" value="Ambil Antrian" /></td>

				</tr>

				<tr>
					<td colspan="2"><hr></td>
					
				</tr>

				<tr>
					<td>Id Mobil </td>
					<td><input class="form-control" type="text" id="id_mobil" name="id_mobil" value="<?php echo $id_mobil;?>" readonly  /> <i class="ion ion-android-done primary"></i>
						</td>
				</tr>
				
				
			</table>
			</form>	

			
			</div>
    
         
     
       

