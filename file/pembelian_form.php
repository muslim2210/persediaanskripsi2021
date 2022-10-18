<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
if(!empty($_POST[tgl_transaksi])) {$tgl_transaksi=$_POST[tgl_transaksi];} else {$tgl_transaksi=$_GET[tgl];}
		
		$tgl_hari_ini=date("Y-m-d");
		if ($_POST[tgl_transaksi]<=$tgl_hari_ini){
?>




<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Transaksi Pembelian Barang</h1>
                    <br>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><p>Untuk melakukan transaksi pembelian, silahkan isi pada kolom yang disediakan.</p></h6>
                        </div>
                        <div class="card-body">
                        	<form name="f1" method=post action="index.php?file=pembelian_save">
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-4 col-form-label">Kode - Nama Barang</label>
							    <div class="col-sm-4">
							      <input type="hidden" value="<?php echo $tgl_transaksi;?>" name="tanggal">
							      <select name="kode" class="btn btn-outline-primary">
									<option value="-">--Pilih Barang--</option>
									<?php
									$sql_tblbarang=mysql_query("SELECT tblbarang.Harga, tblbarang.IDBarang,tblbarang.NamaBarang, tblsupplier.NamaSupplier
									FROM tblbarang
									JOIN tblsupplier ON tblsupplier.IDSupplier = tblbarang.IDSupplier
									ORDER BY Jenis ASC");
									while($baris_tblbarang=mysql_fetch_array($sql_tblbarang)) {
									echo"<option value=\"$baris_tblbarang[IDBarang]\">$baris_tblbarang[NamaSupplier] | $baris_tblbarang[NamaBarang] | Rp. $baris_tblbarang[Harga] </option>";
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
							    <label for="inputPassword3" class="col-sm-4 col-form-label">Jumlah Pembelian per Zak</label>
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
include("pembelian_view.php");

} else { 
		echo "Error - Tanggal lebih dari hari ini";
		}


} else {
echo"Akses ditolak!";
}

?>

                </div>
                <!-- /.container-fluid -->



