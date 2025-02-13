<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM mobil where id_mobil='$id'");
$data = mysqli_fetch_assoc($query);
?>

<div class="col-sm-12 col-md-12">
    <div class="card">
        <h3>Ubah Data Mobil</h3>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Merk Mobil</td>
                        <td>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="text" name="merk_mobil" class="form-control"
                                value="<?php echo $data['merk_mobil']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="update" value="Update"
                                class="btn btn-block btn-success" required></td>
                    </tr>
                </table>
        </form>

    </div>

    <?php
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $merk_mobil = $_POST['merk_mobil'];

        $update = mysqli_query($conn, "UPDATE mobil SET merk_mobil='$merk_mobil' WHERE id_mobil='$id'");
        if ($update) {
            echo "<script type='text/javascript'>
                setTimeout(function () {  
                swal({
                title: 'Sukses',
                text:  'Data Berhasil Diubah !',
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
                text:  'Data gagal Diubah !',
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
