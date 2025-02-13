<div class="col-sm-12 col-md-12">

    <h4 class="section-header" style="font-family:times new roman; text-align: center;">Pendaftaran Booking</h4>
    <br>
    <?php
	$id_jadwal = $_GET['id_jadwal'];
	$hari = $_GET['hari'];
	$query2 = mysqli_query($conn, "SELECT * FROM jadwal where id_jadwal='$id_jadwal' and hari='$hari'");
	$res = mysqli_fetch_array($query2);
	$id_jadwal = $res['id_jadwal'];
	$hari = $_POST['hari'];
	if ($jadwal == "SENIN");
	else if ($jadwal == "SELASA");
	else if ($jadwal == "RABU");
	else if ($jadwal == "KAMIS");
	else if ($jadwal == "JUM'AT");
	else if ($jadwal == "SABTU");
	$jam = $_POST['jam'];




	?>


    <form method="POST" action="index.php?hl=simpandata" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table">
                <tr>

                    <td>Id Pelanggan </td>
                    <td><input class="form-control" type="text" id="id_pelanggan" name="id_pelanggan" autofocus="yes"
                            required="yes" /></td>
                </tr>

                <tr>
                    <td>Nama </td>
                    <td>
                        <?php
						$id_pelanggan = $_SESSION['username'];
						$carinama = mysqli_query($conn, "select nama from pelanggan where id_pelanggan='$id_pelanggan'");
						$res = mysqli_fetch_array($carinama);
						$nama = $res['nama'];


						if ($nama) {
							echo "<input class='form-control' type='text' id='nama' name='nama' 
						value='$nama'  readonly>";
						} else {
							echo "<input class='form-control' type='text' id='nama' name='nama' 
						value=''  required autofocus>";
						}

						?>

                    </td>
                </tr>

                <tr>
                    <td>Tanggal Booking </td>
                    <td><input class="form-control" type="date" id="tgl_booking" name="tgl_booking"
                            value="<?= $_GET['tgl'] ?>" required /></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input class="btn btn-success btn-sm" type="submit" id="simpandaftar" name="simpandaftar"
                            value="Ambil Antrian" /></td>

                </tr>

                <tr>
                    <td colspan="2">
                        <hr>
                    </td>

                </tr>

                <tr>
                    <td>Id Jadwal </td>
                    <td><input class="form-control" type="text" id="id_jadwal" name="id_jadwal"
                            value="<?php echo $id_jadwal; ?>" readonly /> <i class="ion ion-android-done primary"></i>
                    </td>
                </tr>


            </table>
    </form>


</div>