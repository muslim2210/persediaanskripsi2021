<?php  
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
$data_supplier=mysql_fetch_array(mysql_query("select * from tblsupplier where IDSupplier='$_GET[id]'"));
?>



					<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" align="center">Edit Data Supplier</h1>
                    <br>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">silahkan Edit Data Supplier <?php echo $data_supplier[NamaSupplier];?> pada kolom yang telah disediakan.</h6>
                        </div>
                        <div class="card-body">
                        	
							<form name="f1" method=post action="index.php?file=supplier_update">
							  <div class="form-group col-md-6">
							    <label for="exampleFormControlInput1">Kode Supplier</label>
							    <input type="text" name="kode_suplier" class="form-control" id="exampleFormControlInput1" placeholder="masukan kode supplier.." value="<?php echo $data_supplier[IDSupplier];?>" readonly="yes">
							  </div>

							  <div class="form-group col-md-6">
							    <label for="exampleFormControlInput1">Nama Supplier</label>
							    <input type="text" name="nama_suplier" class="form-control" id="exampleFormControlInput1" placeholder="nama supplier.." value="<?php echo $data_supplier[NamaSupplier];?>">
							  </div>
							  
							  <div class="form-group col-md-6">
							    <label for="exampleFormControlTextarea1">Alamat Supplier</label>
							    <textarea class="form-control" name="alamat_suplier" id="exampleFormControlTextarea1" rows="3" value="<?php echo $data_supplier[AlamatSupplier];?>"></textarea>
							  </div>

							  <div class="form-group col-md-6">
							    <label for="exampleFormControlInput1">No. Telp / Fax</label>
							    <input type="text" name="telp_suplier" class="form-control" id="exampleFormControlInput1" placeholder="masukan no. telp / fax.." value="<?php echo $data_supplier[Telepon];?>">
							  </div>

							  <div class="form-group col-md-6">
							    <label for="exampleFormControlInput1">Web</label>
							    <input type="text" name="Web" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $data_supplier[web];?>">
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





