<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli' ||$_SESSION[level]=='manajer') {
$kode_barang=ambil_kode_barang($_GET[id]);
$sql_hapus=mysql_query("delete from tbleoq where IDEoq='$_GET[id]'");
echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=eoq_view2&kode=$kode_barang\">");

} else {
echo"Akses ditolak! anda login sebagai $_SESSION[level]";
}
?>
