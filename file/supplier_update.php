<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
// mengecek apakah kode supplier sudah ada atau belum
			//mengecek apakah KODE , Nama dan ALamat dikosongkan
			if (empty($_POST[nama_suplier])||empty($_POST[alamat_suplier])) 
				{
				echo "<h3>Error ..</h3>
				<p>Kode Supplier, Nama Supplier dan ALamat Supplier <b>tidak boleh dikosongkan !</b></p>
				<p><a href=\"javascript:history.back()\">[ Kembali ]</a>";
				} else {
				$sql_update=mysql_query("update tblsupplier set
				NamaSupplier='$_POST[nama_suplier]',
				AlamatSupplier='$_POST[alamat_suplier]',
				Telepon='$_POST[telp_suplier]', 
				web='$_POST[Web]'
				
				where IDSupplier='$_POST[kode_suplier]'") or die (mysql_error()) ;
				echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=supplier_form\">");
				}
	
} else {
echo "Akses ditolak!";
}
?>
