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
    <title>Document Masuk</title>
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
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
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
                    <h1 class="mt-4">Document Masuk</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">



                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No CIF</th>
                                            <th>No LD</th>
                                            <th>Nama Nasabah</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Lemari Document</th>
                                            <th>Jangka Agunan</th>
                                            <th>Jangka Selesai</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Deskripsi</th>
                                            <th>Pekerjaan</th>
                                            <th>Telp</th>
                                            <th>E-mail</th>
                                            <th>Alamat</th>
                                            <th>Status Agunan</th>
                                            <th>Upload Document</th>
                                            <th>Marketing</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadatamasuk = mysqli_query($conn, "select * from masuk");
                                        while ($data =  mysqli_fetch_array($ambilsemuadatamasuk)) {

                                            $id_cif = $data['id_cif'];
                                            $id_ld = $data['id_ld'];
                                            $nama_nasabah = $data['nama_nasabah'];
                                            $jenis_kelamin = $data['jenis_kelamin'];
                                            $lemari_document = $data['lemari_document'];
                                            $jangka_agunan = $data['jangka_agunan'];
                                            $jangka_selesai = $data['jangka_selesai'];
                                            $tanggal_masuk = $data['tanggal_masuk'];
                                            $deskripsi = $data['deskripsi'];
                                            $pekerjaan = $data['pekerjaan'];
                                            $telp = $data['telp'];
                                            $email = $data['email'];
                                            $alamat = $data['alamat'];
                                            $status_agunan = $data['status_agunan'];
                                            $upload_document = $data['upload_document'];
                                            $marketing = $data['marketing'];
                                            $id_masuk = $data['id_masuk'];

                                        ?>
                                            <tr>
                                                <td><?= $id_cif; ?></td>
                                                <td><?= $id_ld; ?></td>
                                                <td><?= $nama_nasabah; ?></td>
                                                <td><?= $jenis_kelamin; ?></td>
                                                <td><?= $lemari_document; ?></td>
                                                <td><?= $jangka_agunan; ?></td>
                                                <td><?= $jangka_selesai; ?></td>
                                                <td><?= $tanggal_masuk; ?></td>
                                                <td><?= $deskripsi; ?></td>
                                                <td><?= $pekerjaan; ?></td>
                                                <td><?= $telp; ?></td>
                                                <td><?= $email; ?></td>
                                                <td><?= $alamat; ?></td>
                                                <td><?= $status_agunan; ?></td>
                                                <td><?= $upload_document; ?></td>
                                                <td><?= $marketing; ?></td>
                                                
                                            </tr>


                                            <!-- Edit Modal -->
                                            


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
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>