<?php
include "../../koneksi.php";
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
                <img src="../../img/logo.png" width="70px" height="70px">
            </td>
            <td style="border:none;">
                <a style="font-size:20px ;font-weight:bold;" class="tengah">Datu Motor</a><br>
                <a style="font-size:14px ;font-weight:bold;" class="tengah">Jl. Pagang Raya-Siteba No.20 A, Kurao Pagang, Kec. Nanggalo, Kota Padang, Sumatera Barat </a><br>
                <a style="font-size:18px ;font-weight:bold;" class="tengah">Laporan Transaksi Bulanan</a><br>
                <a style="font-size:14px"><?= $_GET['bulan'] ? date('F, Y', strtotime($_GET['bulan'])) : '' ?> </a>
            </td>
        </tr>
    </table>
    <hr>
    <br>

    <table class="table table-striped">
        <tr align="center">
            <th>No</th>
            <th>Bulan</th>
            <th>Pelayanan</th>
            <th>Bukti Pembayaran</th>
            <th>Status</th>
            <th class="text-right">Pembayaran</th>
        </tr>
        <?php
        $no = 0;
        $data = null;
        $tgl = $_GET['bulan'];
        $bulan = date('m', strtotime($tgl));
        $tahun = date('Y', strtotime($tgl));
        $subtot = 0;

        $query = mysqli_query($conn, "SELECT
                        date(pembayaran.tgl_pembayaran) AS tanggalbayar,
                        pelayanan.jenis_pelayanan,
                        pembayaran.filename,
                        SUM(pelayanan.biaya) AS pembayaran,
                        pembayaran.status

                        FROM `pembayaran` 
                        INNER JOIN booking ON pembayaran.id_booking = pembayaran.id_booking
                        INNER JOIN pelayanan ON booking.id_booking = pelayanan.id_booking

                        WHERE MONTH(booking.tgl_booking) = '$bulan' AND YEAR(booking.tgl_booking) = '$tahun'
                        AND pembayaran.status = 'DISETUJUI'
                        AND pembayaran.id_booking = booking.id_booking
                        GROUP BY pembayaran.id_booking");

        while ($data = mysqli_fetch_assoc($query)) {
            $no++;
            $subtot = $subtot + $data['pembayaran'];
        ?>
            <tr align="center">
                <td><?= $no ?></td>
                <td><?= $bulan ?> - <?= $tahun ?></td>
                <td><?= $data['jenis_pelayanan'] ?></td>
                <td><img src='../../dist/img/bukti/<?= $data['filename'] ?>' height='50px'></td>
                <td><?= $data['status'] ?></td>
                <td align="right">Rp. <?= number_format($data['pembayaran']) ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <th colspan="6" style="text-align:right;">
                <h3>Total Pendapatan : Rp. <?= number_format($subtot) ?></h3>
            </th>
        </tr>
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