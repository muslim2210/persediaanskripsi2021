<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
IF($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
//query
$sql_tblsuplier=mysql_query("select * from tblsupplier order by IDSupplier asc");
//menampilkan ke layar
?>


<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" align="center">Laporan Daftar Supplier</h1>
                 
                    <p>[<a href="index.php">Kembali Ke Dashboard</a>]</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Supplier</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode</th>
											<th>Nama Supiler</th>
											<th>Alamat</th>
											<th>Telepon</th>
											<th>Website</th>
                                        </tr>
                                    </thead>
<?php
while($baris_tblsuplier=mysql_fetch_array($sql_tblsuplier)) {
$no++;
if($n==0){$warna="";$n++;} else {$warna="#dedee";$n--;}
?>
                                    <tbody>
                                        <tr>
											<td><?php echo $no;?>.</td>
											<td><?php echo $baris_tblsuplier[IDSupplier];?></td>
											<td><?php echo $baris_tblsuplier[NamaSupplier];?></td>
											<td><?php echo $baris_tblsuplier[AlamatSupplier];?></td>
											<td><?php echo $baris_tblsuplier[Telepon];?></td>
											<td><?php echo $baris_tblsuplier[web]; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>


<p align="center">[<a href="./pdf/supplier.php" target="_blank">Tampilan Cetak</a>]</p>

<?php 
} else {
echo"Akses ditolak! anda login sebagai $_SESSION[level]";
}
?>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->








