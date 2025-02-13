<div class="col-sm-12 col-md-12">
  <div class="card">
    <div class="card-header">
      <h3>Data Admin</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th><a href="index.php?hl=addadmin" class="btn btn-sm btn-info"><i
                  class="ion ion-plus"></i></a></th>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aktif</th>
          </tr>
          <?php

          $batas   = 5;
          $halaman = @$_GET['halaman'];
          if (empty($halaman)) {
            $posisi  = 0;
            $halaman = 1;
          } else {
            $posisi  = ($halaman - 1) * $batas;
          }


          $no = $posisi + 1;
          $n = 0;
          $query = mysqli_query($conn, "SELECT * FROM `admin` ORDER BY id_admin ASC limit $posisi,$batas");
          while ($data = mysqli_fetch_assoc($query)) {
            $n++;
            echo "<tr>";
            echo "<td><a href='index.php?hl=ubah_admin&id_admin=$data[id_admin]' class='btn btn-sm btn-warning'><i class='ion ion-edit'></i></a> <a href='index.php?hl=delete_admin&id_admin=$data[id_admin]' class='btn btn-sm btn-danger'><i class='ion ion-trash-a'></i></a></td>";
            echo "<td>$n</td>";
            echo "<td>$data[nama]</td>";
            echo "<td>$data[email]</td>";
            echo "<td>$data[aktif]</td>";
            echo "</tr>";
            $no++;
          }
          ?>
        </table>
      </div>

    </div>
  </div>

  <!-- <div class="float-right">
                   <form action="" method="POST">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="id_pelanggan.." name="id_pelanggan">
                          <div class="input-group-btn">
                            <input type="submit" class="btn btn-outline-success" value="Cari" name="cari_ip">
                          </div>
                        </div>
                      </form>
                    </div>-->


  <?php

  $query3     = mysqli_query($conn, "select * from admin");
  $jmldata    = mysqli_num_rows($query3);
  $jmlhalaman = ceil($jmldata / $batas);
  ?>
  <div class="card-footer text-center">
    <nav class="d-inline-block">
      <ul class="pagination mb-0">
        <?php
        for ($i = 1; $i <= $jmlhalaman; $i++) {
          if ($i != $halaman) {
            echo "<li class='page-item'><a class='page-link' href='index.php?hl=data_admin&halaman=$i'>$i</a></li>";
          } else {
            echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
          }
        }
        ?>
      </ul>
    </nav>
  </div>