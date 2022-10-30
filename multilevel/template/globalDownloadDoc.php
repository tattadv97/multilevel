<?php

    include "../globalFunction/sessionChecker.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Print Out Document</title>
    <link href="../<?php echo $role; ?>/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="../<?php echo $role; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../<?php echo $role; ?>/css/main.css" rel="stylesheet" type="text/css" />
    <link href="../<?php echo $role; ?>/css/metisMenu.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<nav class="fixed-top navbar navbar-expand navbar-dark bg-dark p-1">
        <a class="navbar-brand p-1 text-center d-block" href="/">
            <img src="../template/assets/img/navLogo.png" height="30" class="d-block m-auto" alt="">
            <small>
                <?=$email;?>
            </small>
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="post" action="../function.php">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

    </nav>

    <div id="layoutSidenav">

        <?php include "../".$role."/template/sideNavTemplate.php"; ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4 mb-4 text-center">Halaman Cetak</h1>
                    <?php include "carousel.php"; ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            Pilih Document Yang Ingin Anda Download
                        </div>
                        <div class="card-body">
                            <form method="POST" action="../function.php">
                                <div class="form-group">
                                    <label for="selDoc">Pilih Document</label>
                                    <select class="form-control" id="selDoc" name="selDoc">
                                        <option value="doc-in">Dokumen Masuk</option>
                                        <option value="doc-out">Dokumen Keluar</option>
                                        <option value="rent-out">Peminjaman Dokumen</option>
                                        <option value="rent-in">Pengembalian Dokumen</option>
                                    </select>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label label for="std">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="std" name="std" placeholder="Start Date">
                                    </div>
                                    <div class="col">
                                        <label for="edd">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="edd" name="edd" placeholder="End Date">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" name="dcDownload" value="docDownload">Download</button>
                            </form>
                        </div>
                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../<?php echo $role; ?>/js/jquery.js"></script>
    <script src="../<?php echo $role; ?>/js/bootstrap.bundle.js"></script>
    <script src="../<?php echo $role; ?>/js/metisMenu.js"></script>
    <script>
    $(document).ready(function() {
        $('#metismenu').metisMenu();
    });
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/metisMenu.js"></script>
    <script>
        $(document).ready(function(){
            $('#metismenu').metisMenu();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script> -->
    
</body>

<!-- The Modal -->


</html>