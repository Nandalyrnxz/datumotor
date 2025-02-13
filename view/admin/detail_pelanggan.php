<?php

	include "../../koneksi.php";
	$id_pelanggan=$_GET['id_pelanggan'];
	$query = mysqli_query($conn, "SELECT * from pelanggan where id_pelanggan ='$id_pelanggan'");											
	$data  = mysqli_fetch_array($query);
	$jkel = $data['jenkel'];
	if($jkel = "P"){
		$JK = "Perempuan";
	}
	else{
		$JK = "Laki Laki";
	}
?>

<div class="col-sm-12 col-md-12">
<h4 class="section-header" style="font-family:times new roman;" align="center">Data Pelanggan<br>
<a style="float:left;"class="btn btn-sm btn-danger" href="index.php?hl=pelanggan"><i class="ion ion-ios-undo"> Back</i></a>
</br>
<div class="table-responsive">
<table class="table">
	<tr>
		<td>Id Pelanggan</td>
		<td>: </td>
		<td><?php echo $data['id_pelanggan'] ?></td>
	</tr>
	<tr>
		<td>Nama </td>
		<td>: </td>
		<td><?php echo $data['nama'] ?></td>
	</tr>
	
	<tr>
		<td>Alamat</td>
		<td>: </td>
		<td><?php echo $data['alamat'] ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: </td>
		<td><?php echo $data['email'] ?></td>
	</tr>
	<tr>
		<td>No HP</td>
		<td>: </td>
		<td><?php echo $data['no_hp'] ?></td>
	</tr>
	<tr>
		<td>No WA</td>
		<td>: </td>
		<td><?php echo $data['no_wa'] ?></td>
	</tr>
</table>
</div>
			
			</div>
        