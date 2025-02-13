<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM suku_cadang where id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<div class="col-sm-12 col-md-12">
    <div class="card">
        <h3>Banyak Pembelian</h3>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <input type="hidden" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                    </tr>
                    <tr>
                        <td>Banyak Pembelian</td>
                        <td>
                            <input type="text" name="banyak" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <input type="hidden" name="harga" class="form-control" value="<?php echo $data['harga']; ?>">
                    </tr>

                    <tr>
                        <td colspan="2"><input type="submit" name="update" value="Tambah" class="btn btn-block btn-success" required></td>
                    </tr>
                </table>
        </form>

    </div>

    <?php
    if (isset($_POST['update'])) {

        include "koneksi.php";

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $banyak = $_POST['banyak'];
        $harga = $_POST['harga'];
        $id_pelanggan = $_SESSION['id_pelanggan'];
        $total = $banyak * $harga;
        $update = mysqli_query($conn, "INSERT INTO pembayaran VALUES (NULL, '$id_pelanggan', '$id', '$nama', '$harga', '$banyak', '$total')");

        if ($update) {

            echo "<script type='text/javascript'>
                setTimeout(function () {  
                swal({
                title: 'Sukses',
                text:  'Berhasil Menambah Barang !',
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
                text:  'Gagal Menambah Barang !',
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
