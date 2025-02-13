<?php
if (isset($_GET['id_booking'])) {

    $query = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN jadwal ON booking.id_jadwal=jadwal.id_jadwal LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan WHERE booking.id_booking ='$_GET[id_booking]' and booking.id_pelanggan='$_SESSION[id_pelanggan]'");
    $data  = mysqli_fetch_array($query);
    // var_dump($data);

?>


    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Nomor Antrian</h3>
                <a href="?hl=riwayatbooking" class="btn btn-secondary">Kembali</a>
                <a class="btn btn-warning" target="_blank" href="no_antrian.php?id_booking=<?= $data['id_booking'] ?>&id=<?= $_SESSION['id_pelanggan'] ?>"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td>
                                <h5>ID Booking </h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5><?= $data['id_booking'] ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Hari</h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5><?= $data['hari'] ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Jam</h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5><?= $data['jam'] ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Tanggal</h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5><?= $data['tgl_booking'] ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Merk Mobil</h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5><?= $data['merk_mobil'] ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Keluhan</h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5><?= $data['keluhan'] ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Pelanggan</h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5><?= $data['nama'] ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Alamat</h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5><?= $data['alamat'] ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>No Whatsapp</h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5>0<?= $data['no_wa'] ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Status</h5>
                            </td>
                            <td>
                                <h5>: </h5>
                            </td>
                            <td>
                                <h5><?= $data['status'] ?></h5>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>



<?php
}
?>