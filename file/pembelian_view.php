<?php  
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
//query
$sql_tbltransaksi=mysql_query("select * from v_laporan_pembelian order by IDtransaksi desc") or die
(mysql_error());
?>


<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Daftar Pembelian Barang Masuk</h1>
                 
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang Masuk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20"><b>No.</th>
											<th width="150"><b>Kode - Nama Barang</th>
											<th>Suplier</th>
											<th>Keterangan</th>
											<th>Tanggal Transaksi</th>
											<th>Harga Beli per Zak</th>
											<th>Jumlah Barang</th>
											<th>Total Harga Beli</th>

											<th colspan="2" width="100" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
<?php
while($baris_tbltransaksi=mysql_fetch_array($sql_tbltransaksi)) {
$no++;
if($n==0) {$warna="";$n++;} else {$warna="#dedee";$n--;}
?>
									<tbody>	
										<tr>
											<td><?php echo $no;?>.</td>
											<td><?php echo $baris_tbltransaksi[IDBarang]." - ".$baris_tbltransaksi[NamaBarang];?></td>
											<td><?php echo $baris_tbltransaksi[NamaSupplier];?></td>
											<td><?php echo $baris_tbltransaksi[Keterangan];?></td>
											<td><?php echo $baris_tbltransaksi[TglTransaksi]; ?></td>
											<td>Rp. <?php echo str_replace(",",".",number_format($baris_tbltransaksi[Harga],0));?></td>
											<td><?php echo str_replace(",",".",number_format($baris_tbltransaksi[Jumlah],0));?> (Zak)</td>

<?php 
$harga = $baris_tbltransaksi[Harga];
$jumlah = $baris_tbltransaksi[Jumlah];
$Total = $harga*$jumlah;
?>
											<td>Rp. <?php echo str_replace(",",".",number_format($Total,0));?></td>
											<td width="20">
											   <button class="btn btn-danger"><a class="text-white" href="index.php?file=pembelian_hapus&id=<?php echo $baris_tbltransaksi[IDTransaksi];?>">Hapus</a></button></td>


												<td>
													<button class="btn btn-warning"><a class="text-white" href="">Edit</a></button></td>
												
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                


<p>[<a href="index.php">Kembali Ke Dashboard</a>]</p>
<?php
} else {

echo"Akses di tolak! anda login sebagai $_SESSION[level]";
}

?>
                            </div>
                        </div>
                    </div>

                </div>

