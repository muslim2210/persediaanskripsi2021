<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
$bln_ini=date("Y-m");
?>


<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800" align="center">Set Laporan Pembelian Barang Masuk</h1>
                    <br><br>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Grow In Utility -->
                        <div class="col-lg-6">

                            <div class="card position-relative">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary">Laporan Pembelian/Barang Masuk Bulanan</h5>
                                </div>
                                <div class="card-body">
                                    <p>Jika Anda menampilkan laporan pembelian barang masuk bulanan, silahkan tentukan tanggal laporan.</p>
									<form name="f1" method=post action="index.php?file=pembelian_report">
									Bulanan Pelaporan : <input type="month" name="bln" value="<?php echo $bln_ini;?>"><br/>
									<br>
									<input class="btn btn-primary" type="submit" name="simpan" value="OK">
									</form>
                                </div>
                            </div>

                        </div>

                        <!-- Fade In Utility -->
                        <div class="col-lg-6">

                            <div class="card position-relative">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary">Tampilkan Semua Laporan Pembelian/Barang Masuk</h5>
                                </div>
                                <div class="card-body">
								 <p>Jika Anda menampilkan semua laporan pembelian barang masuk, Silahkan Klik OK!</p>
								<form name="f1" method=post action="index.php?file=pembelian_report_all">
								Tampilkan laporan : 
								<br/>
								<br>
								<input class="btn btn-primary" type="submit" name="simpan" value="OK">
								</form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->


<?php
} else {
echo "Akses ditolak !";
}


?>
