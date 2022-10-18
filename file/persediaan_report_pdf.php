<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
IF($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
?>

<h3>Laporan  Pembelian</h3>
<p>Berikut ini adalah laporan pembelian.</p>
<p><b><a href=javascript:history.back()>Kembali</a></b></p>
<p align="center">
<iframe src="<?php echo "./pdf/pembelian.php?bln=$_POST[bln]";?>" width="780" height="500"></iframe>
</p>


<?php
} else {
echo"Akses ditolak !";
}
?>
