<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
$tanggal_transaksi=ambil_tgl_transaksi($_GET[id]);
$sql_hapus=mysql_query("delete from tbltransaksi where IDTransaksi='$_GET[id]'");
echo "<p align=\"center\"><br/><img src=\"images/progress.gif\"</p>";
echo("<META HTTP-EQUIV=Refresh CONTENT=\"2;URL=index.php?file=penjualan_form&tgl=$tanggal_transaksi\">");
} else {
echo"Akses ditolak!";
}
?>