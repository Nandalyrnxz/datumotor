<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>ID Booking</th>
            <th>Tgl Booking</th>
            <th>Pelanggan</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        $no = 0;
        $query = mysqli_query($conn, "SELECT * FROM antrian lEFT JOIN status_antrian ON antrian.id_status=status_antrian.id_status LEFT JOIN keterangan_antrian ON antrian.id_keterangan=keterangan_antrian.id_keterangan LEFT JOIN booking ON booking.id_booking=antrian.id_booking LEFT JOIN jadwal ON booking.id_jadwal=jadwal.id_jadwal LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN mekanik ON booking.id_mekanik=mekanik.id_mekanik WHERE booking.id_pelanggan='$_SESSION[id_pelanggan]' ORDER BY id_antrian ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $no++;
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data['id_booking'] ?></td>
                <td><?= date('d-m-Y', strtotime($data['tgl_booking']))  ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jam'] ?></td>
                <td><?= $data['status_antrian'] ?></td>
                <td><?= $data['keterangan'] ?></td>
            </tr>

        <?php } ?>
    </table>
</div>