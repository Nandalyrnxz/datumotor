<script src="../../dist/modules/jquery.min.js"></script>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Data Antrian Hari Ini</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>ID Booking</th>
                        <th>Tgl Booking</th>
                        <th>Pelanggan</th>
                        <th>Jam</th>
                        <th>Mekanik</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                        <th>Pelayanan</th>
                    </tr>
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $no = 0;
                    $tgl = date('Y-m-d');

                    $query = mysqli_query($conn, "SELECT * FROM antrian lEFT JOIN status_antrian ON antrian.id_status=status_antrian.id_status LEFT JOIN keterangan_antrian ON antrian.id_keterangan=keterangan_antrian.id_keterangan LEFT JOIN booking ON booking.id_booking=antrian.id_booking LEFT JOIN jadwal ON booking.id_jadwal=jadwal.id_jadwal LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN mekanik ON booking.id_mekanik=mekanik.id_mekanik WHERE booking.tgl_booking='$tgl' ORDER BY id_antrian ASC");

                    while ($data = mysqli_fetch_assoc($query)) {
                        $no++;
                    ?>
                        <tr>
                            <form action="?hl=update_status" method="post">
                                <input type="hidden" name="id_antrian" value="<?= $data['id_antrian'] ?>">
                                <input type="hidden" name="id_booking" value="<?= $data['id_booking'] ?>">
                                <td><?= $no ?></td>
                                <td><?= $data['id_booking'] ?></td>
                                <td><?= date('d-m-Y', strtotime($data['tgl_booking'])) ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['jam'] ?></td>
                                <td><select name="mekanik" class="form-control" id="mekanik<?= $no ?>">
                                        <?php
                                        if ($data['id_mekanik'] == 0) {
                                            echo "<option value=''>- Pilih Mekanik -</option>";
                                        }
                                        $query1 = $conn->query("SELECT * FROM mekanik");
                                        while ($data1 = mysqli_fetch_assoc($query1)) { ?>
                                            <option value="<?= $data1['id_mekanik'] ?>"
                                                <?php if ($data['id_mekanik'] == $data1['id_mekanik']) echo "$data[nama_mekanik]"; ?>>
                                                <?= $data1['nama_mekanik'] ?></option>
                                        <?php } ?>
                                    </select></td>

                                <td><select name="status" class="form-control" id="status<?= $no ?>">
                                        <?php
                                        if ($data['id_status'] == 0) {
                                            echo "<option value=''>- Pilih Status -</option>";
                                        }
                                        $query1 = $conn->query("SELECT * FROM status_antrian");
                                        while ($data1 = mysqli_fetch_assoc($query1)) { ?>
                                            <option value="<?= $data1['id_status'] ?>"
                                                <?php if ($data['status_antrian'] == $data1['status_antrian']) echo "selected"; ?>>
                                                <?= $data1['status_antrian'] ?></option>
                                        <?php } ?>
                                    </select></td>
                                <td>
                                    <select name="keterangan" class="form-control" id="keterangan<?= $no ?>">
                                        <option value="<?= $data['id_keterangan'] ?>"><?= $data['keterangan'] ?></option>
                                    </select>
                                </td>
                                <td><button type="submit" class="btn btn-success"><i class="fab fa-whatsapp"></i>
                                        SEND</button>

                                </td>
                                <td>
                                    <a href="?hl=tambah_pelayanan&id=<?= $data['id_booking'] ?>"
                                        class="btn btn-primary">+</a>
                                </td>
                            </form>

                        </tr>
                        <script>
                            $("#status<?= $no ?>").change(function() {
                                var id_status = $("#status<?= $no ?>").val();
                                $.ajax({
                                    type: "POST",
                                    dataType: "html",
                                    url: "ambil-data.php",
                                    data: "status=" + id_status,
                                    success: function(data) {
                                        $("#keterangan<?= $no ?>").html(data);
                                    }
                                });
                            });
                        </script>

                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>