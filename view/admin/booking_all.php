<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Laporan Data Booking</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="report_booking.php" method="post" target="_blank" class="mb-3">
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
                                $cek_motor = $conn->query("SELECT * FROM pelanggan");
                                while ($data_m = mysqli_fetch_assoc($cek_motor)) {
                                    echo "<option value='$data_m[id_pelanggan]'>$data_m[nama] - $data_m[alamat]</option>";
                                }
                                ?>
                                <option value="all">Semua Data Booking</option>
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
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Tanggal</th>
                        <th>Merk Mobil</th>
                        <th>Keluhan</th>
                        <th>Mekanik</th>
                        <th>Status Booking</th>
                        <th>Status Pelayanan</th>
                        <th>Keterangan</th>
                        <th>Jenis Layanan</th>
                        <th>Biaya</th>
                    </tr>
                    <?php
                    $no = 0;
                    $tgl = date('Y-m-d');
                    $query = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN jadwal ON jadwal.id_jadwal=booking.id_jadwal LEFT JOIN mekanik on booking.id_mekanik=mekanik.id_mekanik LEFT JOIN pelanggan on booking.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN antrian ON booking.id_booking=antrian.id_booking 
                LEFT JOIN status_antrian ON antrian.id_status=status_antrian.id_status LEFT JOIN keterangan_antrian ON antrian.id_keterangan=keterangan_antrian.id_keterangan WHERE booking.status='DISETUJUI' ORDER BY date_created desc");
                    while ($data = mysqli_fetch_assoc($query)) {
                        $cek_layanan = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_booking='$data[id_booking]'");
                        $data_layanan = mysqli_fetch_assoc($cek_layanan);
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['id_booking'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['hari'] ?></td>
                            <td><?= $data['jam'] ?></td>
                            <td><?= $data['tgl_booking'] ?></td>
                            <td><?= $data['merk_mobil'] ?></td>
                            <td><?= $data['keluhan'] ?></td>
                            <td><?= $data['nama_mekanik'] ?></td>
                            <td><span class="badge bg-success"><?= $data['status'] ?></span></td>
                            <td><span class="badge bg-success"><?= $data['status_antrian'] ?></span></td>
                            <td><?= $data['keterangan'] ?></td>
                            <td><?= $data_layanan['jenis_pelayanan'] ?></td>
                            <td><?= number_format($data_layanan['biaya'], 0, ',', '.') ?></td>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>