<?php
include "../../koneksi.php";
if (isset($_GET['id_booking'])) {

    $query = mysqli_query($conn, "SELECT * FROM booking LEFT JOIN jadwal ON booking.id_jadwal=jadwal.id_jadwal LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN mobil ON booking.id_mobil=mobil.id_mobil WHERE booking.id_booking ='$_GET[id_booking]'");
    $data  = mysqli_fetch_array($query);

?>
    <center>
        <a style="font-size:18px ; font-weight:bold;">DATU MOTOR</a><br>
        <a style="font-size:18px ; font-weight:bold;">Nomor Antrian</a>
        <table>
            <tr>
                <th colspan="3">
                    <hr>
                </th>
            </tr>
            <tr>
                <td>
                    <h4>ID Booking </h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4><?= $data['id_booking'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Hari</h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4><?= $data['hari'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Jam</h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4><?= $data['jam'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Tanggal</h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4><?= $data['tgl_booking'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Merk Mobil</h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4><?= $data['merk_mobil'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Keluhan</h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4><?= $data['keluhan'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Pelanggan</h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4><?= $data['nama'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Alamat</h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4><?= $data['alamat'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>No Whatsapp</h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4>0<?= $data['no_wa'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Status</h4>
                </td>
                <td>
                    <h4>: </h4>
                </td>
                <td>
                    <h4><?= $data['status'] ?></h4>
                </td>
            </tr>
        </table>
        </div>
        </div>
        </div>
    </center>
    <script>
        window.print();
    </script>
<?php
}
?>