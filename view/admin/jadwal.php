<div class="col-sm-12 col-md-12">
  <div class="card">
    <div class="card-header">
      <h3>Data Jadwal Booking</h3>  
    </div>
    <div class="card-body">
      <div class="table-responsive">
    <table class="table table-striped" id="data">
      <tr class="bg-success">
        <th><a href="index.php?hl=addjadwal" class="btn btn-sm btn-info"><i class="ion ion-plus"></i></a></th>
        <th>No</th>
        <th>Hari</th>
        <th>Jam</th>
      </tr>
      <?php 

      $batas   = 10;
        $halaman = @$_GET['halaman'];
            if(empty($halaman)){
                $posisi  = 0;
                $halaman = 1;
            }
            else{
                $posisi  = ($halaman-1) * $batas;
            }


      $no = $posisi+1;
      $query=mysqli_query($conn,"SELECT * FROM jadwal ORDER BY id_jadwal ASC limit $posisi,$batas");
      while($data=mysqli_fetch_array($query)){
        
        echo "<tr>";
        echo "<td><a href='index.php?hl=ubah_jadwal&id_jadwal=$data[0]' class='btn btn-sm btn-warning'><i class='ion ion-edit'></i></a> <a href='index.php?hl=delete_jadwal&id_jadwal=$data[0]' class='btn btn-sm btn-danger'><i class='ion ion-trash-a'></i></a></td>";
        echo "<td>$no</td>";
        echo "<td>$data[1]</td>";
        echo "<td>$data[2]</td>";
        echo "</tr>";
        $no++;

      }
      ?>
  </table>
</div>

    <?php

    $query3     = mysqli_query($conn, "select * from jadwal");
    $jmldata    = mysqli_num_rows($query3);
    $jmlhalaman = ceil($jmldata/$batas);
    ?>
    <div class="card-footer text-center">
      <nav class="d-inline-block">
        <ul class="pagination mb-0">
            <?php
            for($i=1;$i<=$jmlhalaman;$i++) {
                if ($i != $halaman) {
                    echo "<li class='page-item'><a class='page-link' href='index.php?hl=jadwal&halaman=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
            }
            ?>
        </ul>
    </nav>

    </div>
  </div>
     

  
    </div>