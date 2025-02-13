<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>DATA MOBIL</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <a href="?hl=addsukucadang" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data Mobil</a>
                    <tr>
                        <th>No</th>
                        <th>Merk Mobil</th>
                    </tr>
                    <?php

                    $n = 0;
                    $query = mysqli_query($conn, "SELECT * FROM mobil ORDER BY id_mobil ASC");
                    while ($data = mysqli_fetch_assoc($query)) {
                        $n++;
                        echo "<tr>";
                        echo "<td>$n</td>";
                        echo "<td>$data[merk_mobil]</td>";
                        echo "<td><a href='index.php?hl=ubah_sukucadang&id=$data[id_mobil]' class='btn btn-sm btn-warning'><i class='ion ion-edit'></i></a> <a href='index.php?hl=delete_sukucadang&id=$data[id_mobil]' class='btn btn-sm btn-danger'><i class='ion ion-trash-a'></i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>