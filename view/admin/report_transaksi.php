<?php
include "../../koneksi.php";

$query1 = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan='$_POST[id_pelanggan]'");
$data_p = mysqli_fetch_assoc($query1);


?>

<html>

<head>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;


            border-collapse: collapse;
        }


        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 2px 6px;

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
</head>

<body>
    <table style="border:none;" width="100%">
        <tr style="border:none;">
            <td width="10%" style="border:none;">
                <img src="../../img/garage.png" width="70px" height="70px">
            </td>
            <td style="border:none;">
                <a style="font-size:20px ;font-weight:bold;" class="tengah">Datu Motor</a><br>
                <a style="font-size:14px ;font-weight:bold;" class="tengah">Jl. Pagang Raya-Siteba No.20 A, Kurao Pagang, Kec. Nanggalo, Kota Padang, Sumatera Barat </a><br>
                <a style="font-size:18px ;font-weight:bold;" class="tengah">Laporan Data Booking</a><br>
                <a style="font-size:14px">Dari <?= date('d-m-Y', strtotime($_POST['tgl_awal'])) ?> Sampai
                    <?= date('d-m-Y', strtotime($_POST['tgl_akhir'])) ?> </a>
            </td>
        </tr>
    </table>
    <hr>
    <br>
    <table width="50%" style="border:none ;float:left">
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

    <table>
        <tr>
            <th>No</th>
            <th>Id Booking</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Pelayanan</th>
            <th>Bukti Pembayaran</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
        <?php

        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        $idp = $_POST['id_pelanggan'];
        $no = 0;
        $tgl = date('Y-m-d');

        if ($idp == 'all') {
            $query = mysqli_query($conn, "SELECT * FROM pembayaran LEFT JOIN pelanggan on pelanggan.id_pelanggan=pembayaran.id_pelanggan LEFT JOIN booking ON booking.id_booking=pembayaran.id_booking WHERE pembayaran.status='DISETUJUI' ORDER BY date_created desc");
        } else {
            $query = mysqli_query($conn, "SELECT * FROM pembayaran LEFT JOIN pelanggan on pelanggan.id_pelanggan=pembayaran.id_pelanggan LEFT JOIN booking ON booking.id_booking=pembayaran.id_booking WHERE pembayaran.status='DISETUJUI' AND pembayaran.id_pelanggan = '$idp' ORDER BY date_created desc");
        }

        while ($data = mysqli_fetch_assoc($query)) {

            $cek_layanan = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_booking='$data[id_booking]'");
            $data_layanan = mysqli_fetch_assoc($cek_layanan);
            $no++;
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data['id_booking'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= date('d-m-Y', strtotime($data['tgl_booking'])) ?></td>
                <td><?= $data_layanan['jenis_pelayanan'] ?></td>
                <td><?= $data['filename'] ?></td>
                <td>Rp.<?= number_format($data_layanan['biaya']) ?></td>
                <td><?= $data['status'] ?></td>

            <?php }



            ?>
    </table>

    <table style="border:none;">
        <tr style="border:none;">
            <td width="70%" style="border:none;"></td>
            <td style="border:none;">Padang, <?php
                                                setlocale(LC_ALL, 'id-ID', 'id_ID');
                                                echo strftime("%d %B %Y");
                                                ?>
                <br>
                <br>
                <br>
                <u>Angga</u><br>
                Pimpinan
            </td>
        </tr>
    </table>
</body>

</html>
<script>
    window.print();
</script>