<?php
include "../../koneksi.php";
if (isset($_POST['status'])) {
    $status = $_POST["status"];

    $sql = "select * from keterangan_antrian where id_status=$status";
    $hasil2 = mysqli_query($conn, $sql);
    while ($data2 = mysqli_fetch_array($hasil2)) {
        ?>
        <option value="<?= $data2['id_keterangan']; ?>"><?= $data2['keterangan']; ?></option>
        <?php
    }
}
?>