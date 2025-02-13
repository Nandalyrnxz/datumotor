<?php
$id_booking = $_GET['id_booking'];
$id_pelanggan = $_GET['id_pelanggan'];
?>

<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Pembayaran</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table mb-5">
                        <input type="hidden" name="id_booking" class="form-control" value="<?= $id_booking; ?>">
                        <input type="hidden" name="id_pelanggan" class="form-control" value="<?= $id_pelanggan; ?>">
                        <tr>
                            <th>
                                <h3>Transfer</h3>
                                <h5>No. Rekening Tujuan : 12313132</h5>
                            </th>
                        </tr>
                        <tr>
                            <td>Upload Bukti Pembayaran</td>
                            <td>
                                <input type="file" name="bukti" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="upload" value="Bayar" class="btn btn-block btn-success" required></td>
                        </tr>
                    </table>
                </div>
            </form>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table">
                        <input type="hidden" name="id_booking" class="form-control" value="<?= $id_booking; ?>">
                        <input type="hidden" name="id_pelanggan" class="form-control" value="<?= $id_pelanggan; ?>">
                        <tr>
                            <th>
                                <h3>Pembayaran Langsung</h3>
                                <p>Silahkan upload bukti pembayaran langsung dari toko</p>
                            </th>
                        </tr>
                        <tr>
                            <td>Upload Bukti Pembayaran</td>
                            <td>
                                <input type="file" name="bukti" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="upload2" value="Bayar" class="btn btn-block btn-success" required></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['upload'])) {

        $id_pelanggan = $_POST['id_pelanggan'];
        $id_booking = $_POST['id_booking'];
        $tgl = date('Y-m-d');
        $status = 'DIPROSES';
        $jenis_pembayaran = "TRANSFER";
        $fileName = $_FILES['bukti']['name']; //get the file name
        $fileSize = $_FILES['bukti']['size']; //get the size
        $fileError = $_FILES['bukti']['error']; //get the error when upload
        if ($fileSize > 0 || $fileError == 0) { //check if the file is corrupt or error
            $move = move_uploaded_file($_FILES['bukti']['tmp_name'], '../../dist/img/bukti/' . $fileName);
        }

        $update = mysqli_query($conn, "INSERT INTO pembayaran VALUES (NULL, '$id_pelanggan','$id_booking', '$tgl', '$fileName', '$status', '$jenis_pembayaran')");

        if ($update) {

            echo "<script type='text/javascript'>
            setTimeout(function () {  
            swal({
            title: 'Sukses',
            text:  'Berhasil Diproses !',
            icon: 'success',
            timer: 1000,
            showConfirmButton: true
            });  
            },10); 
            window.setTimeout(function(){ 
            window.location.replace('index.php?hl=pembayaran');
            } ,1000); 
        </script>";
        } else {
            echo "<script type='text/javascript'>
            setTimeout(function () {  
            swal({
            title: 'Failed',
            text:  'Gagal Diproses !',
            icon: 'error',
            timer: 1000,
            showConfirmButton: true
            });  
            },10); 
            window.setTimeout(function(){ 
            window.location.replace('index.php?hl=pembayaran');
            } ,1000); 
        </script>";
        }
    }
    if (isset($_POST['upload2'])) {

        $id_pelanggan = $_POST['id_pelanggan'];
        $id_booking = $_POST['id_booking'];
        $tgl = date('Y-m-d');
        $status = 'DIPROSES';
        $jenis_pembayaran = "LANGSUNG";
        $fileName = $_FILES['bukti']['name']; //get the file name
        $fileSize = $_FILES['bukti']['size']; //get the size
        $fileError = $_FILES['bukti']['error']; //get the error when upload
        if ($fileSize > 0 || $fileError == 0) { //check if the file is corrupt or error
            $move = move_uploaded_file($_FILES['bukti']['tmp_name'], '../../dist/img/bukti/' . $fileName);
        }

        $update = mysqli_query($conn, "INSERT INTO pembayaran VALUES (NULL, '$id_pelanggan','$id_booking', '$tgl', '$fileName', '$status', '$jenis_pembayaran')");

        if ($update) {

            echo "<script type='text/javascript'>
            setTimeout(function () {  
            swal({
            title: 'Sukses',
            text:  'Berhasil Diproses !',
            icon: 'success',
            timer: 1000,
            showConfirmButton: true
            });  
            },10); 
            window.setTimeout(function(){ 
            window.location.replace('index.php?hl=pembayaran');
            } ,1000); 
        </script>";
        } else {
            echo "<script type='text/javascript'>
            setTimeout(function () {  
            swal({
            title: 'Failed',
            text:  'Gagal Diproses !',
            icon: 'error',
            timer: 1000,
            showConfirmButton: true
            });  
            },10); 
            window.setTimeout(function(){ 
            window.location.replace('index.php?hl=pembayaran');
            } ,1000); 
        </script>";
        }
    }
