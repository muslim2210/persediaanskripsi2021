<?php   
defined("VALIDASI") or die ('Tidak diperkenankan mengakses file ini secara langsung !');
if($_SESSION[level]=='beli' ||$_SESSION[level]=='manajer') {

if (!is_numeric($_POST[keb_tahun])||!is_numeric($_POST[biy_pesan])||!is_numeric($_POST[biy_simpan]))  {
	echo "<h3>Error</h3><p>form tidak boleh kosong atau form harus diisi dengan angka</p>";

} else {

$sql_update=mysql_query("update tbleoq set

KebTahun='$_POST[keb_tahun]',
BiySimpan='$_POST[biy_simpan]',
BiyPesan='$_POST[biy_pesan]' where IDBarang='$_POST[kode_barang]'");

echo("<META HTTP-EQUIV=refresh CONTENT=\"0.1;URL=index.php?file=eoq_view2&kode=$_POST[kode_barang]\">");

}
} else {

echo "Akses ditolak!";
}
?>
