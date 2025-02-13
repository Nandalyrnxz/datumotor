<?php
$query = $conn->query("SELECT * FROM booking LEFT JOIN jadwal ON jadwal.id_jadwal=booking.id_jadwal 
                LEFT JOIN mobil ON mobil.id_mobil=booking.id_mobil LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan WHERE booking.id_booking='$_GET[id_booking]' and booking.id_pelanggan='$_SESSION[id_pelanggan]'");
$data = mysqli_fetch_assoc($query);

$cek_antrian = $conn->query("SELECT * FROM antrian LEFT JOIN status_antrian ON antrian.id_status=status_antrian.id_status LEFT JOIN keterangan_antrian ON antrian.id_keterangan=keterangan_antrian.id_keterangan WHERE antrian.id_booking='$data[id_booking]'");
$data_antrian = mysqli_fetch_assoc($cek_antrian);

$cek_layanan = $conn->query("SELECT * FROM pelayanan WHERE id_booking='$_GET[id_booking]'");
$data_layanan = mysqli_fetch_assoc($cek_layanan);

$cek_mekanik = $conn->query("SELECT * FROM mekanik WHERE id_mekanik='$data[id_mekanik]'");
$data_mekanik = mysqli_fetch_assoc($cek_mekanik);
?>

<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Detail Booking</h3>
            <a href="?hl=riwayatbooking" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>
                            <h5>ID Booking </h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data['id_booking'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Hari</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data['hari'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Jam</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data['jam'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Tanggal</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data['tgl_booking'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Merk mobil</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data['merk_mobil'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Keluhan</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data['keluhan'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Pelanggan</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data['nama'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Alamat</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data['alamat'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>No Whatsapp</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5>0<?= $data['no_wa'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Status</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data['status'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Mekanik</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data_mekanik['nama_mekanik'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Total Biaya</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= number_format($data_layanan['biaya'], 0, ',', '.') ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Keterangan</h5>
                        </td>
                        <td>
                            <h5>: </h5>
                        </td>
                        <td>
                            <h5><?= $data_antrian['keterangan'] ?></h5>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>