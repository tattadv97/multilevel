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
    <title>Tambah Document</title>
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
                    <h1 class="mt-4">Tambah Document</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <!---Form Input--->
                    <div class="container">
                        <form method="post" enctype="multipart/form-data" action="../function.php">

                            <div class="form-group">
                                <label for="no_cif">No CIF</label>
                                <input type="text" class="form-control" id="id_cif" placeholder="No CIF" name="id_cif">
                            </div>

                            <div class="form-group">
                                <label for="no_ld">No LD</label>
                                <input type="text" class="form-control" id="id_ld" placeholder="No LD" name="id_ld">
                            </div>

                            <div class="form-group">
                                <label for="nama_nasabah">Nama Nasabah</label>
                                <input type="text" class="form-control" id="nama_nasabah" placeholder="Nama" name="nama_nasabah">
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Jenis Kelamin</label>
                                <div class="col-md-9 col-sm-9 " required>
                                    <select class="form-control" name="jenis_kelamin">
                                        <optgroup placeholder="Jenis Kelamin">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <!-- Dropdown Slot Lemari -->
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Pilih Brankas Lemari</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="select2_group form-control" name="lemari_document">
                                        <optgroup label="BRANKAS A">
                                            <option value="A-Slot/1 1-50">Slot/1 1-50</option>
                                            <option value="A-Slot/2 51-100">Slot/2 51-100</option>
                                            <option value="A-Slot/3 101-150">Slot/3 101-150</option>
                                            <option value="A-Slot/4 151-200">Slot/4 151-200</option>
                                        </optgroup>
                                        <optgroup label="BRANKAS B">
                                            <option value="B-Slot/1 1-50">Slot/1 1-50</option>
                                            <option value="B-Slot/2 51-100">Slot/2 51-100</option>
                                            <option value="B-SLot/3 101-150">Slot/3 101-150</option>
                                            <option value="B-Slot/4 151-200">Slot/4 151-200</option>
                                        </optgroup>
                                        <optgroup label="BRANKAS C">
                                            <option value="C-Slot/1 1-50">Slot/1 1-50</option>
                                            <option value="C-Slot/2 51-100">Slot/2 51-100</option>
                                            <option value="C-Slot/3 101-150">Slot/3 101-150</option>
                                            <option value="C-Slot/4 151-200">Slot/4 151-200</option>
                                        </optgroup>
                                        <optgroup label="BRANKAS D">
                                            <option value="D-SLot/1 1-50">Slot/1 1-50</option>
                                            <option value="D-Slot/2 51-100">Slot/2 51-100</option>
                                            <option value="D-Slot/3 101-150">Slot/3 101-150</option>
                                            <option value="D-Slot/4 151-200">Slot/4 151-200</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <!---DatePicker--->
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Jangka Agunan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input class="date-picker form-control" name="jangka_agunan" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>

                            <!---DatePicker--->
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Jangka Selesai</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input class="date-picker form-control" name="jangka_selesai" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" placeholder="Deskripsi" name="deskripsi">
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Pekerjaan</label>
                                <div class="col-md-9 col-sm-9 " required>
                                    <select class="form-control" name="pekerjaan" placeholder="Pekerjaan">
                                        <optgroup label="Pekerjaan">
                                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="PNS">PNS</option>
                                            <option value="TNI/POLRI">TNI/POLRI</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">No Telp</label>
                                <input type="text" class="form-control" id="id_cif" placeholder="No Telp" name="telp">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">E-mail</label>
                                <input type="text" class="form-control" id="id_cif" placeholder="E-mail" name="email">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Alamat</label>
                                <input type="text" class="form-control" id="id_cif" placeholder="Alamat" name="alamat">
                            </div>


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

                            <!--- Choose File --->
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Upload Document</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input class="form-control" name="fileInput" placeholder="Upload Document" type="file" accept="application/pdf" required="required">
                                </div>
                            </div>

                            <!---Marketing--->
                            <div class=" form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Marketing</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control" name="marketing">
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

                            <!---Button Submit--->
                            <div class="ln_solid"></div>
                            <div class="container">
                                <div class="col-md-9 col-sm-9  offset-md-11">
                                    <button type="submit" class="btn btn-success" name="masuk">SUBMIT</button>
                                </div>

                        </form>
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
</body>

</html>