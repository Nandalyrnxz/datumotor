<?php
$id_jadwal=$_GET['id_jadwal'];
$delete=mysqli_query($conn,"DELETE FROM jadwal where id_jadwal='$id_jadwal'");
if ($delete) {
			echo "<script type='text/javascript'>
				  setTimeout(function () {  
				   swal({
				    title: 'Sukses',
				    text:  'Data Berhasil Dihapus !',
				    icon: 'success',
				    timer: 3000,
				    showConfirmButton: true
				   });  
				  },10); 
				  window.setTimeout(function(){ 
				   window.location.replace('index.php?hl=jadwal');
				  } ,2500); 
 				</script>"; 
		}else{
			echo "<script type='text/javascript'>
				  setTimeout(function () {  
				   swal({
				    title: 'Failed',
				    text:  'Data gagal Dihapus !',
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