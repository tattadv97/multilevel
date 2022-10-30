<?php

include "../globalFunction/sessionChecker.php";

function tarikData($conn)
{
    $query      = mysqli_query($conn, "SELECT * FROM masuk Order BY id_masuk");
    $tempData   = "";
    $tempModal  = "";

    if (!$query) {

        return 'Gagal Melakukan Pengmabilan Data !' . mysqli_error($conn);
    } else {

        $jumlahData = mysqli_num_rows($query);

        if ($jumlahData <= 0) {

            return 'Data Belum Tersedia';
        } else {

            while ($data = mysqli_fetch_assoc($query)) {

                $idm            =  $data['id_masuk'];
                $jumlahSelfData = count($data);
                $hitungData     = 0;
                $dataSelf       = "<tr>\n";

                foreach ($data as $index => $nilai) {

                    if ($index !== 'id_masuk') {

                        if ($index === 'upload_document') {

                            $dataSelf .= '
                                <td>
                                    <a href="download.php?file=' . $nilai . '">
                                        Unduh Attachment
                                    </a>
                                </td>
                            ';
                        } else {

                            $dataSelf .= "<td>" . $nilai . "</td>";
                        }
                    }

                    if ($hitungData >= ($jumlahSelfData - 1)) {

                        $dataSelf .= '
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit' . $idm . '">
                                Edit
                            </button>
            
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete' . $idm . '">
                                Delete
                            </button>
                        
                            <div class="modal fade" id="edit' . $idm . '">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Document Masuk</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form method="post" action="../function.php" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Status Agunan</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <select class="form-control" name="status_agunan" value="' . $data['status_agunan'] . '">
                                                        <optgroup label="Status Agunan">
                                                            <option value="LUNAS">LUNAS</option>
                                                            <option value="BELUM LUNAS">BELUM LUNAS</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3 ">Upload Document</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input class="form-control" name="fileInput" value="' . $data['upload_document'] . '" type="file" required="required">
                                                </div>
                                            </div>
                                            <br>
                                            <div class=" form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Marketing</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <select class="form-control" name="marketing" value="' . $data['marketing'] . '">
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
                        
                                            <input type="hidden" name="id_masuk" value="' . $idm . '">
                                            <input type="hidden" name="namaLama" value="' . $data['upload_document'] . '">
                        
                                            <div class="ln_solid"></div>
                                            <div class="container">
                                                <div class="col-md-9 col-sm-9  offset-md-9">
                                                    <button type="submit" class="btn btn-success" name="updatemasuk">SUBMIT</button>
                                                </div>
                        
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
            
                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete' . $idm . '">
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
                                                Apakah anda yakin ingin menghapus ' . $data['nama_nasabah'] . '?
                                                <input type="hidden" name="id_masuk" value="' . $idm . '">
                                                <input type="hidden" name="namaLama" value="' . $data['upload_document'] . '">
                                                <br>
            
                                                <div class="ln_solid"></div>
                                                <div class="container">
                                                    <div class="col-md-9 col-sm-9  offset-md-9">
                                                        <button type="submit" class="btn btn-danger" name="deletemasuk">DELETE</button>
                                                    </div>
            
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>';
                    }

                    $hitungData++;
                }

                $dataSelf .= "</tr>";
                $tempData .= $dataSelf;
            }

            return $tempData . $tempModal;
        }
    }
}

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

        <?php include "template/sideNavTemplate.php";  ?>

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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php print(tarikData($conn)); ?>
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/metisMenu.js"></script>
    <script>
        $(document).ready(function() {
            $('#metismenu').metisMenu();
        });
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="assets/demo/chart-area-demo.js"></script> -->
    <!-- <script src="assets/demo/chart-bar-demo.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/metisMenu.js"></script>
    <script>
        $(document).ready(function() {
            $('#metismenu').metisMenu();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    -->
</body>

</html>