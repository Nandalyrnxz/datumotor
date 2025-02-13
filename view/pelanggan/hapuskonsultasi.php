<?php
	$id_konsultasi=$_GET['idk'];
	$query=mysqli_query($conn,"DELETE FROM konsultasi WHERE id_konsultasi='$id_konsultasi'");
	if($query)
	{	
		echo "<script type='text/javascript'>
		  setTimeout(function () {  
		   swal({
		    title: 'Sukses',
		    text:  'Berhasil Menghapus data !',
		    icon: 'success',
		    timer: 2000,
		    showConfirmButton: true
		   });  
		  },10); 
		  window.setTimeout(function(){ 
		   window.location.replace('index.php?hl=konsultasi');
		  } ,3000); 
 		</script>"; 
		
	}else{
		echo "<script type='text/javascript'>
		  setTimeout(function () {  
		   swal({
		    title: 'Gagal',
		    text:  'Konsultasi gagal dihapus !',
		    icon: 'error',
		    timer: 2000,
		    showConfirmButton: true
		   });  
		  },10); 
		  window.setTimeout(function(){ 
		   window.location.replace('index.php?hl=konsultasi');
		  } ,3000); 
 		</script>"; 
	}
?>