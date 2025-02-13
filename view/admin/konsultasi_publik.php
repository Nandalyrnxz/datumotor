<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Konsultasi Publik</h3>
            <a href="?hl=konsultasi" class="btn btn-secondary">Kembali</a><br>
            <small>Konsultasi Publik merupakan konsultasi yang dilakukan orang tanpa login akun dan dapat diakses oleh publik.</small>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped">
                <tr class="bg-success" >
                    <th>No</th>
                    <th>Tanggal Konsultasi</th>
                    <th>Pelanggan</th>
                    <th>Mobil</th>
                    <th>Keluhan</th>
                    <th>Respon</th>
                    <th></th>
                </tr>
                <?php
                $no=0;
                $query=mysqli_query($conn,"SELECT * FROM konsultasi_publik LEFT JOIN mobil ON mobil.id_mobil=konsultasi_publik.id_mobil ORDER BY tanggal_kp DESC");
                while($data=mysqli_fetch_assoc($query)){
                    $no++;
                     ?>
                    <tr>
                    <td><?= $no ?></td>
                    <td><?= date('d-m-Y',STRTOTIME($data['tanggal_kp'])) ?></td>
                    <td><?= $data['nama_kp'] ?></td>
                    <td><?= $data['merk_mobil'] ?> <?= $data['tipe_mobil'] ?> Tahun <?= $data['tahun_produksi_mobil'] ?> </td>
                    <td><?= $data['keluhan'] ?></td>
                    <td><?= $data['solusi'] ?></td>
                    <td>
                        <a href="?hl=ubah_respon&idkp=<?= $data['id_kp'] ?>" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i>Edit Respon</a>
                        <a href="?hl=hapus_kp&idkp=<?= $data['id_kp'] ?>" class="btn btn-sm btn-danger mb-2"><i class="fas fa-trash"></i>Hapus</a>
                    </td> 
                    </tr>

                <?php } ?>
            </table>
            </div>
        </div>
    </div>
</div>