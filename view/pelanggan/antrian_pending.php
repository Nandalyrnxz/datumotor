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
            <th>Pelayanan</th>
            <th>Aksi</th>
        </tr>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        $no = 0;
        $tgl = date('Y-m-d');
        $query = mysqli_query($conn, "SELECT * FROM antrian lEFT JOIN status_antrian ON antrian.id_status=status_antrian.id_status LEFT JOIN keterangan_antrian ON antrian.id_keterangan=keterangan_antrian.id_keterangan LEFT JOIN booking ON booking.id_booking=antrian.id_booking LEFT JOIN jadwal ON booking.id_jadwal=jadwal.id_jadwal LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN mekanik ON booking.id_mekanik=mekanik.id_mekanik WHERE booking.tgl_booking='$tgl' and booking.id_pelanggan='$_SESSION[id_pelanggan]' and keterangan_antrian.keterangan !='Mobil Telah Dijemput' ORDER BY id_antrian ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $cek_layanan = $conn->query("SELECT * FROM pelayanan WHERE id_booking='$data[id_booking]'");
            $data_layanan = mysqli_fetch_assoc($cek_layanan);
            $no++;
        ?>
            <tr>
                <form action="?hl=update_status" method="post">
                    <td><?= $no ?></td>
                    <td><?= $data['id_booking'] ?></td>
                    <td><?= date('d-m-Y', strtotime($data['tgl_booking'])) ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['jam'] ?></td>
                    <td><?= $data['status_antrian'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td><b>Keluhan :</b> <?= $data['keluhan'] ?><br>
                        <b>Jenis Layanan :</b> <?= $data_layanan['jenis_pelayanan'] ?><br>
                        <b>Biaya :</b> <?= number_format($data_layanan['biaya'], 0, ',', '.') ?>
                    </td>
                    <td>
                        <?php if ($data['status_antrian'] == 'SELESAI' && $data['id_pelanggan'] == $_SESSION['id_pelanggan'] && $data['keterangan'] != 'Motor Telah Dijemput') { ?>
                            <a href="?hl=konfirmasi_jemput&id_antrian=<?= $data['id_antrian'] ?>"
                                class="btn btn-sm btn-success mb-2"
                                onclick="return confirm('Apakah anda yakin sudah menjemput Mobil ?')">Konfirmasi Penjemputan</a>
                            <a href="?hl=konfirmasi_inap&id_antrian=<?= $data['id_antrian'] ?>" class="btn btn-sm btn-primary"
                                onclick="return confirm('Apakah anda yakin untuk menginapkan Mobil ?')">Inapkan Mobil</a>
                        <?php } ?>
                    </td>
                </form>
            </tr>

        <?php } ?>
    </table>
</div>