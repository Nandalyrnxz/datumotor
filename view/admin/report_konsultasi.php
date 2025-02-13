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
            padding: 2px 5px;

        }

        .tengah {
            text-align: center;
        }
    </style>
</head>

<body>
    <table style="border:none;">
        <tr style="border:none;">
            <td width="10%" style="border:none;">
                <img src="../../img/garage.png" width="70px" height="70px">
            </td>
            <td style="border:none;">
                <a style="font-size:20px ;font-weight:bold;" class="tengah">Datu Motor</a><br>
                <a style="font-size:14px ;font-weight:bold;" class="tengah">Jl. Pagang Raya-Siteba No.20 A, Kurao Pagang, Kec. Nanggalo, Kota Padang, Sumatera Barat </a><br>
                <a style="font-size:18px ;font-weight:bold;" class="tengah">Laporan Data Konsultasi</a><br>
                <a style="font-size:14px">Dari <?= date('d-m-Y', strtotime($_POST['tgl_awal'])) ?> Sampai
                    <?= date('d-m-Y', strtotime($_POST['tgl_akhir'])) ?> </a>
            </td>
        </tr>
    </table>
    <hr>
    <table class="table table-striped">
        <tr class="bg-success">
            <th>No</th>
            <th>Tanggal Konsultasi</th>
            <th>Nama Pelanggan</th>
            <th>Keluhan</th>
            <th>Merk Mobil</th>
            <th>Status</th>
            <th>Solusi</th>
        </tr>
        <?php
        include "../../koneksi.php";
        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        $merk = $_POST['merk_mobil'];
        $no = 0;
        if ($merk == 'all') {
            $query = mysqli_query($conn, "SELECT * FROM konsultasi LEFT JOIN pelanggan ON konsultasi.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN mobil ON konsultasi.id_mobil=mobil.id_mobil WHERE konsultasi.tgl_konsultasi ORDER BY tgl_konsultasi DESC");
        } else {
            $query = mysqli_query($conn, "SELECT * FROM konsultasi LEFT JOIN pelanggan ON konsultasi.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN mobil ON konsultasi.id_mobil=mobil.id_mobil WHERE konsultasi.tgl_konsultasi BETWEEN '$tgl_awal' AND '$tgl_akhir' and mobil.id_mobil='$merk' ORDER BY tgl_konsultasi DESC");
        }
        while ($data = mysqli_fetch_assoc($query)) {
            $no++;
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= date('d-m-Y', STRTOTIME($data['tgl_konsultasi'])) ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['keluhan'] ?></td>
                <td><?= $data['merk_mobil'] ?></td>
                <td><?= $data['status'] ?></td>
                <td><?php
                    $query1 = $conn->query("SELECT * FROM respon_konsultasi WHERE id_konsultasi='$data[id_konsultasi]' ORDER BY waktu");
                    while ($dk = mysqli_fetch_assoc($query1)) {
                        echo "<li>$dk[respon]</li><br>";
                    } ?>
                </td>
            <?php } ?>
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