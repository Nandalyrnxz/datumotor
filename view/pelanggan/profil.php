<?php
$query = mysqli_query($conn, "select * from pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'");
$data = mysqli_fetch_array($query);
?>
<div class="col-sm-12 col-md-12">
    <h3 class="section-header" style="font-family:times new roman; text-align: center;">Profil User
        <hr>
        <form action="" method="POST">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <td><input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>:</th>
                    <td><input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <th>:</th>
                    <td><?php echo $data['password']; ?><br>
                        <input type="hidden" name="password_lama" value="<?= $data['password'] ?>">
                        <input type="password" name="password_baru" class="form-control" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <th>:</th>
                    <td>
                        <select name="jk" class="form-control">
                            <option value="Laki-laki" <?php if ($data['jk'] == 'Laki-laki') echo "selected"; ?>>
                                Laki-laki</option>
                            <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan') echo "selected"; ?>>
                                Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <td><input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>No Whatsapp</th>
                    <th>:</th>
                    <td><input type="text" name="no_wa" class="form-control" value="0<?php echo $data['no_wa']; ?>">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <td><input type="submit" value="Ubah" name="ubah" class="btn btn-sm btn-warning btn-block"></td>
                </tr>

            </table>
        </form>
</div>

<?php
if (isset($_POST['ubah'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	if ($_POST['password_baru']) {
		$pw = md5($_POST['password_baru']);
	} else {
		$pw = $_POST['password_lama'];
	}
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$no_wa = substr($_POST['no_wa'], 1, 11);

	$simpan = mysqli_query($conn, "UPDATE pelanggan SET nama='$nama',email='$email',password='$pw',jk='$jk',alamat='$alamat',no_wa='$no_wa' WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
	if ($simpan) {
		echo "<script type='text/javascript'>
		  setTimeout(function () {  
		   swal({
		    title: 'Sukses',
		    text:  'Berhasil Mengubah data!',
		    icon: 'success',
		    timer: 2000,
		    showConfirmButton: true
		   });  
		  },10); 
		  window.setTimeout(function(){ 
		   window.location.replace('index.php?hl=profil');
		  } ,3000); 
 		</script>";
	} else {
		echo "<script type='text/javascript'>
		  setTimeout(function () {  
		   swal({
		    title: 'Gagal',
		    text:  'Konsultasi gagal diubah!',
		    icon: 'error',
		    timer: 2000,
		    showConfirmButton: true
		   });  
		  },10); 
		  window.setTimeout(function(){ 
		   window.location.replace('index.php?hl=profil');
		  } ,3000); 
 		</script>";
	}
}
?>