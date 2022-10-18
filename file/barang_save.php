<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );

if($_SESSION[level]=='beli') {
$kode_barang=$_POST[kode_barang].$_POST[kode_supplier];

if (!is_numeric($_POST[harga])||!is_numeric($_POST[jml_max])||!is_numeric($_POST[jml_min])) {
	echo "<h3>Error</h3><p>Kolom Jumlah Bukan Angka</p>";
exit;
} 

if ($_POST[jumlah]){
echo "Jml MIn dan Max tidak boleh minus";
exit;	
}


if(cek_barang($kode_barang)<1)
{
	if(!empty($_POST[nama])||!empty($_POST[kode_barang])||!empty($_POST[jenis])||!empty($_POST[harga])||!empty($_POST[jml_min])||!empty($_POST[jml_max])){
	$sql_simpan=mysql_query("insert into tblbarang (
	IDBarang,IDSupplier,NamaBarang,Jenis,Harga,PhotoBrg,Jml_min,Jml_max ) 
	values
	('$kode_barang','$_POST[kode_supplier]',
	'$_POST[nama]','$_POST[jenis]','$_POST[harga]','$_POST[hargajual]','$_POST[jml_min]','$_POST[jml_max]')") ;
	echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=barang_form&kode=$_POST[kode_supplier]\">");
	} else {
	echo "Keterangan dan Jumlah Tidak boleh kosong!";
	}
} else {
	echo "<h2>Error !!</h2>
	<p></p>Kode Barang $_POST[kode_barang] untuk supplier ".nama_supplier($_POST[kode_supplier])." sudah ada !</p>";
	}

} else {
echo "Akses ditolak!";
}
?>
