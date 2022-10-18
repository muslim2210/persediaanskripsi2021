<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
if(!empty($_POST[tgl_transaksi])) {$tgl_transaksi=$_POST[tgl_transaksi];} else {$tgl_transaksi=$_GET[tgl];}
		
		$tgl_hari_ini=date("Y-m-d");
		if ($_POST[tgl_transaksi]<=$tgl_hari_ini){
?>





<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Transaksi Penjualan Barang</h1>
                    <br>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><p>Untuk melakukan transaksi penjualan, silahkan isi pada kolom yang disediakan.</p></h6>
                        </div>
                        <div class="card-body">
                        	<form name="f1" method=post action="index.php?file=penjualan_save">
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-4 col-form-label">Supplier - Nama Barang - sisa</label>
							    <div class="col-sm-7">
							      <input type="hidden" value="<?php echo $tgl_transaksi;?>" name="tanggal">
							      <select name="kode" class="btn btn-outline-primary">
									<option value="-">--Pilih Barang--</option>
									<?php

									$sql_tblbarang=mysql_query("SELECT distinct IDBarang,NamaSupplier,NamaBarang  from v_laporan_pembelian") or die (mysql_error());

									while($baris_tblbarang=mysql_fetch_array($sql_tblbarang)) {
									//mengecek apakah barang masih ada atau belum
									if(sisa_barang($baris_tblbarang[IDBarang])<>0||sisa_barang($baris_tblbarang[IDBarang])==null){
									echo"<option value=\"$baris_tblbarang[IDBarang]\">$baris_tblbarang[NamaSupplier] | $baris_tblbarang[NamaBarang] | ".sisa_barang($baris_tblbarang[IDBarang])."</option>";
									  }
									}
									?>

								  </select>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-4 col-form-label">Keterangan</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="text" name="keterangan" size="50" maxlength="100">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-4 col-form-label">Jumlah Penjualan per Zak</label>
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
include("penjualan_view.php");

} else { 
		echo "Error - Tanggal lebih dari hari ini";
		}


} else {
echo"Akses ditolak!";
}

?>

</div>





