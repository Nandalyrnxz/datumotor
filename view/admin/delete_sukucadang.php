<?php
$id = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM mobil WHERE id_mobil='$id'");

if ($delete) {
	echo "<script type='text/javascript'>
				setTimeout(function () {  
				swal({
				title: 'Sukses',
				text:  'Data Berhasil Dihapus !',
				icon: 'success',
				timer: 1000,
				showConfirmButton: true
				});  
				},10); 
				window.setTimeout(function(){ 
				window.location.replace('index.php?hl=suku_cadang');
				} ,1000); 
			</script>";
} else {
	echo "<script type='text/javascript'>
				setTimeout(function () {  
				swal({
				title: 'Failed',
				text:  'Data gagal Dihapus !',
				icon: 'error',
				timer: 1000,
				showConfirmButton: true
				});  
				},10); 
				window.setTimeout(function(){ 
				window.location.replace('index.php?hl=suku_cadang');
				} ,1000); 
			</script>";
}
