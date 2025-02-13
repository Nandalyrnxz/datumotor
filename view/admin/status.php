<div class="col-sm-12 col-md-12">
  <div class="card">  
    <div class="card-header">
      <h3>Data Status Antrian</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
    <table class="table table-striped">
      <tr>
        <th><a href="index.php?hl=addstatus" class="btn btn-sm btn-info"><i class="ion ion-plus"></i></a></th>
      	<!-- <th><a href="report_pelanggan.php" class="btn btn-sm btn-info"><i class="ion ion-printer"></i></a></th> -->
      	<th>No</th>
      	<th>Status</th>
      </tr>
      <?php 

      $batas   = 5;
        $halaman = @$_GET['halaman'];
            if(empty($halaman)){
                $posisi  = 0;
                $halaman = 1;
            }
            else{
                $posisi  = ($halaman-1) * $batas;
            }


      $no = $posisi+1;
      $n=0;
      $query=mysqli_query($conn,"SELECT * FROM status_antrian ORDER BY id_status ASC limit $posisi,$batas");
      while($data=mysqli_fetch_assoc($query)){
        $n++;
        echo "<tr>";
        echo "<td><a href='index.php?hl=ubah_status&id_status=$data[id_status]' class='btn btn-sm btn-warning'><i class='ion ion-edit'></i></a> <a href='index.php?hl=delete_status&id_status=$data[id_status]' class='btn btn-sm btn-danger'><i class='ion ion-trash-a'></i></a></td>";
        echo "<td>$n</td>";
        echo "<td>$data[status_antrian]</td>";
        echo "</tr>";
        $no++;

      }
      ?>
  </table>
  </div>

    </div>
  </div>
  
    <?php

    $query3     = mysqli_query($conn, "select * from status_antrian");
    $jmldata    = mysqli_num_rows($query3);
    $jmlhalaman = ceil($jmldata/$batas);
    ?>
    <div class="card-footer text-center">
    	<nav class="d-inline-block">
        <ul class="pagination mb-0">
            <?php
            for($i=1;$i<=$jmlhalaman;$i++) {
                if ($i != $halaman) {
                    echo "<li class='page-item'><a class='page-link' href='index.php?hl=status&halaman=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
            }
            ?>
        </ul>
    </nav>
    </div>

