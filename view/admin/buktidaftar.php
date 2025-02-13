<?php 
	if(isset($_GET['id_booking'])){

	$query = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN jadwal ON jadwal.id_jadwal=booking.id_jadwal WHERE booking.id_booking ='$_GET[id_booking]' and booking.id_pelanggan='$_SESSION[username]' and booking.status = 'WAIT'");									
	$data  = mysqli_fetch_array($query);
?>


<div class="col-sm-12 col-md-12">
<h4  class="section-header" style="font-family:times new roman; text-align: center;">Nomor Antrian</h4>
<a class="btn btn-warning btn-sm" target="blank" href="no_antrian.php?id_booking=<?php echo $data['id_konsultasi'] ?>"><i class="ion ion-printer"></i></a>
<!-- untuk report no antrian sesuaikan se jo yg iko -->
<div id="data">
<div class="table-responsive">
		<table class="table">
			<tr>
				<th colspan="3"><hr></th>
			</tr>
			<tr>
				<td><h4 >ID Booking </h4></td>
				<td><h4 >: </h4></td>
				<td><h4 ><?php echo $data['id_booking'] ?></h4></td>
			</tr>
			<tr>
				<td><h4 >Hari</h4></td>
				<td><h4 >: </h4></td>
				<td><h4 ><?php echo $data['hari'] ?></h4></td>
			</tr>
			<tr>
				<td><h4 >Jam</h4></td>
				<td><h4 >: </h4></td>
				<td><h4 ><?php echo $data['jam'] ?></h4></td>
			</tr>
			<tr>
				<td><h4 >Tanggal</h4></td>
				<td><h4 >: </h4></td>
				<td><h4 ><?php echo $data['tgl_booking'] ?></h4></td>
			</tr>
			<tr>
				<td><h4 >Status</h4></td>
				<td><h4 >: </h4></td>
				<td><h4 ><?php echo $data['status'] ?></h4></td>
			</tr>
		</table>
		</div>
	</div>
   </div>
     
       
<?php
}
?>