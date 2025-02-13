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
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="" class="form-label">KODE OTP</label>
                                <input type="hidden" name="no_wa" value="<?= $_GET['id'] ?>">
                                <input type="text" name="otp" class="form-control mb-2" required>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" name="simpan" value="Kirim" class="btn btn-success">
                            </div>

                        </div>

                    </form>

                </div>
            </div>


            <?php
			if (isset($_POST['simpan'])) {
				include "koneksi.php";
				$no_wa = $_POST['no_wa'];
				$otp = $_POST['otp'];

				$cek = mysqli_query($conn, "SELECT * FROM pelanggan WHERE no_wa='$no_wa' AND kode_otp='$otp'");
				$data = mysqli_num_rows($cek);
				if ($data > 0) {
					$update = mysqli_query($conn, "UPDATE pelanggan SET aktif='ya' WHERE no_wa='$no_wa'");
					echo "<script type='text/javascript'>
				setTimeout(function () {  
				swal({
				title: 'Sukses',
				text:  'Registrasi berhasil, Silahkan Login !',
				icon: 'success',
				timer: 2000,
				showConfirmButton: true
				});  
				},10); 
				window.setTimeout(function(){ 
				window.location.replace('login.php');
				} ,2000); 
			</script>";
				} else {
					echo "<script type='text/javascript'>
				setTimeout(function () {  
				swal({
				title: 'Failed',
				text:  'Kode OTP tidak Sesuai !',
				icon: 'error',
				timer: 2000,
				showConfirmButton: true
				});  
				},10); 
				window.setTimeout(function(){ 
				window.location.replace('otp.php?id=$no_wa');
				} ,2000); 
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