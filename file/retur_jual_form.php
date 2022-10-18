<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
if(!empty($_POST[tgl_transaksi])) {$tgl_transaksi=$_POST[tgl_transaksi];} else {$tgl_transaksi=$_GET[tgl];}
if (cek_penjualan($tgl_transaksi)<1) {echo "<h3>Error</h3><p>Tidak ada transaksi penjualan pada tanggal tersebut !</p>";} else {
?>

<div class="container-fluid">
 <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Transaksi Retur Penjualan Barang</h1>
                    <br>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><p>Untuk melakukan transaksi barang retur penjualan, silahkan isi pada kolom yang disediakan.</p></h6>
                        </div>
                        <div class="card-body">
                        	<form name="f1" method="post" action="index.php?file=retur_jual_save">
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-5 col-form-label">Barang yang terjual pada tanggal <?php echo tgl_indonesia($tgl_transaksi);?></label>
							    <div class="col-sm-7">
							      <input type="hidden" value="<?php echo $tgl_transaksi;?>" name="tanggal">
							      <select name="kode" class="btn btn-outline-primary">
									<option value="-">--Pilih Barang--</option>
									<?php

									$sql_tblbarang=mysql_query("SELECT distinct IDBarang,NamaSupplier,NamaBarang  from v_laporan_penjualan where TglTransaksi='$tgl_transaksi'") or die (mysql_error());

									while($baris_tblbarang=mysql_fetch_array($sql_tblbarang)) {
									echo"<option value=\"$baris_tblbarang[IDBarang]\">$baris_tblbarang[NamaSupplier] | $baris_tblbarang[NamaBarang] </option>";
									}
									?>

								  </select>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-5 col-form-label">Keterangan</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="text" name="keterangan" size="50" maxlength="100">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-5 col-form-label">Jumlah yang diretur</label>
							    <div class="col-sm-3">
							      <input class="form-control" type="text" name="jumlah" size="50" maxlength="100">
					
							    </div>
							  </div>

							 
							  
							  <div class="form-group row">
							    <div class="col-sm-4">
							      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
							    </div>
							  </div>
							</form>
							

                        </div>
                    </div>

<?php
include("./file/retur_jual_view.php");


}
} else {
echo"Akses ditolak!";
}

?>
             
</div>

