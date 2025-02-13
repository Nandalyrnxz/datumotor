<?php	
	$id_pelanggan=$_SESSION['id_pelanggan'];
	$tgl_booking  = $_POST['tgl_booking'];		
	$id_jadwal=$_POST['id_jadwal'];
	$id_mobil=$_POST['id_mobil'];
	$id_booking='BK'.$id_pelanggan.date('YmdHi');	
	$simpan = mysqli_query($conn, "INSERT INTO booking VALUES ('$id_booking','$id_pelanggan','$id_mobil','$id_jadwal','$tgl_booking','PENDING')");
	
	if ($simpan)
	{	
		
		echo "<script type='text/javascript'>
		  setTimeout(function () {  
		   swal({
		    title: 'Sukses',
		    text:  'Tunggu Verifikasi Admin !',
		    icon: 'success',
		    timer: 2000,
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

?>	