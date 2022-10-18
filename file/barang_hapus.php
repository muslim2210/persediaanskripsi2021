<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
$kode_supplier=ambil_kode_supplier($_GET[id]);
$sql_hapus=mysql_query("delete from tblbarang where IDBarang='$_GET[id]'");



echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=barang_form&kode=$kode_supplier\">");

} else {
echo"Akses ditolak! anda login sebagai $_SESSION[level]";
}
?>

