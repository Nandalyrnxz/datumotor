<div class="col-md-12 col-sm-12">
    <h4 class="section-header" style="font-family:times new roman; text-align: center;">Riwayat Booking</h4>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label>Id Pelanggan</label>
                <input type="text" name="id_pelanggan" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>
                    <hr>
                </label>
                <input type="submit" name="cari" value="Cari" class="btn btn-success">
            </div>
        </div>

    </form>
</div>
<?php
if (isset($_POST['cari'])) {
?>
<a href="report_riwayat_kons.php?id_pelanggan=<?php echo $_POST['id_pelanggan'] ?>" class="btn btn-sm btn-warning"><i
        class="ion ion-printer"></i></a>
<div class="table-responsive">
    <table class="table">
        <tr style="background-color: lightgreen;font-size: 10px">
            <th></th>
            <th>Data</th>

            <th>Status</th>
        </tr>
        <?php
			$id_pelanggan = $_POST['id_pelanggan'];
			$cari = mysqli_query($conn, "SELECT * FROM riwayat NATURAL JOIN booking where riwayat.id_pelanggan='$id_pelanggan'");
			while ($data = mysqli_fetch_array($cari)) {
				echo "<tr style='font-size:10px'>";
				echo "<td style='color:green'>Id Riwayat<br>
			Id Booking<br>
			Tanggal<br>
			Hari<br>
			Jam</td>";
				echo "<td>$data[3]<br>
			$data[0]<br>
			$data[4]<br>
			$data[6]<br>
			$data[7]<br>
			$data[8]<br>
			$data[9]</td>";
				echo "<td><a class='btn btn-sm btn-success' style='font-size:10px'><i class='ion ion-checkmark-circled'>$data[2]</i></a></td>";
				echo "</tr>";
			}
			?>
    </table>
</div>
<?php
} else {
	echo "<p align='center'>No Result !</p>";
}
?>