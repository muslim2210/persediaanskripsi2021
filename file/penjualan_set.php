<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );

if($_SESSION[level]=='beli') {
$hari_ini=date("Y-m-d");
?>


<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" align="center">Transaksi Penjualan Barang</h1>
                    <br>

                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4>Tambah Data Barang Keluar</h4>
                                </div>
                                <div class="card-body">
                                    <form name="f1" method="post" action="index.php?file=penjualan_form">
										
										<p>Untuk mendata transaksi penjualan barang, silahkan tentukan tanggal transaksi penjualan barang.</p>
										<p>Tanggal Transaksi <input type="date" name="tgl_transaksi" size="15" value="<?php echo $hari_ini;?>"></p>
										<p><input class="btn btn-primary" type="submit" name="simpan" value="OK"></p>

										
										
									</form>

 

<?php
} else {echo "Akses Ditolak"; }
?>

                                </div>
                            </div>

                        </div>

                    </div>

        </div>

