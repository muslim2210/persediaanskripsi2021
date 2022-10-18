
<?php
$sql_tblbarang=mysql_query("SELECT * FROM  v_barang_supplier ") or die(mysql_error());
while($baris_barang=mysql_fetch_array($sql_tblbarang)) {
if (jml_barang($baris_barang[IDBarang],'M')>0){
$no++;
if ($n==0) {$warna="";$n++;} else {$warna="#dedee";$n--;}
if (sisa_barang($baris_barang[IDBarang])!=null) {$sisa=sisa_barang($baris_barang[IDBarang]);
$keluar=jml_barang($baris_barang[IDBarang],'K');} else {$sisa=jml_barang($baris_barang[IDBarang],'M');$keluar=0;}

if($sisa<=jml_min($baris_barang[IDBarang])) {
    $nama_barang="<font color=\"red\"><b>$baris_barang[NamaBarang] - $baris_barang[NamaSupplier]</b></font>";
    } else {$nama_barang="$baris_barang[NamaBarang] - $baris_barang[NamaSupplier]";}
?>


<?php
$total_masuk=$total_masuk+jml_barang($baris_barang[IDBarang],'M');
$total_retur=$total_retur+jml_retur($baris_barang[IDBarang]);
$total_keluar=$total_keluar+jml_barang($baris_barang[IDBarang],'K');
}
$total=($total_masuk+$total_retur)-$total_keluar;
}
?>



<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="mx-auto">
                        <h1 class="h3 mb-0 text-gray-800 ">Aplikasi Persediaan Bahan Baku PVC Compound</h1>
                        </div>
                        
                    </div>
                    <br>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Barang Masuk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_masuk;?> (Zak)</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Barang Keluar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_keluar;?> (Zak)</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sisa Stok Barang
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total;?> (Zak)</div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Barang Penjualan (Retur)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_retur;?> (Zak)</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                        

                </div>
                <!-- /.container-fluid -->

            
            <!-- End of Main Content -->







