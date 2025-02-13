<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>ID BOOKING</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Tanggal</th>
            <th>Merek Mobil</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 0;
        $tgl = date('Y-m-d');
        $query = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN jadwal ON jadwal.id_jadwal=booking.id_jadwal WHERE booking.tgl_booking>='$tgl' AND booking.status='PENDING' ORDER BY date_created ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $no++;
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data['id_booking'] ?></td>
                <td><?= $data['hari'] ?></td>
                <td><?= $data['jam'] ?></td>
                <td><?= $data['tgl_booking'] ?></td>
                <td><?= $data['merk_mobil'] ?></td>
                <td><?= $data['status'] ?></td>
                <td><a href="?hl=verifikasi&id_booking=<?= $data['id_booking'] ?>" class="btn btn-sm btn-info"
                        style="border-radius:50% ;"> <i class="fas fa-check"></i> Konfirmasi</a></td>
            <?php } ?>
    </table>
</div>