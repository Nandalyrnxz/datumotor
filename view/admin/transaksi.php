<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Transaksi Pembayaran</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link <?php if ($_GET['bag'] == 'proses') echo 'active' ?>" aria-current="page" href="?hl=transaksi&bag=proses"><b>DIPROSES</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_GET['bag'] == 'all') echo 'active' ?>" href="?hl=transaksi&bag=all"><b>SEMUA TRANSAKSI</b></a>
                </li>
            </ul>
            <?php
            if ($_GET['bag'] == 'proses') {
                include "transaksi_proses.php";
            } elseif ($_GET['bag'] == 'all') {
                include "transaksi_all.php";
            }
            ?>
        </div>
    </div>
</div>