<html>

<body>
    <div class="col-sm-12 col-md-12">
        <h4 class="section-header" style="font-family:times new roman;text-align: center;">Tambah Motor</h4>
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Merk Mobil</td>
                        <td><input type="text" name="merk" class="form-control" required="yes"></td>
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

	$merk = $_POST['merk'];



	$cek = mysqli_query($conn, "select * from motor where merk_motor='$merk'");
	$cek_hasil = mysqli_num_rows($cek);
	if ($cek_hasil > 0) {
		echo "<script type='text/javascript'>
						setTimeout(function () {  
						swal({
						title: 'Failed',
						text:  'Merk dan Tipe Motor Sudah ada !',
						icon: 'error',
						timer: 3000,
						showConfirmButton: true
						});  
						},10); 
						window.setTimeout(function(){ 
						window.location.replace('index.php?hl=motor');
						} ,3000); 
					</script>";
	} else {

		$simpan = mysqli_query($conn, "INSERT INTO motor VALUES(NULL,'$merk')");
		if ($simpan) {
			echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Sukses',
							    text:  'Data Motor ditambahkan !',
							    icon: 'success',
							    timer: 1000,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php?hl=motor');
							  } ,1000); 
					 		</script>";
		} else {
			echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Failed',
							    text:  'Data Motor gagal ditambahkan !',
							    icon: 'error',
							    timer: 1000,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php?hl=motor');
							  } ,1000); 
					 		</script>";
		}
	}
}
?>