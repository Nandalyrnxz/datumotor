<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>KONSULTASI</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="?hl=addkonsultasi" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah
                    Konsultasi</a>

                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Konsultasi</th>
                        <th>Keluhan</th>
                        <th>Merk Mobil</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    <?php
                    $no = 0;
                    $query = mysqli_query($conn, "SELECT * FROM konsultasi WHERE konsultasi.id_pelanggan='$_SESSION[id_pelanggan]' ORDER BY id_konsultasi DESC");
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
                                <?php if ($data['status'] == 'DIRESPON') { ?>
                                    <a href="?hl=responkonsultasi&idk=<?= $data['id_konsultasi'] ?>" class="btn btn-sm btn-info mb-2"><i class="fas fa-arrow-right"></i></a>
                                <?php } else { ?>
                                    <a href="?hl=editkonsultasi&idk=<?= $data['id_konsultasi'] ?>" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i></a>
                                    <a href="?hl=hapuskonsultasi&idk=<?= $data['id_konsultasi'] ?>" class="btn btn-sm btn-danger mb-2"><i class="fas fa-trash"></i></a>
                                <?php } ?>
                            </td>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>