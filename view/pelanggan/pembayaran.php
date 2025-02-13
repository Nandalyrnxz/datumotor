<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Pembayaran</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Id Booking</th>
                        <th>Tgl Pembayaran</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Total Pembayaran</th>
                        <th>Status Antrian</th>

                    </tr>
                    <?php
                    $no = 0;
                    $query = mysqli_query($conn, "SELECT * FROM pelayanan LEFT JOIN booking ON pelayanan.id_booking=booking.id_booking LEFT JOIN antrian ON antrian.id_booking=booking.id_booking LEFT JOIN status_antrian ON antrian.id_status=status_antrian.id_status LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan WHERE booking.id_pelanggan = '$_SESSION[id_pelanggan]'");
                    while ($data = mysqli_fetch_assoc($query)) {
                        // var_dump($data);
                        // die;
                        $no++;
                        $query2 = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_booking='$data[id_booking]'");

                        $result = mysqli_fetch_assoc($query2);

                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['id_booking'] ?></td>
                            <td><?= date('d-m-Y', strtotime($result['tgl_pembayaran'])) ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jenis_pelayanan'] ?></td>
                            <td><?= $data['biaya'] ?></td>
                            <td><?= $data['status_antrian'] ?></td>
                            <td>
                                <?php
                                if ($result['status'] == 'DISETUJUI') {
                                ?>
                                    <a href="?hl=checkout&id_booking=<?= $data['id_booking'] ?>&id_pelanggan=<?= $_SESSION['id_pelanggan'] ?>"
                                        class="btn btn-sm btn-primary disabled mb-2">Sudah Bayar</a>
                                <?php
                                } elseif ($result['status'] == 'DIPROSES') {
                                ?>
                                    <a href="?hl=checkout&id_booking=<?= $data['id_booking'] ?>&id_pelanggan=<?= $_SESSION['id_pelanggan'] ?>"
                                        class="btn btn-sm btn-primary disabled mb-2">Di Proses</a>
                                <?php
                                } else { ?>
                                    <a href="?hl=checkout&id_booking=<?= $data['id_booking'] ?>&id_pelanggan=<?= $_SESSION['id_pelanggan'] ?>"
                                        class="btn btn-sm btn-primary mb-2">Bayar</a>
                                <?php } ?>

                            </td>


                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>