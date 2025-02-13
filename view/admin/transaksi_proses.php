<div class="col-lg-12">
    <div class="card">
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
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>

                    </tr>
                    <?php
                    $no = 0;
                    $query = mysqli_query($conn, "SELECT * FROM booking JOIN pelayanan ON pelayanan.id_booking=booking.id_booking JOIN pembayaran ON pembayaran.id_booking = booking.id_booking JOIN pelanggan ON pelanggan.id_pelanggan = booking.id_pelanggan WHERE pembayaran.status = 'DIPROSES' ORDER BY tgl_pembayaran DESC");
                    while ($data = mysqli_fetch_assoc($query)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['id_booking'] ?></td>
                            <td><?= date('d-m-Y', strtotime($data['tgl_pembayaran']))  ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jenis_pelayanan'] ?></td>
                            <td><?= $data['biaya'] ?></td>
                            <td><img src="../../dist/img/bukti/<?= $data['filename'] ?>" height='100px' alt=""></td>
                            <td><?= $data['status'] ?></td>
                            <td>
                                <a href="?hl=verifikasi_transaksi&id_booking=<?= $data['id_booking'] ?>" class="btn btn-sm btn-info" style="border-radius:5% ;"> <i class="fas fa-check"></i>
                                    Konfirmasi</a>
                            </td>
                            </td>


                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>