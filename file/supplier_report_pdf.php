<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
IF($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
?>

<h3>Laporan  Supplier</h3>
<p>Berikut ini adalah daftar supplier, untuk menampilkannya anda harus menginstall aplikasi PDF Reader, jika belum ada anda harus menginstallnya terlebih dahulu.</p>
<p><b><a href=javascript:history.back()>Kembali</a></b></p>
<p align="center">
<iframe src="./pdf/supplier.php" width="780" height="500"></iframe>
</p>


<?php
} else {
echo"Akses ditolak !";
}
?>
