<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
// mengecek apakah kode supplier sudah ada atau belum
if (cek_supplier($_POST[kode_suplier])<1)
	{
			//mengecek apakah KODE , Nama dan ALamat dikosongkan
			if (empty($_POST[kode_suplier])||empty($_POST[nama_suplier])||empty($_POST[alamat_suplier])) 
				{
				echo "<h3>Error ..</h3>
				<p>Kode Supplier, Nama Supplier dan ALamat Supplier <b>tidak boleh dikosongkan !</b></p>
				<p><a href=\"javascript:history.back()\">[ Kembali ]</a>";
				} else {
				$sql_simpan=mysql_query("insert into tblsupplier values
				('$_POST[kode_suplier]','$_POST[nama_suplier]',
				'$_POST[alamat_suplier]','$_POST[telp_suplier]','$_POST[Web]')") ;
				echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=supplier_form\">");
				}
		} else {
	echo "<h3>Error ..</h3>
	<p>Kode $_POST[kode_suplier] sudah ada</p>
	<p><a href=\"javascript:history.back()\">[ Kembali ]</a>";
	}
} else {
echo "Akses ditolak!";
}
?>
