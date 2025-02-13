<?php
include "../../koneksi.php";
$query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id_pelanggan]'");
$data_p = mysqli_fetch_assoc($query);
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <table style="border:none;" width="100%">
                <tr style="border:none;">
                    <td width="10%" style="border:none;">
                        <img src="../../img/logo.png" width="70px" height="70px">
                    </td>
                    <td style="border:none;">
                        <a style="font-size:20px ;font-weight:bold;" class="tengah">Datu Motor</a><br>
                        <a style="font-size:14px ;font-weight:bold;" class="tengah">Jalan Pagang raya, siteba , Kota Padang </a><br>
                        <a style="font-size:18px ;font-weight:bold;" class="tengah">Laporan Data Booking</a><br>
                    </td>
                </tr>
            </table>
            <br>
            <table width="50%" style="border:none;">
                <tr style="border:none ;">
                    <td style="border:none ;">Pelanggan</td>
                    <td style="border:none ;">:</td>
                    <td style="border:none ;"><?= $data_p['nama'] ?></td>
                </tr>
                <tr style="border:none ;">
                    <td style="border:none ;">Jenis Kelamin</td>
                    <td style="border:none ;">:</td>
                    <td style="border:none ;"><?= $data_p['jk'] ?></td>
                </tr>
                <tr style="border:none ;">
                    <td style="border:none ;">Alamat</td>
                    <td style="border:none ;">:</td>
                    <td style="border:none ;"><?= $data_p['alamat'] ?></td>
                </tr>
                <tr style="border:none ;">
                    <td style="border:none ;">No Hp</td>
                    <td style="border:none ;">:</td>
                    <td style="border:none ;">0<?= $data_p['no_wa'] ?></td>
                </tr>
            </table>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Id Booking</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Tanggal</th>
                        <th>Merk Mobil</th>
                        <th>Keluhan</th>
                        <th>Mekanik</th>
                        <th>Status Booking</th>
                        <th>Status Layanan</th>
                        <th>Keterangan</th>
                        <th>Jenis Pelayanan</th>
                        <th>Biaya</th>
                    </tr>
                    <?php
                    include "../../koneksi.php";
                    $idp = $_GET['id_pelanggan'];
                    $no = 0;
                    $tgl = date('Y-m-d');

                    $query = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN jadwal ON jadwal.id_jadwal=booking.id_jadwal LEFT JOIN mobil ON mobil.id_mobil=booking.id_mobil LEFT JOIN mekanik on booking.id_mekanik=mekanik.id_mekanik LEFT JOIN antrian ON booking.id_booking=antrian.id_booking LEFT JOIN status_antrian ON antrian.id_status=status_antrian.id_status LEFT JOIN keterangan_antrian ON antrian.id_keterangan=keterangan_antrian.id_keterangan WHERE booking.status='DISETUJUI' AND booking.id_pelanggan='$idp' ORDER BY date_created ASC");

                    //         $query = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN jadwal ON jadwal.id_jadwal=booking.id_jadwal LEFT JOIN motor ON motor.merk_motor=booking.merk_motor LEFT JOIN mekanik on booking.id_mekanik=mekanik.id_mekanik LEFT JOIN antrian ON booking.id_booking=antrian.id_booking 
                    // LEFT JOIN status_antrian ON antrian.id_status=status_antrian.id_status LEFT JOIN keterangan_antrian ON antrian.id_keterangan=keterangan_antrian.id_keterangan WHERE booking.status='DISETUJUI' AND booking.id_pelanggan='$idp' ORDER BY date_created ASC");

                    while ($data = mysqli_fetch_assoc($query)) {
                        $cek_layanan = $conn->query("SELECT * FROM pelayanan WHERE id_booking='$data[id_booking]'");
                        $data_layanan = mysqli_fetch_assoc($cek_layanan);

                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['id_booking'] ?></td>
                            <td><?= $data['hari'] ?></td>
                            <td><?= $data['jam'] ?></td>
                            <td><?= date('d-m-Y', strtotime($data['tgl_booking'])) ?></td>
                            <td><?= $data['merk_mobil'] ?></td>
                            <td><?= $data['keluhan'] ?></td>
                            <td><?= $data['nama_mekanik'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td><?= $data['status_antrian'] ?></td>
                            <td><?= $data['keterangan'] ?></td>
                            <td><?= $data_layanan['jenis_pelayanan'] ?></td>
                            <td><?= number_format($data_layanan['biaya'], 0, ',', '.') ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container text-center" style="margin-left: 85%; margin-top: 20px;">
    <div class="row">
        <div class="col align-self-center " style="margin-bottom: 100px;">
            Padang, <?= date('d-m-Y') ?>
        </div>
        <div class="col align-self-center">
            Angga <br>
            PEMILIK
        </div>
    </div>
</div>
<style type="text/css">
    body {
        font-family: sans-serif;
    }

    /* table {
    margin: 20px auto;
    border-collapse: collapse;
} */

    table th,
    table td {
        border: 1px solid #3c3c3c;
        padding: 5px;

    }

    /* a{
               background: blue;
               color: #fff;
               padding: 8px 10px;
               text-decoration: none;
               border-radius: 2px;
               } */

    .tengah {
        text-align: center;
    }
</style>
<script>
    window.print();
</script>