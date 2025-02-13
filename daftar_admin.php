<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
		name="viewport">
	<title>Bengkel &mdash; DATU Motor</title>

	<link rel="stylesheet" href="dist/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="dist/modules/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

	<link rel="stylesheet" href="dist/modules/summernote/summernote-lite.css">
	<link rel="stylesheet" href="dist/modules/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="dist/css/demo.css">
	<link rel="stylesheet" href="dist/css/style.css">
</head>

<body>
	<script src="view/admin/sweetalert.min.js"></script>
	<script src="view/admin/sweetalert.js"></script>
	<div class="container">
		<div class="col-sm-12 col-md-12 pt-3">
			<div class="card">
				<div class="card-header">
					<h3 class="section-header" class="text-center">Daftar Akun</h3>
				</div>
				<div class="card-body">
					<form action="daftar_admin.php" method="POST">
						<div class="row">
							<div class="col-lg-6">
								<label for="" class="form-label">Nama</label>
								<input type="text" name="nama" class="form-control mb-2" required>
							</div>
							<div class="col-lg-6">
								<label for="Email" class="form-label">E-mail</label>
								<input type="email" name="email" class="form-control mb-2" required>
								<small>*Email akan digunakan untuk login !</small>
							</div>

							<div class="col-lg-6">
								<label for="" class="form-label">Password</label>
								<input type="password" name="password" class="form-control mb-2" required>
							</div>
							<div class="col-lg-12">
								<input type="submit" name="simpan" value="Daftar" class="btn btn-success">
								<a href="index.php" class="btn btn-primary">Kembali</a>
							</div>

						</div>

					</form>

				</div>
			</div>


			<?php

			if (isset($_POST['simpan'])) {
				include "koneksi.php";
				$email = $_POST['email'];
				$nama = $_POST['nama'];
				$password = md5($_POST['password']);
				$aktif = 'ya';

				$simpan = mysqli_query($conn, "INSERT INTO admin (nama, email, password, aktif) VALUES ('$nama', '$email', '$password','$aktif')");

				if ($simpan === TRUE) {
					echo "<script type='text/javascript'>
            			setTimeout(function () {  
            			swal({
            			title: 'Sukses',
            			text:  'Registrasi berhasil !',
            			icon: 'success',
            			timer: 2000,
            			showConfirmButton: true
            			});  
            			},10); 
            			window.setTimeout(function(){ 
            			window.location.replace('login_admin.php');
            			} ,2000); 
            		
            </script>";
				} else {
					echo "<script type='text/javascript'>
            			setTimeout(function () {  
            			swal({
            			title: 'Failed',
            			text:  'Registrasi gagal !',
            			icon: 'error',
            			timer: 2000,
            			showConfirmButton: true
            			});  
            			},10); 
            			window.setTimeout(function(){ 
            			window.location.replace('daftar_admin.php');
            			} ,3000); 
            	
            </script>";
				}
			}
			?>

		</div>
	</div>

</html>
<style>
	.form-label {
		font-weight: bold;
	}
</style>