<?php  
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
?>



<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" align="center">Penambahan Data Supplier</h1>
                    <br>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">silahkan isi pada kolom yang telah disediakan.</h6>
                        </div>
                        <div class="card-body">
                        	
							<form name="f1" method=post action="index.php?file=supplier_save">
							  <div class="form-group col-md-6">
							    <label for="exampleFormControlInput1">Kode Supplier :</label>
							    <input type="text" name="kode_suplier" class="form-control" id="exampleFormControlInput1" placeholder="masukan kode supplier..">
							  </div>

							  <div class="form-group col-md-6">
							    <label for="exampleFormControlInput1">Nama Supplier</label>
							    <input type="text" name="nama_suplier" class="form-control" id="exampleFormControlInput1" placeholder="nama supplier..">
							  </div>
							  
							  <div class="form-group col-md-6">
							    <label for="exampleFormControlTextarea1">Alamat Supplier</label>
							    <textarea class="form-control" name="alamat_suplier" id="exampleFormControlTextarea1" rows="3" placeholder="masukan alamat"></textarea>
							  </div>

							  <div class="form-group col-md-6">
							    <label for="exampleFormControlInput1">No. Telp / Fax</label>
							    <input type="text" name="telp_suplier" class="form-control" id="exampleFormControlInput1" placeholder="masukan no. telp / fax..">
							  </div>

							  <div class="form-group col-md-6">
							    <label for="exampleFormControlInput1">Web</label>
							    <input type="text" name="Web" class="form-control" id="exampleFormControlInput1" placeholder="masukan web">
							  </div>

							  <div class="form-group col-md-6">
							  	<input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
							    
							    
							  </div>

							  
							</form>

                        </div>
                    </div>
<?php 
include('supplier_view.php');
}else{
echo "Akses ditolak!";
}
?>

                </div>
                <!-- /.container-fluid -->
