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
    <title>Peminjaman Document</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/metisMenu.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
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

        <?php include "template/sideNavTemplate.php"; ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Peminjaman Document</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">

                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Peminjaman Document
                            </button>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No CIF</th>
                                            <th>No LD</th>
                                            <th>Nama Nasabah</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Keperluan</th>
                                            <th>Peminjam</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $ambilsemuadatamasuk = mysqli_query($conn, "select * from pinjam");
                                        while ($data =  mysqli_fetch_array($ambilsemuadatamasuk)) {

                                            $id_cif = $data['id_cif'];
                                            $id_ld = $data['id_ld'];
                                            $nama_nasabah = $data['nama_nasabah'];
                                            $tanggal_pinjam = $data['tanggal_pinjam'];
                                            $keperluan = $data['keperluan'];
                                            $peminjam = $data['peminjam'];
                                            $status = $data['status'];

                                        ?>
                                            <tr>
                                                <td><?= $id_cif; ?></td>
                                                <td><?= $id_ld; ?></td>
                                                <td><?= $nama_nasabah; ?></td>
                                                <td><?= $tanggal_pinjam; ?></td>
                                                <td><?= $keperluan; ?></td>
                                                <td><?= $peminjam; ?></td>
                                                <td><?= $status; ?></td>
                                            </tr>
                                        <?php
                                        };
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/metisMenu.js"></script>
    <script>
        $(document).ready(function() {
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
    <script src="assets/demo/datatables-demo.js"></script>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
    
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Peminjaman Document</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
    
                <!-- Modal body -->
                <form method="post" action="../function.php">
                    <div class="modal-body">
                        <select name="id_cif" class="form-control">
                            <?php
                            $ambilsemuadatanya = mysqli_query($conn, "select * from masuk");
                            while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                $id_cif = $fetcharray['id_cif'];
                                $id_masuk = $fetcharray['id_masuk'];
    
                            ?>
    
    
                                <option value="<?= $id_cif; ?>"><?= $id_cif; ?></option>
    
                            <?php
                            }
                            ?>
                        </select>
    
                        <br>
                        <select name="id_ld" class="form-control">
                            <?php
                            $ambilsemuadatanya = mysqli_query($conn, "select * from masuk");
                            while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                $id_ld = $fetcharray['id_ld'];
                                $id_masuk = $fetcharray['id_masuk'];
    
                            ?>
    
    
                                <option value="<?= $id_ld ?>"><?= $id_ld; ?></option>
    
                            <?php
                            }
                            ?>
                        </select>
    
                        <br>
                        <select name="nama_nasabah" class="form-control">
                            <?php
                            $ambilsemuadatanya = mysqli_query($conn, "select * from masuk");
                            while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                $nama_nasabah = $fetcharray['nama_nasabah'];
                                $id_masuk = $fetcharray['id_masuk'];
    
                            ?>
    
    
                                <option value="<?= $id_masuk; ?>"><?= $nama_nasabah; ?></option>
    
                            <?php
                            }
                            ?>
                        </select>
    
                        <br>
                        <input type="text" class="form-control" id="id_cif" placeholder="Keperluan" name="keperluan" required>
                        <br>
    
                        <br>
    
                        <!-- Peminjam Marketing-->
                        <div class=" form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Peminjam</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" name="peminjam">
                                    <optgroup label="MIKRO">
                                        <option value="Mukhtar Ardhika">Mukhtar Ardhika</option>
                                        <option value="Bonik">Bonik</option>
                                        <option value="Arief Syarifudin">Arief Syarifudin</option>
                                        <option value="Dwiyanto">Dwiyanto</option>
                                    </optgroup>
                                    <optgroup label="CONSUMER">
                                        <option value="Roni Zuli Putra">Roni Zuli Putra</option>
                                        <option value="Andi Bahrudin">Andi Bahrudin</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <br>
    
                        <!-- Status -->
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Status</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" name="status">
                                    <optgroup label="Status">
                                        <option value="DIPINJAM">Dipinjam</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
    
                        <!---Button Submit--->
                        <div class="ln_solid"></div>
                        <div class="container">
                            <div class="col-md-9 col-sm-9  offset-md-10">
                                <button type="submit" class="btn btn-success" name="pinjam">SUBMIT</button>
                            </div>
                        </div>
    
                </form>
            </div>
        </div>
    </div>
</body>



</html>