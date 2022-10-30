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
    <title>Document Keluar</title>
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
                    <h1 class="mt-4">Document Keluar</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Document Keluar
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
                                            <th>Tanggal Keluar</th>
                                            <th>Penerima</th>
                                            <th>Status Agunan</th>
                                            <th>Keperluan</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Marketing</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadatamasuk = mysqli_query($conn, "select * from keluar");
                                        while ($data =  mysqli_fetch_array($ambilsemuadatamasuk)) {

                                            $id_cif = $data['id_cif'];
                                            $id_ld = $data['id_ld'];
                                            $nama_nasabah = $data['nama_nasabah'];
                                            $tanggal_keluar = $data['tanggal_keluar'];
                                            $penerima = $data['penerima'];
                                            $status_agunan = $data['status_agunan'];
                                            $keperluan = $data['keperluan'];
                                            $tanggal_pinjam = $data['tanggal_pinjam'];
                                            $marketing = $data['marketing'];
                                            $id_keluar = $data['id_keluar'];

                                        ?>
                                            <tr>
                                                <td><?= $id_cif; ?></td>
                                                <td><?= $id_ld; ?></td>
                                                <td><?= $nama_nasabah; ?></td>
                                                <td><?= $tanggal_keluar; ?></td>
                                                <td><?= $penerima; ?></td>
                                                <td><?= $status_agunan; ?></td>
                                                <td><?= $keperluan; ?></td>
                                                <td><?= $tanggal_pinjam; ?></td>
                                                <td><?= $marketing; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $id_keluar; ?>">
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_keluar; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>


                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $id_keluar; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update Document Keluar</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post" method="POST" action="../function.php">
                                                            <div class="modal-body">

                                                                <!---Status Agunan--->
                                                                <div class="form-group row">
                                                                    <label class="control-label col-md-3 col-sm-3 ">Status Agunan</label>
                                                                    <div class="col-md-9 col-sm-9 ">
                                                                        <select class="form-control" name="status_agunan" value="<?= $status_agunan; ?>">
                                                                            <optgroup label="Status Agunan">
                                                                                <option value="LUNAS">LUNAS</option>
                                                                                <option value="BELUM LUNAS">BELUM LUNAS</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                                <div class="form-group">
                                                                    <label for="keperluan">Keperluan</label>
                                                                    <input type="text" class="form-control" id="keperluan" placeholder="Keperluan" name="keperluan" value="<?= $keperluan; ?>">
                                                                </div>

                                                                <br>

                                                                <!---DatePicker--->
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-md-3 col-sm-3 ">Tanggal Pinjam</label>
                                                                    <div class="col-md-9 col-sm-9 ">
                                                                        <input class="date-picker form-control" name="tanggal_pinjam" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?=$tanggal_pinjam;?>">
                                                                        <script>
                                                                            function timeFunctionLong(input) {
                                                                                setTimeout(function() {
                                                                                    input.type = 'text';
                                                                                }, 60000);
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                                <!---Marketing--->
                                                                <div class=" form-group row">
                                                                    <label class="control-label col-md-3 col-sm-3 ">Marketing</label>
                                                                    <div class="col-md-9 col-sm-9 ">
                                                                        <select class="form-control" name="marketing" value="<?= $marketing; ?>">
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

                                                                <input type="hidden" name="id_keluar" value="<?= $id_keluar; ?>">

                                                                <div class="ln_solid"></div>
                                                                <div class="container">
                                                                    <div class="col-md-9 col-sm-9  offset-md-9">
                                                                        <button type="submit" class="btn btn-success" name="updatekeluar">SUBMIT</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?= $id_keluar; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Data ?</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post" action="../function.php">
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus <?= $nama_nasabah; ?>?
                                                                <input type="hidden" name="id_keluar" value="<?= $id_keluar; ?>">
                                                                <br>

                                                                <div class="ln_solid"></div>
                                                                <div class="container">
                                                                    <div class="col-md-9 col-sm-9  offset-md-9">
                                                                        <button type="submit" class="btn btn-danger" name="deletekeluar">DELETE</button>
                                                                    </div>

                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


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

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Document Keluar</h4>
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


                            <option value="<?= $id_ld; ?>"><?= $id_ld; ?></option>

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
                    <input type="text" class="form-control" id="id_cif" placeholder="Penerima" name="penerima" required>
                    <br>

                    <!---Status Agunan--->
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Status Agunan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" name="status_agunan">
                                <optgroup label="Status Agunan">
                                    <option value="LUNAS">LUNAS</option>
                                    <option value="BELUM LUNAS">BELUM LUNAS</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="container">
                        <div class="col-md-9 col-sm-9  offset-md-9">
                            <button type="submit" class="btn btn-success" name="barangkeluar">SUBMIT</button>
                        </div>

                    </div>
            </form>
        </div>
    </div>
</div>

</html>