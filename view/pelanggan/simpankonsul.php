<?php
include '../../koneksi.php';
session_start();	

if (isset($_POST['simpankonsul'])) {
	
	$nama = $_POST['nama'];	
	$id_pelanggan=$_SESSION['username'];
	$tgl_konsultasi  = $_POST['tgl_konsultasi'];
	$keluhan=$_POST['keluhan'];		
	$id_mobil=$_POST['id_mobil'];

	
	$query = mysqli_query($conn, "SELECT max(id_konsultasi) as rm from konsultasi");
		$data  = mysqli_fetch_array($query);
		$rm	= $data['rm'];
		if($rm == ''){
			$id_konsultasi = '111';
		}
		else{
			$id_konsultasi = $rm + 1;
		}
		
			
	$simpan = mysqli_query($conn, "INSERT INTO konsultasi VALUES ('$id_konsultasi','$nama','$id_pelanggan','$id_mobil','$tgl_konsultasi','keluhan','WAIT')");
	
	if ($simpan)
	{	
		
		echo "<script type='text/javascript'>
		  setTimeout(function () {  
		   swal({
		    title: 'Sukses',
		    text:  'Tunggu Verifikasi Admin !',
		    icon: 'success',
		    timer: 3000,
		    showConfirmButton: true
		   });  
		  },10); 
		  window.setTimeout(function(){ 
		   window.location.replace('index.php?hl=buktidaftar2&id_konsultasi=$id_konsultasi');
		  } ,3000); 
 		</script>"; 
		
	} 
	else 
	{
		
		header("Location: index.php?hl=konsultasi");
	}		
	
}
?>	