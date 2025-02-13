<html>

<body>
    <div class="col-sm-12 col-md-12">
        <h4 class="section-header" style="font-family:times new roman;text-align: center;">Tambah Mobil</h4>
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Merk Mobil</td>
                        <td><input type="text" name="merk" class="form-control" required></td>
                    </tr>

                    <tr>
                        <td>Jenis</td>
                        <td>
                            <input type="text" name="tipe" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Plat Nomor</td>
                        <td>
                            <input type="text" name="plat" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>No Mesin</td>
                        <td>
                            <input type="text" name="no_mesin" class="form-control" required>
                        </td>
                    </tr>

                    <tr>

                        <td colspan="2"><input type="submit" name="simpan" value="Simpan"
                                class="btn btn-block btn-success" required></td>
                    </tr>
                </table>

        </form>
</body>

</html>



<?php
if (isset($_POST['simpan'])) {

	include "koneksi.php";

	$merk = $_POST['merk'];
	$tipe = $_POST['tipe'];
	$plat = $_POST['plat'];
	$no_mesin = $_POST['no_mesin'];
	$id_pelanggan = $_SESSION['id_pelanggan'];
	$cek = mysqli_query($conn, "select * from mobil where merk_mobil='$merk' AND jenis_mobil='$tipe'");
	$cek_hasil = mysqli_num_rows($cek);
	if ($cek_hasil > 0) {
		echo "<script type='text/javascript'>
							setTimeout(function () {  
							swal({
								title: 'Failed',
								text:  'Merk dan Tipe Mobil Sudah ada !',
								icon: 'error',
								timer: 3000,
								showConfirmButton: true
							});  
							},10); 
							window.setTimeout(function(){ 
							window.location.replace('index.php?hl=mobil');
							} ,3000); 
							</script>";
	} else {

		$simpan = mysqli_query($conn, "INSERT INTO mobil VALUES(NULL,'$id_pelanggan','$merk','$tipe','$plat','$no_mesin')");
		if ($simpan) {
			echo "<script type='text/javascript'>
								setTimeout(function () {  
								swal({
									title: 'Sukses',
									text:  'Data Mobil ditambahkan !',
									icon: 'success',
									timer: 1000,
									showConfirmButton: true
								});  
								},10); 
								window.setTimeout(function(){ 
								window.location.replace('index.php?hl=mobil');
								} ,1000); 
								</script>";
		} else {
			echo "<script type='text/javascript'>
								setTimeout(function () {  
								swal({
									title: 'Failed',
									text:  'Data Mobil gagal ditambahkan !',
									icon: 'error',
									timer: 1000,
									showConfirmButton: true
								});  
								},10); 
								window.setTimeout(function(){ 
								window.location.replace('index.php?hl=mobil');
								} ,1000); 
								</script>";
		}
	}
}
?>