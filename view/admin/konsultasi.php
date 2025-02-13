<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Konsultasi Pelanggan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="report_konsultasi.php" method="post" target="_blank" class="mb-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <input type="date" name="tgl_awal" value="<?= date('Y-m-01') ?>" class="form-control mb-2" required>
                        </div>
                        <div class="col-lg-3">
                            <input type="date" name="tgl_akhir" value="<?= date('Y-m-d') ?>" class="form-control mb-2" required>
                        </div>
                        <div class="col-lg-3">
                            <select name="merk_mobil" class="form-control mb-2" required>
                                <option value="">- Pilih Merk Mobil -</option>
                                <?php
                                $cek_motor = $conn->query("SELECT * FROM mobil");
                                while ($data_m = mysqli_fetch_assoc($cek_motor)) {
                                    echo "<option value='$data_m[id_mobil]'>$data_m[merk_mobil]</option>";
                                }
                                ?>
                                <option value="all">Semua Merk Mobil</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </form>
                <table class="table table-striped">
                    <tr class="bg-success">
                        <th>No</th>
                        <th>Tanggal Konsultasi</th>
                        <th>Keluhan</th>
                        <th>Merk Mobil</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    <?php
                    $no = 0;
                    $query = mysqli_query($conn, "SELECT * FROM konsultasi ORDER BY tgl_konsultasi DESC");
                    while ($data = mysqli_fetch_assoc($query)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= date('d-m-Y', STRTOTIME($data['tgl_konsultasi'])) ?></td>
                            <td><?= $data['keluhan'] ?></td>
                            <td><?= $data['merk_mobil'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td>
                                <a href="?hl=responkonsultasi&idk=<?= $data['id_konsultasi'] ?>" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i> Beri Respon</a>
                            </td>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>