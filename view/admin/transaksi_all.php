<div class="table-responsive">
    <form action="report_transaksi.php" method="post" target="_blank" class="mb-3">
        <div class="row">
            <div class="col-lg-3">
                <input type="date" name="tgl_awal" class="form-control mb-2" value="<?= date('Y-m-01') ?>" required>
            </div>
            <div class="col-lg-3">
                <input type="date" name="tgl_akhir" class="form-control mb-2" value="<?= date('Y-m-d') ?>" required>
            </div>
            <div class="col-lg-3">
                <select name="id_pelanggan" class="form-control mb-2" required>
                    <option value="">- Pilih Pelanggan -</option>
                    <?php
                    $cek_pelanggan = $conn->query("SELECT * FROM pelanggan");
                    while ($data_m = mysqli_fetch_assoc($cek_pelanggan)) {
                        echo "<option value='$data_m[id_pelanggan]'>$data_m[nama] $data[alamat]</option>";
                    }
                    ?>
                    <option value="all">Semua Transaksi</option>
                </select>
            </div>
            <div class="col-lg-2">
                <button type="submit" class="btn btn-danger"><i class="fas fa-print"></i> Cetak</button>
            </div>
        </div>
    </form>
    <table class="table table-striped" id="myTable">
        <tr>
            <th>No</th>
            <th>ID Booking</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Pelayanan</th>
            <th>Bukti Pembayaran</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
        <?php
        $no = 0;
        $tgl = date('Y-m-d');
        $query = mysqli_query($conn, "SELECT * FROM pembayaran LEFT JOIN pelanggan on pelanggan.id_pelanggan=pembayaran.id_pelanggan LEFT JOIN booking ON booking.id_booking=pembayaran.id_booking WHERE pembayaran.status='DISETUJUI' ORDER BY date_created desc");
        while ($data = mysqli_fetch_assoc($query)) {
            $cek_layanan = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_booking='$data[id_booking]'");
            $data_layanan = mysqli_fetch_assoc($cek_layanan);
            $no++;
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data['id_booking'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['tgl_pembayaran'] ?></td>
                <td><?= $data_layanan['jenis_pelayanan'] ?></td>
                <td><img src='../../dist/img/bukti/<?= $data['filename'] ?>' height='100px'></td>
                <td>Rp.<?= number_format($data_layanan['biaya']) ?></td>
                <td><span class="badge bg-success" style="color: white"><?= $data['status'] ?></span></td>
            <?php } ?>
    </table>
</div>