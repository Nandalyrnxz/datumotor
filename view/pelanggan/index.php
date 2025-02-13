<?php
setlocale(LC_ALL, 'id-ID', 'id_ID');
session_start();
if (empty($_SESSION['id_pelanggan'])) {
    echo "<script>alert('Anda tidak dapat mengakses halaman ini!'); window.location = '../../login.php'</script>";
} else if ((!$_SESSION['status'] == "PELANGGAN")) {
    echo "<script>alert('Anda tidak dapat mengakses halaman ini!'); window.location = '../../login.php'</script>";
} else {
    include "../../koneksi.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
        name="viewport">
    <title>Bengkel &mdash; DATU Motor</title>

    <link rel="stylesheet" href="../../dist/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/modules/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="../../dist/modules/summernote/summernote-lite.css">
    <link rel="stylesheet" href="../../dist/modules/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../dist/css/demo.css">
    <link rel="stylesheet" href="../../dist/css/style.css">
    <script src="jquery-3.4.1.min.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg" style="background-color:#2Ecc71;">
                <h1 class="text-center text-white" style="margin-top: 2%; margin-left: 13%">Selamat Datang Di Bengkel
                    Datu Motor</h1>
            </div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="ion ion-navicon-round"></i></a></li>


                    </ul>

                </form>




                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg">
                            <i class="ion ion-android-person d-lg-none"></i>
                            <div class="d-sm-none d-lg-inline-block"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="index.php?hl=profil" class="dropdown-item has-icon">
                                <i class="ion ion-android-person"></i> Cek Profile
                            </a>

                        </div>
                    </li>
                </ul>

            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="">Bengkel DATU Motor</a>
                    </div>
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            <img alt="image" src="../../img/people.jpg">
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name"><?php echo $_SESSION['status']; ?></div>
                            <div class="user-role">
                                <?php echo $_SESSION['username']; ?><br>
                                <?php echo $_SESSION['nama']; ?>

                            </div>
                        </div>

                    </div>

                    <ul class="sidebar-menu">
                        <li class="menu-header">MENU</li>
                        <li <?php if ($_GET['hl'] == 'antrian') echo "class='active'"; ?>>
                            <a href="index.php?hl=antrian&bag=today"><i
                                    class="ion ion-ios-timer"></i><span>Antrian</span></a>
                        </li>
                        <li <?php if ($_GET['hl'] == 'booking') echo "class='active'"; ?>>
                            <a href="index.php?hl=booking"><i
                                    class="ion ion-ios-book-outline"></i><span>Booking</span></a>
                        </li>
                        <li <?php if ($_GET['hl'] == 'riwayatbooking') echo "class='active'"; ?>>
                            <a href="index.php?hl=riwayatbooking"><i class="ion ion-ios-people"></i><span>Riwayat
                                    Booking</span></a>
                        </li>
                        <li <?php if ($_GET['hl'] == 'konsultasi') echo "class='active'"; ?>>
                            <a href="index.php?hl=konsultasi"><i
                                    class="ion ion-clipboard"></i><span>Konsultasi</span></a>
                        </li>
                        <li <?php if ($_GET['hl'] == 'pembayaran') echo "class='active'"; ?>>
                            <a href="index.php?hl=pembayaran"><i
                                    class="ion ion-clipboard"></i><span>Pembayaran</span></a>
                        </li>
                        <li>
                            <a href="../../logout.php"><i class="ion ion-android-delete"></i><span>Logout</span></a>
                        </li>



                </aside>
            </div>
            <div class="main-content">
                <section class="section">

                    <script src="sweetalert.min.js"></script>
                    <script src="sweetalert.js"></script>
                    <?php
                        include "content.php";
                        include "../../koneksi.php";
                        ?>

                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; BENGKEL DATU MOTOR <div class="bullet"></div>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>
    </div>

    <script src="sweetalert.min.js"></script>
    <script src="sweetalert.js"></script>
    <script src="../../dist/modules/jquery.min.js"></script>
    <script src="../../dist/modules/popper.js"></script>
    <script src="../../dist/modules/tooltip.js"></script>
    <script src="../../dist/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="../../dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
    <script src="../../dist/js/sa-functions.js"></script>

    <script src="../../dist/modules/chart.min.js"></script>
    <script src="../../dist/modules/summernote/summernote-lite.js"></script>

    <script src="../../dist/js/scripts.js"></script>
    <script src="../../dist/js/custom.js"></script>

</body>

</html>
<style>
form-label {
    font-weight: bold;

}
</style>
<?php
}
?>