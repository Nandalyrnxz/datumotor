<div class="col-sm-12 col-md-12">
     <h4 class="section-header" style="font-family:times new roman; text-align: center;">Data User</h4>
      

  <div class="table-responsive">
    <table class="table table-striped">
      <tr style="background-color: lightgreen;font-size: 10px">
      	<th><a href="index.php?hl=adduser" class="btn btn-sm btn-info"><i class="ion ion-plus"></i></a></th>
      	<th>No</th>
      	<th>Data</th>
      	<th>Aktif</th>
     
      
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
      $query=mysqli_query($conn,"SELECT * FROM user ORDER BY username ASC limit $posisi,$batas");
      while($data=mysqli_fetch_array($query)){
      	
      	echo "<tr style='font-size:10px;'>";
      	echo "<td><a href='index.php?hl=ubah_user&username=$data[0]' class='btn btn-sm btn-warning'><i class='ion ion-edit'></i></a><br><br> 
        <a href='index.php?hl=delete_user&username=$data[0]' class='btn btn-sm btn-danger'><i class='ion ion-trash-a'></i></a></td>";
      
      	echo "<td>$no</td>";
      	echo "<td><b><a style='color:green'>Username : <a/>$data[0]</b><br>
                    <a style='color:green'>Password : </a>$data[1]<br>
                    <a style='color:green'>Nama :</a> $data[2]<br>
                    <a style='color:green'>Status :</a> $data[3]<br>
        </td>";
      	echo "<td>$data[4]</td>";
      	
      	
      	echo "</tr>";
      	$no++;

      }
      ?>
  </table>
</div>

    <?php

    $query3     = mysqli_query($conn, "select * from user");
    $jmldata    = mysqli_num_rows($query3);
    $jmlhalaman = ceil($jmldata/$batas);
    ?>
    <div class="card-footer text-center">
    	<nav class="d-inline-block">
        <ul class="pagination mb-0">
            <?php
            for($i=1;$i<=$jmlhalaman;$i++) {
                if ($i != $halaman) {
                    echo "<li class='page-item'><a class='page-link' href='index.php?hl=user&halaman=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
            }
            ?>
        </ul>
    </nav>
    </div>
