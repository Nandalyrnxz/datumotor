<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>SUKU CADANG</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="post">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Aksi</th>

                        </tr>
                        <?php

                        $no = 0;
                        $query = mysqli_query($conn, "SELECT * FROM suku_cadang ORDER BY id DESC");
                        while ($data = mysqli_fetch_assoc($query)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['harga'] ?></td>
                                <td>
                                    <a href="?hl=jumlah_pembelian&id=<?= $data['id'] ?>" class="btn btn-sm btn-warning mb-2"><i class="fas fa-shopping-cart"></i></a>
                                <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>