<?php 
	if(isset($_GET['id_konsultasi'])){

	$query = mysqli_query($conn, "SELECT * FROM konsultasi LEFT JOIN mobil ON mobil.id_mobil=konsultasi.id_mobil WHERE konsultasi.id_konsultasi ='$_GET[id_konsultasi]' and konsultasi.id_pelanggan='$_SESSION[username]' and konsultasi.status = 'WAIT'");									
	$data  = mysqli_fetch_array($query);
?>


<div class="col-sm-12 col-md-12">
<h4  class="section-header" style="font-family:times new roman; text-align: center;">Nomor Konsultasi</h4>
<a class="btn btn-warning btn-sm" href="report_no_antriank.php?no=<?php echo $data['id_konsultasi'] ?>"><i class="ion ion-printer"></i></a>
<!-- untuk report no antrian sesuaikan se jo yg iko -->
<div id="data">
<div class="table-responsive">
		<table class="table">
			<tr>
				<th colspan="3"><hr></th>
			</tr>
			<tr>
				<td><h4 >ID Konsultasi </h4></td>
				<td><h4 >: </h4></td>
				<td><h4 ><?php echo $data['id_konsultasi'] ?></h4></td>
			</tr>
			<tr>
				<td><h4 >Tanggal</h4></td>
				<td><h4 >: </h4></td>
				<td><h4 ><?php echo $data['tgl_konsultasi'] ?></h4></td>
			</tr>
			<tr>
				<td><h4 >Keluhan</h4></td>
				<td><h4 >: </h4></td>
				<td><h4 ><?php echo $data['keluhan'] ?></h4></td>
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