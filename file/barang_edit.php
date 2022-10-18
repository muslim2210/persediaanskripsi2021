<?php   
defined("VALIDASI") or die ('Tidak diperkenankan mengakses file ini secara langsung !');
if($_SESSION[level]=='beli') {
$data_barang=mysql_fetch_array(mysql_query("select * from tblbarang where IDBarang='$_GET[id]'"));
$kode_supplier=$data_barang[IDSupplier];
?>



<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Data Barang </h1>
                    <br>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">silahkan Edit pada kolom yang telah disediakan.</h6>
                        </div>
                        <div class="card-body">
                        	<form name="f1" method="post" action="index.php?file=barang_update">
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Barang</label>
							    <div class="col-sm-4">
							      <input type="hidden" name="kode_supplier" value="<?php echo $data_barang[IDSupplier];?>" readonly="yes">
							      
							      <input class="form-control" type="text" name="kode_barang" value="<?php echo $data_barang[IDBarang];?>" readonly="yes" >
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Barang</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="text" name="nama_barang" size="50"  value="<?php echo $data_barang[NamaBarang];?>">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Barang</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="text" name="jenis_barang" size="50" value="<?php echo $data_barang[Jenis];?>">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Beli Satuan</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="harga_barang" value="<?php echo $data_barang[Harga];?>">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Jual Satuan</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="hargajual" value="<?php echo $data_barang[PhotoBrg];?>">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Jml min. Stok</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="jml_min" value="<?php echo $data_barang[Jml_min];?>">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Jml max. Stok</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="jml_max" value="<?php echo $data_barang[Jml_max];?>">
					
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





