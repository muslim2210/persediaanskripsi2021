<?php
session_start();
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {

?>

		<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" align="center">Penambahan Data Barang</h1>
                    <br>

                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <h4>Tambah Data Barang</h4>
                                </div>
                                <div class="card-body">
                                    <form name="f1"method=post action="index.php?file=barang_form">
										<table width="100%"align=center>
										<p>Untuk melakukan penambahan data barang, silahkan pilih supplier terlebih dahulu.</p>	
										<tr><td>Supplier</td><td><select name="kode_supplier" class="btn btn-outline-primary">
										<?php
										$sql_tblsupplier=mysql_query("SELECT * from tblsupplier");
										while($baris_tblsupplier=mysql_fetch_array($sql_tblsupplier)) {
										echo"<option value=\"$baris_tblsupplier[IDSupplier]\">$baris_tblsupplier[NamaSupplier] </option>";
										}
										?>

										</select></td>
										</tr>

										<tr>
											<td>.</td>
										</tr>

										<tr><td colspan=2><input class="btn btn-primary" type="submit" name="simpan" value="Lanjut >>"></td></tr>

										</table>
									</form>

 

<?php
} else {echo "Akses Ditolak"; }
?>

                                </div>
                            </div>

                        </div>

                    </div>

        </div>



