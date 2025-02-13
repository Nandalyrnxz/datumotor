<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Admin</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" class="form-control" id=username required="yes">
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" class="form-control" required="yes">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama" class="form-control" required="yes">
                            </td>
                        </tr>
                        <tr>
                            <td>Aktif</td>
                            <td><select name="aktif" class="form-control">
                                    <option>- Pilih -</option>
                                    <option value="ya">ya</option>
                                    <option value="tidak">tidak</option>

                                </select>
                            </td>
                        </tr>
                        <tr>

                            <td colspan="2"><input type="submit" name="simpan" value="Simpan"
                                    class="btn btn-block btn-success" required></td>
                        </tr>
                    </table>

            </form>

        </div>
    </div>



    <?php
	if (isset($_POST['simpan'])) {

		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$nama = $_POST['nama'];
		$aktif = $_POST['aktif'];

		$cek = mysqli_query($conn, "SELECT email FROM admin WHERE email='$email'");
		$has = mysqli_num_rows($cek);
		if ($has > 0) {
			echo "<script type='text/javascript'>
							setTimeout(function () {  
							swal({
							title: 'Failed',
							text:  'Email sudah terdaftar !',
							icon: 'error',
							timer: 1000,
							showConfirmButton: true
							});  
							},10); 
							window.setTimeout(function(){ 
							window.location.replace('index.php?hl=addadmin');
							} ,1000); 
						</script>";
		} else {

			$simpan = mysqli_query($conn, "INSERT INTO admin VALUES(NULL,'$email','$password','$nama','$aktif')");
			if ($simpan) {
				echo "<script type='text/javascript'>
							setTimeout(function () {  
							swal({
							title: 'Sukses',
							text:  'admin ditambahkan !',
							icon: 'success',
							timer: 1000,
							showConfirmButton: true
							});  
							},10); 
							window.setTimeout(function(){ 
							window.location.replace('index.php?hl=admin');
							} ,1000); 
						</script>";
			} else {
				echo "<script type='text/javascript'>
							setTimeout(function () {  
							swal({
							title: 'Failed',
							text:  'Admin gagal ditambahkan !',
							icon: 'error',
							timer: 1000,
							showConfirmButton: true
							});  
							},10); 
							window.setTimeout(function(){ 
							window.location.replace('index.php?hl=admin');
							} ,1000); 
						</script>";
			}
		}
	}
	?>