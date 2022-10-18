<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
$sql_hapus=mysql_query("delete from tblsupplier where IDSupplier='$_GET[id]'");
echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=supplier_view\">");

} else {
echo"Akses ditolak! anda login sebagai $_SESSION[level]";
}
?>