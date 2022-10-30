<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="../<?php echo $role; ?>">
                    <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <ul id="metismenu">
                    <li class="">
                        <a href="#" class="has-arrow nav-link" aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fas fa-random"></i></div>
                            Manage Document
                        </a>
                        <ul class="mm-collapse">
                            <li>
                                <a class="nav-link" href="../<?php echo $role; ?>/tambahdocument.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                    Tambah Document
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="../<?php echo $role; ?>/masuk.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chevron-circle-right"></i></div>
                                    Document Masuk
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="../<?php echo $role; ?>/keluar.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chevron-circle-left"></i></div>
                                    Document Keluar
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="../template/globalDownloadDoc.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-download"></i></div>
                                    Document Download
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#" class="has-arrow nav-link" aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fas fa-retweet"></i></div>
                            In Out Document
                        </a>
                        <ul class="mm-collapse">
                            <li>
                                <a class="nav-link" href="../<?php echo $role; ?>/peminjaman.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-indent"></i></div>
                                    Peminjaman Document
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="../<?php echo $role; ?>/pengembalian.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-outdent"></i></div>
                                    Pengembalian Document
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="../globalFunction/globalLogOutFunction.php">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>