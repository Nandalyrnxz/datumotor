<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Data Antrian</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a
                        class="nav-link <?php if($_GET['bag']=='today') echo 'active' ?>"
                        aria-current="page"
                        href="?hl=antrian&bag=today">ANTRIAN HARI INI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($_GET['bag']=='pending') echo 'active' ?>" href="?hl=antrian&bag=pending">KONFIRMASI ANTRIAN ANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($_GET['bag']=='all') echo 'active' ?>" href="?hl=antrian&bag=all">RIWAYAT ANTRIAN</a>
                </li>
            </ul>
        <?php
            if($_GET['bag']=='today'){
                include "antrian_hari_ini.php";
            }elseif ($_GET['bag']=='pending') {
                include "antrian_pending.php";
            }elseif ($_GET['bag']=='all') {
                include "semua_antrian.php";
            }
            ?>
        </div>
    </div>
</div>