<?php
$query = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_konsultasi='$_GET[idk]'");
$data  = mysqli_fetch_array($query);

?>


<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Ubah Konsultasi</h3>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
			<input type="hidden" name="id_konsultasi" class="form-control mb-3" value="<?= $data['id_konsultasi'] ?>">
                <div class="row">
					<div class="col-lg-6">
                        <label for="">Merk Mobil</label>
                        <select name="id_mobil" class="form-control mb-2" required>
                            <option value="">- Pilih Merk Mobil -</option>
                            <?php
							$cek_mobil = $conn->query("SELECT * FROM mobil");
							while ($data_m = mysqli_fetch_assoc($cek_mobil)) {
								echo "<option value='$data_m[id_mobil]'>$data_m[merk_mobil]</option>";
							}
							?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Tahun Keluaran</label>
                        <input type="number" name="tahun" class="form-control mb-3" value="<?= $data['tahun'] ?>">
                    </div>
                    <div class="col-lg-12">
                        <label for="">Keluhan</label>
                        <textarea name="keluhan" cols="30" rows="5"
                            class="form-control mb-3"><?= $data['keluhan'] ?></textarea>
                    </div>
                    <div class="col-lg-12">
                        <input type="submit" value="Simpan" name="konsul" class="btn btn-sm btn-success">
                        <a href="?hl=konsultasi" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['konsul'])) {
	$id_konsultasi = $_POST['id_konsultasi'];
	$id_mobil = $_POST['id_mobil'];
	$tahun = $_POST['tahun'];
	$keluhan = $_POST['keluhan'];
	$tgl = date('Y-m-d');
	$id_pelanggan = $_SESSION['id_pelanggan'];
	$status = 'BELUM DIRESPON';
	$simpan = mysqli_query($conn, "UPDATE konsultasi SET id_mobil='$id_mobil',tahun='$tahun',keluhan='$keluhan' WHERE id_konsultasi='$id_konsultasi'");
	if ($simpan) {
		echo "<script type='text/javascript'>
		  setTimeout(function () {  
		   swal({
		    title: 'Sukses',
		    text:  'Berhasil Mengubah data!',
		    icon: 'success',
		    timer: 1000,
		    showConfirmButton: true
		   });  
		  },10); 
		  window.setTimeout(function(){ 
		   window.location.replace('index.php?hl=konsultasi');
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
		   window.location.replace('index.php?hl=konsultasi');
		  } ,1000); 
 		</script>";
	}
}
?>