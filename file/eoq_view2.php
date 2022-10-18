<?php  
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli' ||$_SESSION[level]=='manajer') {
//query
$sql_tbleoq=mysql_query("select * from tbleoq order by IDEoq asc");
//menampilkan ke layar
?>


<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Daftar data EOQ</h1>
                    <br>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data EOQ</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="2">No.</th>
											<th width="70">Kode Barang</th>
											<th>Nama Barang</th>
											<th>Harga Per Zak</th>
											<th>Kebutuhan Barang Pertahun</b></th>
											<th>Biaya Simpan</th>
											<th>Biaya Sekali Pesan</th>
											<th colspan="2" width="100" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
										<?php
										while($baris_tbleoq=mysql_fetch_array($sql_tbleoq)) {
										$no++;
										if($n==0){$warna="";$n++;} else {$warna="#dedee";$n--;}
										?>
                                    <tbody>

                                        


                                        <tr>
											<td><?php echo $no;?>.</td>
											<td><?php echo $baris_tbleoq[IDBarang];?></td>
											<td><?php echo $baris_tbleoq[NamaBarang];?></td>
											<td>Rp. <?php echo str_replace(",",".",number_format($baris_tbleoq[Harga],0));?></td>
											<td><?php echo str_replace(",",".",number_format($baris_tbleoq[KebTahun],0));?> (Zak)</td>
											<td><?php echo $baris_tbleoq[BiySimpan];?></td>
											<td>Rp. <?php echo str_replace(",",".",number_format($baris_tbleoq[BiyPesan],0));?></td>
											<td width="20">
											   <button class="btn btn-danger"><a class="text-white" href="index.php?file=eoq_hapus&id=<?php echo $baris_tbleoq[IDEoq];?>">Hapus</a></button></td>

												<td>
													<button class="btn btn-warning"><a class="text-white" href="index.php?file=eoq_edit&id=<?php echo $baris_tbleoq[IDEoq];?>">Edit</a></button></td>		
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <p>[<a href="index.php">Kembali Ke Dashboard</a>]</p>

<p><b>Untuk Menghitung menggunakan metode EOQ, Silahkan ke menu <a href="index.php?file=laporan_eoq">Laporan HITUNG EOQ</a></b></p>

                                




<?php 
} else {
echo"Akses ditolak! anda login sebagai $_SESSION[level]";
}
?>

                            </div>
                        </div>
                    </div>

                </div>

