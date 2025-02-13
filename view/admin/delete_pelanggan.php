<?php
$id_pelanggan=$_GET['id_pelanggan'];
$delete=mysqli_query($conn,"DELETE FROM pelanggan where id_pelanggan='$id_pelanggan'");
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
				   window.location.replace('index.php?hl=pelanggan');
				  } ,3000); 
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
				   window.location.replace('index.php?hl=pelanggan');
				  } ,3000); 
 				</script>";
		}