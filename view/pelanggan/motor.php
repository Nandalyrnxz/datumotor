<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Motor</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Merk Motor</th>
                        <th>Jenis Motor</th>
                    </tr>
                    <?php

                    $no = 0;
                    $query = mysqli_query($conn, "SELECT * FROM motor WHERE id_pelanggan='$_SESSION[id_pelanggan]' ORDER BY id_motor DESC");
                    while ($data = mysqli_fetch_assoc($query)) {
                        $no++;
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['merk_motor'] ?></td>
                        <td><?= $data['jenis_motor'] ?></td>
                        <td>
                            <a href="?hl=editmotor&id=<?= $data['id_motor'] ?>" class="btn btn-sm btn-warning mb-2"><i
                                    class="fas fa-edit"></i></a>
                            <a href="?hl=hapusmotor&id=<?= $data['id_motor'] ?>" class="btn btn-sm btn-danger mb-2"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>