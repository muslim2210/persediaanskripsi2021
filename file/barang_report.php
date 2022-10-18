<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
//query
$sql_tblbarang=mysql_query("select * from tblbarang where IDBarang order by IDBarang asc");
//menampilkan ke layar
?>



<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" align="center">Laporan Daftar Barang</h1>
                 
                    <p>[<a href="index.php">Kembali Ke Dashboard</a>]</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Jml Stok min</th>
                                            <th>Jml Stok max</th>
                                        </tr>
                                    </thead>
<?php
while($baris_tblbarang=mysql_fetch_array($sql_tblbarang)) {
$no++;
if($n==0){$warna="";$n++;} else {$warna="#dedee";$n--;}
?>
                                    
                                    <tbody>
                                        <tr>
											<td><?php echo $no;?>.</td>
											<td ><?php echo $baris_tblbarang[IDBarang];?></td>
											<td><?php echo $baris_tblbarang[NamaBarang];?></td>
											<td><?php echo $baris_tblbarang[Jenis];?></td>
											<td>Rp. <?php echo str_replace(",",".",number_format($baris_tblbarang[Harga],0));?></td>
											<td>Rp. <?php echo str_replace(",",".",number_format($baris_tblbarang[PhotoBrg],0));?></td>
											<td><?php echo str_replace(",",".",number_format($baris_tblbarang[Jml_min],0));?></td>
											<td><?php echo str_replace(",",".",number_format($baris_tblbarang[Jml_max],0));?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>


<p align="center">[<a href="./pdf/barang.php" target="_blank">Tampilan Cetak</a>]</p>

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

