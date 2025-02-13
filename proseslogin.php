<script src="/sweetalert.min.js"></script>
<script src="/sweetalert.js"></script>

<?php
include "koneksi.php";
$email = $_POST['email'];
$password = md5($_POST['password']);
$status = $_POST['status'];

if ($status == "PELANGGAN") {
	$query = mysqli_query($conn, "SELECT COUNT(email) AS jumlah,id_pelanggan,nama,email FROM pelanggan WHERE email='$email' AND password='$password' AND aktif='ya'");
	$data = mysqli_fetch_array($query);

	if ($data['jumlah'] >= 1) {
		session_start();
		$_SESSION['id_pelanggan'] = $data['id_pelanggan'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['status'] = "PELANGGAN";
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		echo "<script type='text/javascript'>
				setTimeout(function () {  
					swal({
						title: 'Login Sukses',
						text:  'Selamat Datang $nama',
						icon: 'success',
						timer: 2500,
						showConfirmButton: true
						});  
						},10); 
						window.setTimeout(function(){ 
							window.location.replace('view/pelanggan/index.php?hl=home');
						} ,2500); 
			</script>";
	} else {
		echo "<script type='text/javascript'>
					setTimeout(function () {  
						swal({
							title: 'Login Gagal',
							text:  'Periksa kembali Email dan Password',
							icon: 'error',
							timer: 2500,
							showConfirmButton: true
							});  
							},10); 
							window.setTimeout(function(){ 
								window.location.replace('login.php');
							} ,2500); 
				</script>";
	}
} elseif ($status == "ADMIN") {
	$query = mysqli_query($conn, "SELECT COUNT(email) AS jumlah,id_admin,nama,email FROM `admin` WHERE email='$email' AND password='$password' AND aktif='ya'");
	$data = mysqli_fetch_array($query);
	if ($data['jumlah'] >= 1) {
		session_start();
		$_SESSION['id_admin'] = $data['id_admin'];
		$_SESSION['email'] = $email;
		$_SESSION['nama'] = $nama;
		$_SESSION['status'] = "ADMIN";
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		echo "<script type='text/javascript'>
							setTimeout(function () {  
							swal({
							title: 'Login Sukses',
							text:  'Selamat Datang Admin $nama',
							icon: 'success',
							timer: 2500,
							showConfirmButton: true
							});  
							},10); 
							window.setTimeout(function(){ 
							window.location.replace('view/admin/index.php?hl=home');
							} ,2500); 
						</script>";
	} else {
		echo
		"<script type='text/javascript'>
					setTimeout(function () {  
						swal({
							title: 'Login Gagal',
							text:  'Periksa kembali Email dan Password',
							icon: 'error',
							timer: 2500,
							showConfirmButton: true
							});  
							},10); 
							window.setTimeout(function(){ 
								window.location.replace('login_admin.php');
							} ,2500); 
				</script>";
	}
}
?>