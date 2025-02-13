<html>

<body>
    <div class="col-sm-12 col-md-12">
        <h4 class="section-header" style="font-family:times new roman;text-align: center;">Tambah Data Mobil</h4>
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Merk Mobil</td>
                        <td><input type="text" name="merk_mobil" class="form-control" required="yes"></td>
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
    var_dump($_POST['simpan']);

    include "koneksi.php";

    $merk_mobil = $_POST['merk_mobil'];

    $cek = mysqli_query($conn, "SELECT * FROM mobil WHERE merk_mobil='$merk_mobil'");
    $cek_hasil = mysqli_num_rows($cek);

    if ($cek_hasil > 0) {

        echo "<script type='text/javascript'>
						setTimeout(function () {  
						swal({
						title: 'Failed',
						text:  'Data Mobil Sudah ada !',
						icon: 'error',
						timer: 3000,
						showConfirmButton: true
						});  
						},10); 
						window.setTimeout(function(){ 
						window.location.replace('index.php?hl=suku_cadang');
						} ,3000); 
					</script>";
    } else {
        $simpan = mysqli_query($conn, "INSERT INTO mobil VALUES (NULL, '$merk_mobil')");
        var_dump($cek_hasil);
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
                            window.location.replace('index.php?hl=suku_cadang');
                            } ,1000); 
                        </script>";
        } else {
            echo "<script type='text/javascript'>
                            setTimeout(function () {  
                            swal({
                            title: 'Failed',
                            text:  'Dta Mobil gagal ditambahkan !',
                            icon: 'error',
                            timer: 1000,
                            showConfirmButton: true
                            });  
                            },10); 
                            window.setTimeout(function(){ 
                            window.location.replace('index.php?hl=suku_cadang');
                            } ,1000); 
                        </script>";
        }
    }
}
?>