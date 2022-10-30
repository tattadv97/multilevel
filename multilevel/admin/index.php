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
    <title>BSI Inventory Document</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/metisMenu.css" rel="stylesheet" type="text/css" />
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
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="POST" action="../function.php">
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
                    <h1 class="mt-4">Dashboard</h1>
                    <?php include "../template/carousel.php"; ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Add++
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NPK</th>
                                            <th>Marketing</th>
                                            <th>Divisi</th>
                                            <th>E-mail</th>
                                            <th>Telp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadatamarketing = mysqli_query($conn, "select * from marketing");
                                        $i = 1;
                                        while ($data =  mysqli_fetch_array($ambilsemuadatamarketing)) {

                                            $npk = $data['npk'];
                                            $nama_marketing = $data['nama_marketing'];
                                            $divisi = $data['divisi'];
                                            $email_mar = $data['email_mar'];
                                            $telp_mar = $data['telp_mar'];
                                            $id_mar = $data['id_mar'];

                                        ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $npk; ?></td>
                                                <td><?= $nama_marketing; ?></td>
                                                <td><?= $divisi; ?></td>
                                                <td><?= $email_mar; ?></td>
                                                <td><?= $telp_mar; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $id_mar; ?>">
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_mar; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $id_mar; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update Marketing</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post" action="../function.php">
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="npk">NPK</label>
                                                                    <input type="text" class="form-control" id="npk" value="<?= $npk; ?>" name="npk">
                                                                </div>
                                                                <br>

                                                                <div class="form-group">
                                                                    <label for="nama_marketing">Marketing</label>
                                                                    <input type="text" class="form-control" id="nama_marketing" value="<?= $nama_marketing; ?>" name="nama_marketing">
                                                                </div>

                                                                <br>

                                                                <!---Divisi--->
                                                                <div class="form-group row">
                                                                    <label class="control-label col-md-3 col-sm-3 ">Divisi</label>
                                                                    <div class="col-md-9 col-sm-9 ">
                                                                        <select class="form-control" value="<?= $divisi; ?>" name="divisi">
                                                                            <optgroup label="Divisi">
                                                                                <option value="Mikro">Mikro</option>
                                                                                <option value="Consumer">Consumer</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                                <input type="email" class="form-control" id="email_mar" value="<?= $email_mar; ?>" name="email_mar" required>
                                                                <br>
                                                                <input type="text" class="form-control" id="telp_mar" value="<?= $telp_mar; ?>" name="telp_mar" required>
                                                                <br>

                                                                <input type="hidden" name="id_mar" value="<?= $id_mar; ?>">

                                                                <div class="ln_solid"></div>
                                                                <div class="container">
                                                                    <div class="col-md-9 col-sm-9  offset-md-9">
                                                                        <button type="submit" class="btn btn-success" name="updatemarketing">SUBMIT</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?= $id_mar; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Marketing ?</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post" action="../function.php">
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus <?= $nama_marketing; ?>?
                                                                <input type="hidden" name="id_mar" value="<?= $id_mar; ?>">
                                                                <br>
                                                                <br>

                                                                <div class="ln_solid"></div>
                                                                <div class="container">
                                                                    <div class="col-md-9 col-sm-9  offset-md-9">
                                                                        <button type="submit" class="btn btn-danger" name="deletemarketing">DELETE</button>
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/metisMenu.js"></script>
    <script>
    $(document).ready(function() {
        $('#metismenu').metisMenu();
    });
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />  -->
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script> 
   
    <script src="assets/demo/datatables-demo.js"></script> -->
    <!-- The Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
    
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Data Marketing</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
    
                <!-- Modal body -->
                <form method="post" action="../function.php">
                    <div class="modal-body">
    
                        <div class="form-group">
                            <label for="npk">NPK</label>
                            <input type="text" class="form-control" id="npk" placeholder="NPK" name="npk">
                        </div>
                        <br>
    
                        <div class="form-group">
                            <label for="nama_marketing">Marketing</label>
                            <input type="text" class="form-control" id="nama_marketing" placeholder="Marketing" name="nama_marketing">
                        </div>
    
                        <br>
                        <!---Divisi--->
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Divisi</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" name="divisi">
                                    <optgroup label="Divisi">
                                        <option value="Mikro">Mikro</option>
                                        <option value="Consumer">Consumer</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <br>
    
                        <input type="email" class="form-control" id="email_mar" placeholder="E-mail" name="email_mar" required>
                        <br>
                        <input type="text" class="form-control" id="telp_mar" placeholder="Telp" name="telp_mar" required>
                        <br>
    
                        <div class="ln_solid"></div>
                        <div class="container">
                            <div class="col-md-9 col-sm-9  offset-md-9">
                                <button type="submit" class="btn btn-success" name="addmarketing">SUBMIT</button>
                            </div>
    
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>