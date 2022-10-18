<?php 
session_start();
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli' ||$_SESSION[level]=='manajer') {
?>

<div class="container-fluid">
	<div class="row">

        <div class="col-lg-6">
        	<div class="card shadow mb-4">
               <div class="card-header">
                  <h4>Hitung Metode EOQ</h4>
               </div>
               <div class="card-body">

				<form name="f1"method=post action="index.php?file=eoq_form">
				<p>Untuk menghitung EOQ pada barang, silahkan pilih barang.</p>
				<table width="100%"align=center>
				<tr><td>Nama Barang</td><td><select name="kode_barang">
				<?php
				$sql_tblbarang=mysql_query("SELECT * from tblbarang");
				while($baris_tblbarang=mysql_fetch_array($sql_tblbarang)) {
				echo"<option value=\"$baris_tblbarang[IDBarang]\">$baris_tblbarang[NamaBarang] </option>";
				}
				?>

				</select></td></tr>
				<tr><td>.</td></tr>
				<tr><td colspan=2><input class="btn btn-primary" type="submit" name="simpan" value="Lanjut >>"></td></tr>
				</table>



<?php
} else {echo "Akses Ditolak"; }
?>

                </div>
            </div>

        </div>

    </div>

</div>

