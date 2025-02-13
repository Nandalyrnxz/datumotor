<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Data Booking</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link <?php if($_GET['bag']=='pending') echo 'active' ?>" aria-current="page" href="?hl=booking&bag=pending"><b>PENDING</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($_GET['bag']=='all') echo 'active' ?>" href="?hl=booking&bag=all"><b>SEMUA DATA BOOKING</b></a>
                </li>
            </ul>
            <?php
            if($_GET['bag']=='pending'){
                include "booking_pending.php";
            }elseif($_GET['bag']=='all') {
                include "booking_all.php";
            }
            ?>
        </div>
    </div>
</div>
