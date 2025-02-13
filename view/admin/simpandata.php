<?php
include '../../koneksi.php';
session_start();	

if (isset($_POST['simpandaftar'])) {
	
	$nama = $_POST['nama'];	
	$id_pelanggan=$_SESSION['username'];
	$tgl_booking  = $_POST['tgl_booking'];		
	$id_jadwal=$_POST['id_jadwal'];

	
	$query = mysqli_query($conn, "SELECT max(id_booking) as rm from booking");
		$data  = mysqli_fetch_array($query);
		$rm	= $data['rm'];
		if($rm == ''){
			$id_booking = '111';
		}
		else{
			$id_booking = $rm + 1;
		}
		
			
	$simpan = mysqli_query($conn, "INSERT INTO booking VALUES ('$id_booking','$nama','$id_pelanggan','$id_jadwal','$tgl_booking','WAIT')");
	
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
		   window.location.replace('index.php?hl=buktidaftar&id_booking=$id_booking');
		  } ,3000); 
 		</script>"; 
		
	} 
	else 
	{
		
		header("Location: index.php?hl=booking");
	}		
	
}