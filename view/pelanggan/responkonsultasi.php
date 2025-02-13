<?php
$query = mysqli_query($conn, "SELECT * FROM konsultasi LEFT JOIN pelanggan ON pelanggan.id_pelanggan=konsultasi.id_pelanggan WHERE id_konsultasi='$_GET[idk]'");
$data  = mysqli_fetch_array($query);
if ($data['foto'] == null) {
    $foto = "default.png";
} else {
    $foto = $data['foto'];
}

?>


<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">KONSULTASI</h3>
            <a href="?hl=konsultasi" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h4><?= $data['merek'] . ' ' . $data['jenis'] . ' ' . $data['tahun'] ?></h4>
                    <img src="../../dist/img/konsultasi/<?= $foto ?>" class="img-fluid mb-2 mt-2" alt="foto kerusakan">
                    <h5>Keluhan : <?= $data['keluhan'] ?></h5>
                    Diupload oleh <b><?= $data['nama'] ?></b> pada
                    <small><?= date('d-m-Y', STRTOTIME($data['tgl_konsultasi'])) ?></small><br>
                    <hr>
                    <h5>Respon</h5>
                    <?php
                    $query2 = mysqli_query($conn, "SELECT * FROM respon_konsultasi WHERE id_konsultasi='$data[id_konsultasi]'");
                    while ($data2 = mysqli_fetch_assoc($query2)) {
                        if ($data2['responden'] == 'PELANGGAN') {
                            $responden = 'Anda';
                        } else {
                            $responden = 'Admin';
                        }
                    ?>
                        <ul>
                            <li>
                                <h6><?= $responden ?></h6>
                                <p><?= $data2['respon'] ?> (<?= date('d-m-Y H:i', STRTOTIME($data2['waktu'])) ?>)</p>
                            </li>
                        </ul>
                    <?php } ?>
                    <br>
                    <form action="?hl=save_respon" method="post">
                        <div class="row">
                            <div class="col-10">
                                <input type="hidden" name="id_konsultasi" value="<?= $data['id_konsultasi'] ?>">
                                <input type="text" name="solusi" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="submit" name="kirim" value="Kirim" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>