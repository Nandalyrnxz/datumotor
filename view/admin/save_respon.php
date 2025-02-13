<?php
$id_konsultasi = $_POST['id_konsultasi'];
$solusi = $_POST['solusi'];
$responden = "ADMIN";
$waktu = date('Y-m-d H:i:s');
$simpan = mysqli_query($conn, "INSERT INTO respon_konsultasi (id_respon, id_konsultasi, responden, respon, waktu) VALUES (NULL, '$id_konsultasi', '$responden', '$solusi', '$waktu')");


if ($simpan) {
	$UPDATE = mysqli_query($conn, "UPDATE konsultasi SET status ='DIRESPON' WHERE id_konsultasi='$id_konsultasi'");
	echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Sukses',
				text:  'Berhasil Menambah Respon!',
				icon: 'success',
				timer: 1000,
				showConfirmButton: true
			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=responkonsultasi&idk=$id_konsultasi');
			} ,1000); 
			</script>";
} else {
	echo "<script type='text/javascript'>
			setTimeout(function () {  
			swal({
				title: 'Gagal',
				text:  'Konsultasi gagal diubah!',
				icon: 'error',
				timer: 1000,
				showConfirmButton: true
			});  
			},10); 
			window.setTimeout(function(){ 
			window.location.replace('index.php?hl=responkonsultasi&idk=$id_konsultasi');
			} ,1000); 
			</script>";
}