<?php
session_start();
?>
<?php if ($_SESSION[level]=='beli'){ ?>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?file=intro">
                
                <div class="sidebar-brand-text mx-3"><?php echo $_SESSION[nama];?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data dan Transaksi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Supplier & Barang</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Input Data:</h6>
                        <a class="collapse-item" href="index.php?file=supplier_form">Supplier</a>
                        <a class="collapse-item" href="index.php?file=barang_set">Barang</a>

                        <div class="collapse-divider"></div>

                        <h6 class="collapse-header">Lihat Laporan:</h6>
                        <a class="collapse-item" href="index.php?file=supplier_report">Laporan Supplier</a>
                        <a class="collapse-item" href="index.php?file=barang_report">Laporan Barang</a>
                    </div>
                </div>





            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Input Data:</h6>
                        <a class="collapse-item" href="index.php?file=pembelian_set">Transaksi Pembelian</a>
                        <a class="collapse-item" href="index.php?file=penjualan_set">Transaksi Penjualan</a>
                        <a class="collapse-item" href="index.php?file=retur_jual_set">Transaksi Barang Retur</a>
                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                metode economis eoq
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Proses EOQ</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Input data :</h6>
                        <a class="collapse-item" href="index.php?file=eoq_set">Data EOQ</a>
                        
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Tabel Daftar EOQ:</h6>
                        <a class="collapse-item" href="index.php?file=eoq_view2">Tabel Data EOQ</a>
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?file=laporan_eoq">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Laporan Hasil EOQ</span></a>
            </li>

                        <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Persediaan Barang
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?file=persediaan_report">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Stok Barang</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

             <!-- Heading -->
            <div class="sidebar-heading">
                laporan data dan transaksi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePa"
                    aria-expanded="true" aria-controls="collapsePa">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Lihat Laporan</span>
                </a>
                <div id="collapsePa" class="collapse" aria-labelledby="headingPa" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <h6 class="collapse-header">Laporan Transaksi:</h6>
                        <a class="collapse-item" href="index.php?file=pembelian_set_report">Laporan Pembelian</a>
                        <a class="collapse-item" href="index.php?file=penjualan_set_report">Laporan Penjualan</a>
                        <a class="collapse-item" href="index.php?file=penjualan_retur_set_report">Laporan Barang Retur</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <ul class="navbar-nav ml-auto">

                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">LOGOUT</span>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

<?php 
}
?>


<?php
session_start();
?>
<?php if ($_SESSION[level]=='manajer'){ ?>




<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?file=dashboard">
                
                <div class="sidebar-brand-text mx-3"><?php echo $_SESSION[nama];?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                metode economis eoq
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Proses EOQ</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Input data :</h6>
                        <a class="collapse-item" href="index.php?file=eoq_set">Data EOQ</a>
                        
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Tabel Daftar EOQ:</h6>
                        <a class="collapse-item" href="index.php?file=eoq_view2">Tabel Data EOQ</a>
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?file=laporan_eoq">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Laporan Hasil EOQ</span></a>
            </li>

                        <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Persediaan Barang
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?file=persediaan_report">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Stok Barang</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

             <!-- Heading -->
            <div class="sidebar-heading">
                laporan data dan transaksi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePa"
                    aria-expanded="true" aria-controls="collapsePa">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Lihat Laporan</span>
                </a>
                <div id="collapsePa" class="collapse" aria-labelledby="headingPa" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <h6 class="collapse-header">Laporan Transaksi:</h6>
                        <a class="collapse-item" href="index.php?file=pembelian_set_report">Laporan Pembelian</a>
                        <a class="collapse-item" href="index.php?file=penjualan_set_report">Laporan Penjualan</a>
                        <a class="collapse-item" href="index.php?file=penjualan_retur_set_report">Laporan Barang Retur</a>

                        <div class="collapse-divider"></div>

                        <h6 class="collapse-header">Laporan Barang & Supplier:</h6>

                        <a class="collapse-item" href="index.php?file=supplier_report">Laporan Supplier</a>
                        <a class="collapse-item" href="index.php?file=barang_report">Laporan Barang</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <ul class="navbar-nav ml-auto">

                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">LOGOUT</span>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

<?php 
}
?>






