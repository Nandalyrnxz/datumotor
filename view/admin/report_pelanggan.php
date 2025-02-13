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
            padding: 3px 8px;

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
    <table style="border:none;">
        <tr style="border:none;">
            <td width="10%" style="border:none;">
                <img src="../../img/garage.png" width="60px" height="60px">
            </td>
            <td style="border:none;">
                <a style="font-size:20px ;font-weight:bold;" class="tengah">Dean Motor</a><br>
                <a style="font-size:14px ;font-weight:bold;" class="tengah">Jl. Pagang Raya-Siteba No.20 A, Kurao Pagang, Kec. Nanggalo, Kota Padang, Sumatera Barat </a><br>
                <a style="font-size:18px ;font-weight:bold;" class="tengah">Laporan Data Pelanggan</a>
            </td>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>No Whatsapp</td>
        </tr>
        <?php
        include "../../koneksi.php";
        $no = 0;
        $query = mysqli_query($conn, "SELECT * FROM pelanggan");
        while ($data = mysqli_fetch_assoc($query)) {
            $no++ ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['jk'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td>0<?= $data['no_wa'] ?></td>
            </tr>
        <?php
        }
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