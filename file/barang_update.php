<?php   
defined("VALIDASI") or die ('Tidak diperkenankan mengakses file ini secara langsung !');
if($_SESSION[level]=='beli') {

if (empty($_POST[kode_barang])|| empty($_POST[nama_barang]) || empty($_POST[jenis_barang])
||empty($_POST[harga_barang])||empty($_POST[jml_min])||empty($_POST[jml_max])){
echo"
<h3>error .. </h3>
<p>Nama Barang, Jenis Barang, Jumlah Barang
Harga Barang, Jumlah Minimal dan Jumlah Maximal<b> tidak boleh dikosongkan !</b></p>
<p><a href=\"javascript:history.back()\">[ Kembali ]</a></p>";

} else {


$sql_update=mysql_query("update tblbarang set
NamaBarang='$_POST[nama_barang]',
Jenis='$_POST[jenis_barang]',
Harga='$_POST[harga_barang]',
PhotoBrg='$_POST[hargajual]',
Jml_min='$_POST[jml_min]',
Jml_max='$_POST[jml_max]' where IDBarang='$_POST[kode_barang]'");

echo("<META HTTP-EQUIV=refresh CONTENT=\"0.1;URL=index.php?file=barang_form&kode=$_POST[kode_supplier]\">");
}

} else {

echo "Akses ditolak!";
}
?>
