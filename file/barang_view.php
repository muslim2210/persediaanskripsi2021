<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
//query
$sql_tblbarang=mysql_query("select * from tblbarang where IDSupplier='$kode_supplier' order by IDBarang asc");
//menampilkan ke layar
?>


<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Daftar Barang dari Supplier : <b><?php echo nama_supplier($kode_supplier);?></b></h1>
                 
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
                                            <th width="10">No.</th>
											<th width="150">Kode Barang</th>
											<th>Nama Barang</th>
											<th>Jenis Barang</th>
											<th>Harga Beli per Zak</th>
											<th>Harga Jual per Zak</th>
											<th>Jml. Min.</th>
											<th>Jml. Max.</th>
											<th colspan="2" width="100" class="text-center">Aksi</th>
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
											<td width="20">
											   <button class="btn btn-danger"><a class="text-white" href="index.php?file=barang_hapus&id=<?php echo $baris_tblbarang[IDBarang];?>">Hapus</a></button></td>


												<td>
													<button class="btn btn-warning"><a class="text-white" href="index.php?file=barang_edit&id=<?php echo $baris_tblbarang[IDBarang];?>">Edit</a></button></td>
												
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                




<?php 
} else {
echo"Akses ditolak! anda login sebagai $_SESSION[level]";
}
?>

                            </div>
                        </div>
                    </div>

                </div>


