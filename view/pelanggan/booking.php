<?php
$query = mysqli_query($conn, "SELECT * from pelanggan where id_pelanggan ='$_SESSION[username]'");
$data  = mysqli_fetch_array($query);
?>

<div class="col-sm-12 col-md-12">
	<h3 class="section-header" style="font-family:times new roman; text-align: center;">Pendaftaran Booking</h3>
	<form method="post" action="" enctype="multipart/form-data">
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<td colspan="2">
						<h4 style="color:#2Ecc71;">Tanggal </h4>
					</td>
					<td colspan="2">
						<input type="date" name="tgl_booking" class="form-control" value="<?php if (isset($_POST['tgl_booking'])) echo $_POST['tgl_booking'];
																							else echo date('Y-m-d'); ?>">
					</td>
				</tr>

				<tr>
					<td colspan="2"></td>
					<td colspan="2"><input class="btn btn-sm btn-success"
							style="background:#2Ecc71; color:#ffffff;float:left" type="submit" id="pilihhari"
							name="pilihhari" value="Cari" /></td>
				</tr>

				<tr>
					<td><strong>Pilih</strong></td>
					<td><strong>No</strong></td>
					<td><strong>Hari</strong></td>
					<td><strong>Jam</strong></td>
				</tr>

				<?php
				if (isset($_POST['pilihhari'])) {
					setlocale(LC_ALL, 'id-ID', 'id_ID');
					$hari_ini = date('Y-m-d');
					$hari = $_POST['hari'];
					$tgl_booking = $_POST['tgl_booking'];
					$hari = STRTOUPPER(STRFTIME('%A', STRTOTIME($tgl_booking)));
					$NO = 0;
					if ($tgl_booking < $hari_ini) {
						echo "<script type='text/javascript'>
						setTimeout(function () {  
						swal({
							title: 'Failed',
							text:  'Booking tidak dapat dilakukan karena tanggal/waktu yang dipilih sudah lewat !',
							icon: 'error',
							timer: 2500,
							showConfirmButton: true
						});  
						},10); 
						window.setTimeout(function(){ 
						window.location.replace('index.php?hl=booking');
						} ,2500); 
						</script>";
					} else {
						$cari = mysqli_query($conn, "SELECT * FROM jadwal where hari='$hari' and id_jadwal NOT IN (select id_jadwal from booking where tgl_booking='$tgl_booking')");
						while ($result = mysqli_fetch_array($cari)) {
							$NO++;
							$id_jadwal = $result['id_jadwal'];
							$jam = $result['jam'];
							$hari = $result['hari'];
							echo "<tr>";
							echo "<td><a href='index.php?hl=ambil_antrian&id_jadwal=$id_jadwal&tgl=$tgl_booking' class='btn btn-sm btn-success'><i class='ion ion-checkmark-circled'></i></a></td>";
							echo "<td>$NO</td> ";
							echo "<td>$hari</td> ";
							echo "<td>$jam</td> ";
							echo "</tr>";
						}
					}
				}
				?>
			</table>
		</div>
	</form>


</div>