<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Mekanik</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama" class="form-control" required="yes">
                            </td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td><input type="file" name="foto" class="form-control" required="yes">
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
	if(isset($_POST['simpan'])){

		$nama=$_POST['nama'];
		$aktif=$_POST['aktif'];
		$fileName = $_FILES['foto']['name']; //get the file name
		$fileSize = $_FILES['foto']['size']; //get the size
		$fileError = $_FILES['foto']['error']; //get the error when upload
		if($fileSize > 0 || $fileError == 0){ //check if the file is corrupt or error
		$move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../dist/img/mekanik/'.$fileName);
		}
		$simpan=mysqli_query($conn,"INSERT INTO mekanik VALUES(NULL,'$nama','$fileName','$aktif')");
		if ($simpan) {
			echo "<script type='text/javascript'>
					setTimeout(function () {  
					swal({
					title: 'Sukses',
					text:  'Mekanik ditambahkan !',
					icon: 'success',
					timer: 1000,
					showConfirmButton: true
					});  
					},10); 
					window.setTimeout(function(){ 
					window.location.replace('index.php?hl=mekanik');
					} ,1000); 
				</script>"; 
		}else{
			echo "<script type='text/javascript'>
					setTimeout(function () {  
					swal({
					title: 'Failed',
					text:  'Mekanik gagal ditambahkan !',
					icon: 'error',
					timer: 1000,
					showConfirmButton: true
					});  
					},10); 
					window.setTimeout(function(){ 
					window.location.replace('index.php?hl=mekanik');
					} ,1000); 
				</script>"; 

		}

		}

			
	?>