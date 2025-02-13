<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Riwayat Booking</h3>
            <a class="btn btn-warning" target="_blank"
                href="laporan_booking.php?id_pelanggan=<?= $_SESSION['id_pelanggan'] ?>"><i class="fas fa-print"></i>
                Cetak</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>ID BOOKING</th>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Merk Mobil</th>
                        <th>Keluhan</th>
                        <th>Status Booking</th>
                        <th>Detail</th>
                    </tr>
                    <?php
                    $no = 0;

                    $query = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN jadwal ON jadwal.id_jadwal=booking.id_jadwal LEFT JOIN mobil ON mobil.id_mobil=booking.id_mobil WHERE booking.id_pelanggan='$_SESSION[id_pelanggan]' ORDER BY date_created DESC");


                    while ($data = mysqli_fetch_assoc($query)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['id_booking'] ?></td>
                            <td><?= $data['hari'] ?></td>
                            <td><?= $data['tgl_booking'] ?></td>
                            <td><?= $data['merk_mobil'] ?></td>
                            <td><?= $data['keluhan'] ?></td>
                            <td><?= $data['status'] ?></td>

                            <td>
                                <a href="?hl=detail_booking&id_booking=<?= $data['id_booking'] ?>"
                                    class="btn btn-sm btn-primary mb-2"><i class="fa fa-search"></i> Detail</a>

                                <a href="?hl=buktidaftar&id_booking=<?= $data['id_booking'] ?>"
                                    class="btn btn-sm btn-info"><i class="fa fa-print"></i> No Antrian</a>
                            </td>

                        </tr>
                    <?php
                    } ?>
                </table>
            </div>
        </div>
    </div>
</div>