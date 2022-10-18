<?php   
session_start();
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
$data_barang=mysql_fetch_array(mysql_query("select * from tblbarang where IDBarang='$_GET[id]'"));
$kode_supplier=$data_barang[IDSupplier];
if (!empty($_POST[kode_supplier])) {$kode_supplier=$_POST[kode_supplier];} else {
$kode_supplier=$_GET[kode];}	
?>



<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Transaksi Penambahan Data Barang dari : <?php echo nama_supplier($kode_supplier);?> </h1>
                    <br>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">silahkan isi pada kolom yang telah disediakan Gunakan kode supplier <b><?php echo $kode_supplier;?></b> diakhir kode barang.</h6>
                        </div>
                        <div class="card-body">
                        	<form name="f1" method="post" action="index.php?file=barang_save">
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Barang</label>
							    <div class="col-sm-4">
							      <input type="hidden" name="kode_supplier" value="<?php echo $kode_supplier;?>" readonly="yes">
							      
							      <input class="form-control" type="text" name="kode_barang" maxlength="100">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Barang</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="text" name="nama" size="50" maxlength="100">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Barang</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="text" name="jenis" size="50" maxlength="100">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Beli per Zak</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="harga" maxlength="11">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Jual per Zak</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="hargajual" maxlength="11">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Jml min. Stok</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="jml_min" maxlength="11">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Jml max. Stok</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="jml_max" maxlength="11">
					
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
include('barang_view.php');
}else{
echo "Akses ditolak!";
}
?>

                </div>
                <!-- /.container-fluid -->

