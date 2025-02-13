<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Laporan Transaksi Tahunan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="post" class="mb-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <input type="year" name="tanggal" class="form-control mb-2" value="<?= isset($_POST['tanggal']) ? $_POST['tanggal'] : '' ?>"
                                required>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-danger" name="cari">Cari Data</button>
                        </div>
                        <div class="col-lg-2 pl-0">
                            <a href="report_transaksi_tahunan.php?tahun=<?= $_POST['tanggal'] ?>" target="_blank" class="btn btn-warning">Cetak Data</a>
                        </div>
                    </div>
                </form>
                <table class="table table-striped">
                    <tr align="center">
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Pelayanan</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th class="text-right">Pembayaran</th>
                    </tr>
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $no = 0;
                    $data = null;

                    if (isset($_POST['cari'])) {
                        $tgl = $_POST['tanggal'];
                        // $tahun = date('Y', strtotime($tgl));
                        $subtot = 0;
                        // var_dump($tgl);
                        // die;

                        $query = mysqli_query($conn, "SELECT
                        date(pembayaran.tgl_pembayaran) AS tanggalbayar,
                        pelayanan.jenis_pelayanan,
                        pembayaran.filename,
                        SUM(pelayanan.biaya) AS pembayaran,
                        pembayaran.status

                        FROM `pembayaran` 
                        INNER JOIN booking ON pembayaran.id_booking = pembayaran.id_booking
                        INNER JOIN pelayanan ON booking.id_booking = pelayanan.id_booking

                        WHERE YEAR(booking.tgl_booking) = '$tgl'
                        AND pembayaran.status = 'DISETUJUI'
                        AND pembayaran.id_booking = booking.id_booking
                        GROUP BY pembayaran.id_booking");

                        while ($data = mysqli_fetch_assoc($query)) {
                            $no++;
                            $subtot = $subtot + $data['pembayaran'];
                            // var_dump($data['tanggalbayar']);
                            // die;
                    ?>
                            <tr align="center">
                                <td><?= $no ?></td>
                                <td><?= date('Y', strtotime($data['tanggalbayar'])) ?></td>
                                <td><?= $data['jenis_pelayanan'] ?></td>
                                <td><img src='../../dist/img/bukti/<?= $data['filename'] ?>' height='100px'></td>
                                <td><?= $data['status'] ?></td>
                                <td align="right">Rp. <?= number_format($data['pembayaran']) ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <th colspan="6" style="text-align:right;">
                            <h3>Total Pendapatan : Rp. <?= number_format($subtot) ?></h3>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>