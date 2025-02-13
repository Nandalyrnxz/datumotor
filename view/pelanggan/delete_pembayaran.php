<?php
$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");
if ($delete) {

        echo "<script type='text/javascript'>
                    setTimeout(function () {  
                    swal({
                        title: 'Sukses',
                        text:  'Data Berhasil Dihapus !',
                        icon: 'success',
                        timer: 1000,
                        showConfirmButton: true
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                    window.location.replace('index.php?hl=pembayaran');
                    } ,100); 
                    </script>";
    } else {
        echo "<script type='text/javascript'>
                    setTimeout(function () {  
                    swal({
                        title: 'Failed',
                        text:  'Data gagal Dihapus !',
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