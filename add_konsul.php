<script src="sweetalert.min.js"></script>
<script src="sweetalert.js"></script>
<?php
include "koneksi.php";
if (isset($_POST['konsul'])) {
	$nama = $_POST['nama'];
	$id_mobil = $_POST['id_mobil'];
	$keluhan = $_POST['keluhan'];
	$tgl = date('Y-m-d');
	$tahun = $_POST['tahun_mobil'];
	$query = $conn->query("INSERT INTO konsultasi_publik VALUES(NULL,'$tgl','$nama','$id_mobil','$tahun','$keluhan','')");
	if ($query) {
		echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Sukses',
							    text:  'Konsultasi berhasil ditambahkan',
							    icon: 'success',
							    timer: 1000,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php#konsultasi');
							  } ,1000); 
					 		</script>";
	} else {
		echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Gagal',
							    text:  'kosultasi gagal ditambahkan',
							    icon: 'Error',
							    timer: 1000,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php#konsultasi');
							  } ,1000); 
					 		</script>";
	}
}
?>